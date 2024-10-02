<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('admin.main.blog',compact('blogs'));
    }
    public function store(Request $request){
         // Validate the incoming request data
         $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Initialize an array to store the data
        $data = $request->only('title', 'content');
        
        // Handle file upload for logo if present
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/blogImages', 'public'); // Store in the public disk
            $data['image'] = $path; // Save the path in the array
        }
        //dd($data);
        // Create a new blog record
        Blog::create($data); // Use Exprience
        
        // Redirect back to the index with a success message
        return redirect()->route('blog.index')->with('success', 'Blog added successfully!');
    }
    public function show_blog($id){
        $blog = Blog::with('author')->findOrFail($id);
        return view('admin.main.blogD', compact('blog'));
    }
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',  // 5 MB file size limit
        ]);

        // Update blog title and content
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];

        // If a new image is uploaded, store it
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/blogImages', 'public');
            $blog->image = $imagePath;
        }

        // Save the updated blog
        $blog->save();

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully!');
    }

}
