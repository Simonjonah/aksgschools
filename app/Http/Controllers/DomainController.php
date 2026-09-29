<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DomainController extends Controller
{
    //
   //

   public function addpsychomotors(){

    return view('dashboard.addpsychomotors');
}

public function createsdomains (Request $request){
    $request->validate([

        'user_id' => ['required', 'string', 'max:255'],
        'cogname' => ['required', 'string', 'max:255'],
        'section' => ['required', 'string', 'max:255'],
        'psycomoto' => ['required', 'string', 'max:255'],
        
    ]);
    // dd($request->all());
    $add_psyo = new Domain();
    $add_psyo->psycomoto = $request->psycomoto;
    $add_psyo->user_id = $request->user_id;
    $add_psyo->cogname = $request->cogname;
    $add_psyo->section = $request->section;
    $add_psyo->ref_no = substr(rand(0,time()),0, 9);
    $add_psyo->save();

    return redirect()->back()->with('success', 'you have added successfully');
    
}
public function viewallpschomotors(){
    $view_domains = Domain::where('section', 'Primary')->get();
    $forcognitives = Domain::where('psycomoto', 'Cognitive Domain')->get();
    $forpschos = Domain::where('psycomoto', 'Psychomotor Domain')->get();
    
    
    return view('dashboard.viewallpschomotors', compact('forcognitives', 'forpschos', 'view_domains'));
}
public function editpsycomotor($ref_no){
    $edit_domains = Domain::where('ref_no', $ref_no)->first();

    return view('dashboard.editpsycomotor', compact('edit_domains'));
}

public function updatedomains (Request $request, $ref_no){
   $edit_domains = Domain::where('ref_no', $ref_no)->first();

    $request->validate([

        'user_id' => ['required', 'string', 'max:255'],
        'cogname' => ['required', 'string', 'max:255'],
        'ref_no1' => ['required', 'string', 'max:255'],
        'connect' => ['required', 'string', 'max:255'],
        'psycomoto' => ['required', 'string', 'max:255'],
    ]);

    $edit_domains->psycomoto = $request->psycomoto;
    $edit_domains->user_id = $request->user_id;
    $edit_domains->cogname = $request->cogname;
    $edit_domains->connect = $request->connect;
    $edit_domains->ref_no1 = $request->ref_no1;
    $edit_domains->update();

    return redirect()->back()->with('success', 'you have added successfully');

}
public function deletepsycomotor ($ref_no){
    $edit_events = Domain::where('ref_no', $ref_no)->delete();

 

    return redirect()->back()->with('success', 'you have added successfully');

}



public function firstermresults($term){
    $view_myresults = Term::where('term', $term)->first();
    $view_myresults = Result::where('term', $term)->where('user_id', auth::guard('web')->id())->get();

    $view_student_abujas = Term::where('term', $term)->first();
    $view_student_abujas = Result::where('term', $term)->where('user_id', auth::guard('web')->id())
    ->where('section', 'Secondary')->get();

    return view('dashboard.firstermresults', compact('view_student_abujas', 'view_myresults'));
}

public function viewterm($term){
    $view_termtudents = Term::where('term', $term)->first();
    $view_termtudents = Student::where('term', $term)->where('section', 'Primary')
    ->where('user_id', auth::guard('web')->id())
    ->get();

    $view_student_secondaries = Term::where('term', $term)->first();
    $view_student_secondaries = Student::where('term', $term)->where('user_id', auth::guard('web')->id())
    ->where('section', 'Secondary')->get();

    return view('dashboard.viewterm', compact('view_student_secondaries', 'view_termtudents'));
}

public function viewpsycomotor(){
    $view_domains = Domain::latest()->get();
    return view('dashboard.admin.viewpsycomotor', compact('view_domains'));
}

public function schoolspsyco($user_id){
    $viewsingle_domains = Domain::where('user_id', $user_id)->get();
    return view('dashboard.admin.schoolspsyco', compact('viewsingle_domains'));
}


public function teacherviewdomaiin(){
    $view_domains = Domain::where('section', auth()->user()->section)->get();

    return view('dashboard.teacher.teacherviewdomaiin', compact('view_domains'));
}





}
