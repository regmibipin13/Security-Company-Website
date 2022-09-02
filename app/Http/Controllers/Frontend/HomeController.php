<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Mail\CompanyMail;
use App\Mail\EmployeeMail;
use App\Models\GalleryCollection;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Website;
use App\Models\CompanyForm;
use App\Models\EmployeeForm;
use App\Models\Satisfaction;
use App\Models\TrainingForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // use MediaUploadingTrait;

    public function index()
    {
        $website = Website::with(['media'])->first();
        $services = Service::with(['media'])->orderBy('id', 'desc')->limit(6)->get();
        $teams = Team::with(['media'])->where('ended_at', null)->limit(6)->get();
        $testimonials = Satisfaction::where('approved', true)->orderBy('id', 'desc')->limit(4)->get();
        return view('frontend.pages.home', compact('website', 'services', 'teams', 'testimonials'));
    }

    public function services()
    {
        $services = Service::with(['media'])->paginate(12);
        return view('frontend.pages.services', compact('services'));
    }


    public function singleService($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $service->load(['media']);
        return view('frontend.pages.single_service', compact('service'));
    }

    public function about()
    {
        $website = Website::firstOrFail();
        $website->load(['media']);
        // $galleries = GalleryCollection::with(['media'])->paginate(2);
        return view('frontend.pages.about', compact('website'));
    }
    public function contact()
    {
        $settings = Setting::firstOrFail();
        return view('frontend.pages.contact', compact('settings'));
    }

    public function teams()
    {
        $teams = Team::with(['media'])->where('ended_at', null)->paginate(18);
        $website = Website::first();
        return view('frontend.pages.teams', compact('teams', 'website'));
    }

    public function testimonials()
    {
        $testimonials = Satisfaction::where('approved', true)->orderBy('id', 'desc')->paginate(10);
        return view('frontend.pages.testimonials', compact('testimonials'));
    }


    // Api Controller From Here

    public function apiCompany(Request $request)
    {
        $email = Setting::first()->company_email;
        Mail::to($email)->queue(new CompanyMail($request->all()));
        $request->merge(['company_contact' => $request->company_phone, 'contact' => $request->phone]);
        $company = CompanyForm::create($request->all());
        return response()->json(['success' => 'Operation Success']);
    }

    public function apiEmployee(Request $request)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'nullable',
            'files' => 'required | array | min:3',
            'father_name' => 'required',
            'grandfather_name' => 'required',
        ]);
        $employee = EmployeeForm::create($sanitized);
        foreach ($request->input('files', []) as $file) {
            $file = \Str::substr($file, 11);
            $employee->addMedia(storage_path('app/public/employees/' . basename($file)))->toMediaCollection('files');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'father_name' => $request->father_name,
            'grandfather_name' => $request->grandfather_name,
            'files' => $employee->files,
        ];
        $email = Setting::first()->company_email;
        Mail::to($email)->queue(new EmployeeMail($data));


        // return "success";
        return redirect()->back()->with('success', 'Form Submitted Successfully');
    }

    public function apiTraining(Request $request)
    {
        $request->merge(['contact' => $request->phone]);
        $sanitized = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'contact' => 'nullable',
            'address' => 'required',
            'message' => 'nullable',
            'type' => 'required',
            'files' => 'required | array | min:3',
        ]);

        $email = Setting::first()->company_email;
        $training = TrainingForm::create($sanitized);
        foreach ($request->input('files', []) as $file) {
            $file = \Str::substr($file, 11);
            $training->addMedia(storage_path('app/public/employees/' . basename($file)))->toMediaCollection('files');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'type' => $request->type,
            'files' => $training->files,
        ];
        Mail::to($email)->queue(new \App\Mail\TrainingForm($data));

        return redirect()->back()->with('success', 'Form Submitted Successfully');
    }

    public function storeMedia(Request $request)
    {
        // Validates file size
        if (request()->has('size')) {
            $this->validate(request(), [
                'file' => 'max:' . request()->input('size') * 1024,
            ]);
        }
        // If width or height is preset - we are validating it as an image
        if (request()->has('width') || request()->has('height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('width', 100000),
                    request()->input('height', 100000)
                ),
            ]);
        }

        $path = storage_path('app/public/employees');

        try {
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        } catch (\Exception $e) {
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => '/employees/' . $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function showFeedbackForm()
    {
        return view('frontend.pages.feedback');
    }

    public function storeFeedback(Request $request)
    {
        if ($request->has('employee_id')) {
            $employee = User::where('employee_id', $request->employee_id)->first();
            if (!$employee) {
                return redirect()->back()->with('error', 'Employe Id is invalid');
            }

            $satisfaction = Satisfaction::where('employee_id', $employee->employee_id)->first();
            if ($satisfaction) {
                return redirect()->back()->with('error', 'You have already leave us your feedback');
            }

            $request->validate([
                'rate' => 'required',
                'description' => 'required'
            ]);

            Satisfaction::create([
                'name' => $employee->name,
                'email' => $employee->email,
                'is_employee' => 1,
                'employee_id' => $employee->employee_id,
                'rate' => $request->rate,
                'description' => $request->description,
                'approved' => 0,
            ]);

            return redirect()->back()->with('success', 'Your Satisfaction Feedback is stored successfully');
        }

        $sanitized = $request->validate([
            'name' => 'required',
            'email' => 'required | unique:satisfactions',
            'is_employee' => 'nullable',
            'employee_id' => 'nullable',
            'rate' => 'required',
            'description' => 'required',
        ]);

        Satisfaction::create($sanitized);
        return redirect()->back()->with('success', 'Your Satisfaction Feedback is stored successfully');
    }
}
