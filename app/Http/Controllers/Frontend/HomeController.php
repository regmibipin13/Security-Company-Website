<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
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
