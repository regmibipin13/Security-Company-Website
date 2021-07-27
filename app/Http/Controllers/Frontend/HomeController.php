<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        return view('frontend.pages.services');
    }

    public function work()
    {
        return view('frontend.pages.work');
    }

    public function singleService($service)
    {
        return view('frontend.pages.single_service');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function teams()
    {
        return view('frontend.pages.teams');
    }
}
