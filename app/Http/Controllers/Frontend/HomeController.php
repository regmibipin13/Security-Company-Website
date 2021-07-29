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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // use MediaUploadingTrait;

    public function index()
    {
        $website = Website::with(['media'])->first();
        $services = Service::with(['media'])->orderBy('id','desc')->limit(6)->get();
        $teams = Team::with(['media'])->limit(6)->get();
        $testimonials = Testimonial::with(['media'])->limit(2)->get();
        return view('frontend.pages.home',compact('website','services','teams','testimonials'));
    }

    public function services()
    {
        $services = Service::with(['media'])->paginate(12);
        return view('frontend.pages.services',compact('services'));
    }


    public function singleService($slug)
    {
        $service = Service::where('slug',$slug)->firstOrFail();
        $service->load(['media']);
        return view('frontend.pages.single_service',compact('service'));
    }

    public function about()
    {
        $website = Website::firstOrFail();
        $website->load(['media']);
        // $galleries = GalleryCollection::with(['media'])->paginate(2);
        return view('frontend.pages.about',compact('website'));
    }
    public function contact()
    {
        $settings = Setting::firstOrFail();
        return view('frontend.pages.contact',compact('settings'));
    }

    public function teams()
    {
        $teams = Team::with(['media'])->paginate(18);
        $website = Website::first();
        return view('frontend.pages.teams',compact('teams','website'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::paginate(10);
        return view('frontend.pages.testimonials',compact('testimonials'));
    }


    // Api Controller From Here

    public function apiCompany(Request $request)
    {
        $email = Setting::first()->company_email;
        Mail::to($email)->queue(new CompanyMail($request->all()));

        return response()->json(['success'=>'Operation Success']);
    }
    public function apiEmployee(Request $request)
    {
        $sanitized = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'nullable',
            'files' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'files' => $request->input('files')
        ];
        $email = Setting::first()->company_email;
        Mail::to($email)->queue(new EmployeeMail($data));
        // return "success";
        return redirect()->back()->with('success','Form Submitted Successfully');
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
            'name'          => '/employees/'.$name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

}
