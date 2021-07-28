<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\GalleryCollection;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use MediaUploadingTrait;

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
        $service = Service::where('slug',$slug)->first();
        $service->load(['media']);
        return view('frontend.pages.single_service',compact('service'));
    }

    public function about()
    {
        $website = Website::first();
        $website->load(['media']);
        $galleries = GalleryCollection::with(['media'])->paginate(2);
        return view('frontend.pages.about',compact('website','galleries'));
    }
    public function contact()
    {
        $settings = Setting::first();
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
}
