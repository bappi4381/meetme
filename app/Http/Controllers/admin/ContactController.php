<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        $totalContacts = Contact::count();
        // Get today's contacts (created_at is today)
        $todayContacts = Contact::whereDate('created_at', Carbon::today())->count();
        return view('admin.main.contact',compact('contacts','totalContacts','todayContacts'));
    }
    public function destroy($id)
    {
        // Find the education record by ID
        $contact = Contact::findOrFail($id);

        // Delete the record
        $contact->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('contact.index')->with('success', ' Manage Contact successfully!');
    }
   
}
