<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProtfolioController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view ('admin.main.protfolio',compact('projects'));
    }
    
    public function store(Request $request)
    {
    // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',  // Assuming you want to include subtitle as well
            'description' => 'required|string',  // Change 'content' to 'description' to match your model
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Initialize an array to store the data
        $data = $request->only('title', 'subtitle', 'description');  // Include subtitle if necessary

        // Handle file upload for image if present
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/projectImages', 'public'); // Store in the public disk
            $data['image'] = $path; // Save the path in the array
        }

        // Create a new project record
        Project::create($data); // Make sure to use the correct model name

        // Redirect back to the index with a success message
        return redirect()->route('protfolio.index')->with('success', 'Project added successfully!'); // Update route name as needed
    }
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $project->update([
                'image' => $imagePath,
            ]);
        }

        $project->update($validated);

        return redirect()->back()->with('success', 'Project updated successfully!');
    }

    // Delete a project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }



}
