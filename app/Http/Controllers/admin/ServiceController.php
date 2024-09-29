<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('admin.main.service', compact('services'));
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Service::create($request->all());
        return redirect()->route('service.index')->with('success', 'Service created successfully.');
    }
    public function edit($id)
    {
        // Fetch the service by ID
        $service = Service::findOrFail($id);

        // Pass the service data to the edit view
        return view('admin.main.service', compact('service'));
    }
    public function update(Request $request,$id)
    {
        $service = Service::findOrFail($id);
        // Validate the updated data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
        ]);

        // Update the service with new data
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        // Redirect back to the service details page with success message
        return redirect()->route('service.index', $service->id)->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service,$id)
    {
        $service = Service::find($id);
        // Delete the service
        $service->delete();

        // Redirect back to the services list with success message
        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
