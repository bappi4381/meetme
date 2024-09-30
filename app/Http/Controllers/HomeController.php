<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Exprience;
use App\Models\Education;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $profile = Profile::first();
        $services = Service::all();
        return view('frontend.main.index',compact('profile','services'));
    }
    public function resume(){
        $profile = Profile::first();
        $skills = Skill::all();
        $experiences = Exprience::all();
        $educations = Education::all();
        return view('frontend.main.resume',compact('profile','skills','experiences','educations'));
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
