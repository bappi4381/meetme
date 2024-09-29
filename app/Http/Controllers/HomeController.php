<?php

namespace App\Http\Controllers;
use App\Models\profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $profile = Profile::first();
        return view('frontend.main.index',compact('profile'));
    }
    public function resume(){
        $profile = Profile::first();
        return view('frontend.main.resume',compact('profile'));
    }
    public function portfolio(){
        $profile = Profile::first();
        return view('frontend.main.portfolio',compact('profile'));
    }
    public function blog(){
        $profile = Profile::first();
        return view('frontend.main.blog',compact('profile'));
    }
    public function blogDetalis(){
        $profile = Profile::first();
        return view('frontend.main.blog-detalis',compact('profile'));
    }
    public function contact(){
        $profile = Profile::first();
        return view('frontend.main.contact',compact('profile'));
    }
}
