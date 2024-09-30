<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();
        return view('admin.main.education', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the request
         $validator = Validator::make($request->all(), [ // Use $request, not $this->request
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'cgpa' => 'nullable|numeric|between:0,4|regex:/^\d+(\.\d{1,2})?$/', // Optional field with numeric validation
        ]);
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new education record
        Education::create($validator->validated());

        // Redirect to the index page with a success message
        return redirect()->route('education.index')->with('success', 'Education added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'cgpa' => 'nullable|numeric|min:0|max:4', // Optional field with numeric validation
        ]);

        // Find the education record by ID
        $education = Education::findOrFail($id);

        // Update the record with new data
        $education->update($request->only('degree', 'institution', 'year', 'cgpa'));

        // Redirect to the index page with a success message
        return redirect()->route('education.index')->with('success', 'Education updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the education record by ID
        $education = Education::findOrFail($id);

        // Delete the record
        $education->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('education.index')->with('success', 'Education deleted successfully!');
    }
}
