<?php

namespace App\Http\Controllers\admin;
use App\Models\profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        $profile = profile::first();
        return view('admin.main.profile',compact('profile'));
    }
    public function storeProfile(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fa_link' => 'required|url',
            'li_link' => 'required|url',
            'x_link' => 'required|url',
            'git_link' => 'required|url',
            'be_link' => 'required|url',
            'dr_link' => 'required|url',
            'phone' => 'required|string|regex:/^[0-9]{10,15}$/',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'cv_link' => 'required|url',
            'obj' => 'required|string|max:1000',
        ]);

        // Check if we're updating an existing profile
        $profile = $id ? profile::find($id) : null;

        // Handle file upload and update image if provided
        if ($request->hasFile('image')) {
            $existingImagePath = $profile ? $profile->image : null;

            // Store the new image
            $imagePath = $request->file('image')->store('uploads/images', 'public');

            // Delete the old image if it exists
            if ($existingImagePath && \Storage::disk('public')->exists($existingImagePath)) {
                \Storage::disk('public')->delete($existingImagePath);
            }
        } else {
            // If no new image is uploaded, keep the old image if the profile exists
            $imagePath = $profile ? $profile->image : null;
        }

        // Create or update the profile
        profile::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'position' => $request->position,
                'image' => $imagePath,
                'phone' => $request->phone,
                'email' => $request->email,
                'location' => $request->location,
                'cv_link' => $request->cv_link,
                'fa_link' => $request->fa_link,
                'li_link' => $request->li_link,
                'x_link' => $request->x_link,
                'git_link' => $request->git_link,
                'be_link' => $request->be_link,
                'dr_link' => $request->dr_link,
                'obj' => $request->obj,
            ]
        );

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}
