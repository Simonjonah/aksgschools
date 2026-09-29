<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SectionController extends Controller
{

    public function addsection(){

        return view('dashboard.addsection');
    }
    public function createsection (Request $request){
        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'ref_no1' => ['required', 'string', 'max:255'],
        ]);
        // dd($request->all());
        $add_section = new Section();
        $add_section->user_id = $request->user_id;
        $add_section->section = $request->section;
        $add_section->ref_no1 = $request->ref_no1;
        $add_section->connect = substr(rand(0,time()),0, 9);

        $add_section->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function viewallsection(){
        $view_sections = Section::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.viewallsection', compact('view_sections'));
    }
    public function editsection($connect){
        $edit_sections = Section::where('connect', $connect)->first();

        return view('dashboard.editsection', compact('edit_sections'));
    }

    public function updatesection (Request $request, $connect){
        $edit_sections = Section::where('connect', $connect)->first();


        $request->validate([

            'user_id' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
        ]);
    
        $edit_sections->user_id = $request->user_id;
        $edit_sections->section = $request->section;
        $edit_sections->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function deletesection($connect){
        $edit_events = Section::where('connect', $connect)->delete();

     

        return redirect()->back()->with('success', 'you have added successfully');

    }


   

    public function firssectionresults($section){
        $view_myresults = Section::where('section', $section)->first();
        $view_myresults = Result::where('section', $section)->where('user_id', auth::guard('web')->id())->get();

        $view_student_abujas = Section::where('section', $section)->first();
        $view_student_abujas = Result::where('section', $section)->where('user_id', auth::guard('web')->id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.firssectionresults', compact('view_student_abujas', 'view_myresults'));
    }

    public function viewyourteachers($section){
        $view_myresults = Section::where('section', $section)->first();
        $view_myteachers = Teacher::where('section', $section)->where('user_id', auth::guard('web')->id())->get();

       
        return view('dashboard.viewyourteachers', compact('view_myteachers', 'view_myresults'));
    }

    

    public function viewsection($section){
        $view_sectiontudents = Section::where('section', $section)->first();
        $view_sectiontudents = Student::whereau('section', $section)
        ->where('user_id', th::guard('web')->id())
        ->get();

       
        return view('dashboard.viewsection', compact('view_sectiontudents'));
    }

    

    

}
