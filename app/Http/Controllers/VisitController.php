<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function createvisit (Request $request){
        $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string', 'max:255'],
        ]);
        $add = new Visit();
        $add->email = $request->email;
        $add->name = $request->name;
        $add->messages = $request->messages;
        $add->phone = $request->phone;
        $add->save();

        return redirect()->back()->with('success', 'you have submitted successfully, we will get back to you shortly!');

    }

    public function viewvisit(){
        $view_contacts = Visit::latest()->get();
        return view('dashboard.admin.viewvisit', compact('view_contacts'));
    }
    public function visitedelete ($id){
        $view_contacts = Visit::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have added successfully');
    }
}

