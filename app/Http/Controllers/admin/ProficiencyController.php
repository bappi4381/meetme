<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Exprience; // Keep the model name as Exprience
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProficiencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        $expriences = Exprience::all(); // Use Exprience
        return view('admin.main.proficiency', compact('skills', 'expriences'));
    }

    /**
     * Store a new skill.
     */
    public function skill_store(Request $request)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
        ]);

        Skill::create($request->only('skill'));

        return redirect()->route('proficiency.index')->with('success', 'Skill added successfully!');
    }

    /**
     * Delete a skill.
     */
    public function skills_destroy($id)
    {
        $skill = Skill::find($id);

        if ($skill) {
            $skill->delete();
            return redirect()->route('proficiency.index')->with('success', 'Skill deleted successfully.');
        }

        return redirect()->route('proficiency.index')->with('error', 'Skill not found.'); // Handle the case where the skill does not exist
    }

    /**
     * Store a newly created experience.
     */
    public function exprience_store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'job_title' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Initialize an array to store the data
        $data = $request->only('job_title', 'year');

        // Handle file upload for logo if present
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads/logos', 'public'); // Store in the public disk
            $data['logo'] = $path; // Save the path in the array
        }
        
        // Create a new experience record
        Exprience::create($data); // Use Exprience
        
        // Redirect back to the index with a success message
        return redirect()->route('proficiency.index')->with('success', 'Experience added successfully!');
    }

    // Other methods...

    public function exprience_destroy($id)
    {
        $exprience = Exprience::find($id);
        

        if ($exprience) {
            $exprience->delete();
            return redirect()->route('proficiency.index')->with('success', 'Exprience deleted successfully.');
        }

        return redirect()->route('proficiency.index')->with('error', 'Exprience not found.'); // Handle the case where the skill does not exist
    }
}
