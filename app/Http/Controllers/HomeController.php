<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Exprience;
use App\Models\Education;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
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
        $blogs = Blog::all();
        return view('frontend.main.blog',compact('profile','blogs'));
    }
    public function blogDetalis($id){
        $profile = Profile::first();
        $blog = Blog::findOrFail($id);
        return view('frontend.main.blogdDetalis',compact('profile','blog'));
    }
    public function contact(){
        $profile = Profile::first();
        return view('frontend.main.contact',compact('profile'));
    }
    public function contact_admin(Request $request)
    {
        $validator = Validator::make($request->all(), [ // Use $request, not $this->request
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'nullable|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new Contact record
        contact::create($validator->validated());

        // Redirect to the index page with a success message
        return redirect()->route('contact')->with('success', 'Information submit successfully!');
    }
}
