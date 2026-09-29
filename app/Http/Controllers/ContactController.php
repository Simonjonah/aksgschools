<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function createcontact (Request $request){
        $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);
        $add_slider = new Contact();
        
        $add_slider->email = $request->email;
        $add_slider->firstname = $request->firstname;
        $add_slider->message = $request->message;
        $add_slider->phone = $request->phone;
        $add_slider->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function viewcontact(){
        $view_contacts = Contact::all();
        return view('dashboard.admin.viewcontact', compact('view_contacts'));
    }
    public function contactdelete($id){
        $view_contacts = Contact::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have added successfully');
    }
}
