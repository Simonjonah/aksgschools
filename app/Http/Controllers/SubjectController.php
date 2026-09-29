<?php

namespace App\Http\Controllers;

use App\Models\Classname;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Assignsubject;

use App\Models\Teacher;
use App\Models\Alm;
use App\Models\User;
use App\Models\Academicsession;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function addsubject(){
       
        return view('dashboard.admin.addsubject');
    }

    public function addsubjectsc(){

        $view_mysections = User::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.addsubjectsc', compact('view_mysections'));
    }

    public function createsubject (Request $request){
        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'subsection' => ['nullable', 'string', 'max:255'],
            
        ]);
        // dd($request->all());
        $addsubjects = new Subject();
        $addsubjects->subjectname = $request->subjectname;
        $addsubjects->section = $request->section;
        $addsubjects->subsection = $request->subsection;
        $addsubjects->connect = substr(rand(0,time()),0, 9);
        $addsubjects->save();
        if ($addsubjects) {
            return redirect()->back()->with('success', 'you have successfully registered');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function viewassignedteachersubject($connect){
        $edit_subject = Subject::where('connect', $connect)->first();
        if (!$edit_subject) {
            return redirect()->back()->with('fail', 'Subject not found.');
        }
        $view_teachers = Assignsubject::where('connect', $connect)->latest()->get();
        return view('dashboard.teacher.viewassignedteachersubject', compact('view_teachers', 'edit_subject'));
    }

    public function createsubjectsc(Request $request){
        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'subsection' => ['nullable', 'string', 'max:255'],
        ]);
        $addsubjects = new Subject();
        $addsubjects->subjectname = $request->subjectname;
        $addsubjects->section = $request->section;
        $addsubjects->subsection = $request->subsection;
        $addsubjects->connect = substr(rand(0,time()),0, 9);

        $addsubjects->save();
        if ($addsubjects) {
            return redirect()->back()->with('success', 'you have successfully registered');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function viewsubject(){
        $view_subjects = Subject::latest()->get();
        return view('dashboard.admin.viewsubject', compact('view_subjects'));
    }
    public function viewallsubjects(){
        $view_mysubjects = Subject::all();
        return view('dashboard.viewallsubjects', compact('view_mysubjects'));
    }
    public function viewallsubjectsbyhead(){
        $view_allsubjects = Subject::all();
        return view('dashboard.teacher.viewallsubjectsbyhead', compact('view_allsubjects'));
    }

     public function assinjuniorsubjectsview(){
        $view_allsubjects = Subject::all();
        return view('dashboard.teacher.assinjuniorsubjectsview', compact('view_allsubjects'));
    }
    

    public function subjectsassgned(){
        $view_mysubjects = Subject::where('school_id', auth::guard('web')->user()->school_id()
        )->get();
        return view('dashboard.subjectsassgned', compact('view_mysubjects'));
    }
    
    
    
    public function editsubject($connect){
        $edit_subject = Subject::where('connect', $connect)->first();
        return view('dashboard.admin.editsubject', compact('edit_subject'));
    }

    public function editsubjectsc($connect){
        $edit_subject = Subject::where('connect', $connect)->first();
        
        return view('dashboard.editsubjectsc', compact('edit_subject'));
    }

    public function editsubjectscbyprin($connect){
        $edit_subject = Subject::where('connect', $connect)->first();
        
        return view('dashboard.teacher.editsubjectscbyprin', compact('edit_subject'));
    }

   
    
    public function deletesubject($id){
        $subjectsdelete = Subject::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have successfully deleted');
    }
    
    
    public function updatesubjectscbyhead (Request $request, $id){
        $edit_subject = Subject::find($id);

        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
           
        ]);
        $edit_subject->subjectname = $request->subjectname;
        $edit_subject->section = $request->section;
        $edit_subject->update();
        if ($edit_subject) {
            return redirect()->back()->with('success', 'you have successfully updated');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    

    public function updatesubjectsc (Request $request, $connect){
        $edit_subject = Subject::where('connect', $connect)->first();

        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            // 'user_id' => ['required', 'string', 'max:255'],
            
        ]);
        $edit_subject->subjectname = $request->subjectname;
        $edit_subject->section = $request->section;
        $edit_subject->subsection = $request->subsection;
        // $edit_subject->user_id = $request->user_id;
        $edit_subject->update();
        if ($edit_subject) {
            return redirect()->back()->with('success', 'you have successfully updated');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    

    public function updatesubject (Request $request, $id){
        $edit_subject = Subject::find($id);

        $request->validate([
            'subjectname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            
        ]);
        $edit_subject->subjectname = $request->subjectname;
        $edit_subject->section = $request->section;
        $edit_subject->user_id = $request->user_id;
        $edit_subject->update();
        if ($edit_subject) {
            return redirect()->back()->with('success', 'you have successfully updated');
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    
    public function assignsubject($id){
        $assigned_subject = Subject::find($id);

        $assigned_teacherto_subjects = Teacher::where('status', 'approved')->get();
        $assigned_highschool_subjects = Teacher::where('status', 'approved')->get();
        $classnames = Classname::all();
        
        return view('dashboard.admin.assignsubject', compact('classnames', 'assigned_highschool_subjects', 'assigned_teacherto_subjects', 'assigned_subject'));
    }

    public function nurserysubjects(){
        $viewnursery_subjects = Subject::latest()->get();
        return view('dashboard.admin.nurserysubjects', compact('viewnursery_subjects'));
    }
     
    public function allsubjects(){
        $viewnursery_subjects = Subject::all();
        return view('dashboard.admin.allsubjects', compact('viewnursery_subjects'));
    }

    public function subdelte($id){
        $viewnursery_subjects = Subject::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }
    
    public function deletesubjectsc($connect){
        $viewnursery_subjects = Subject::where('connect', $connect)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }

    public function assignedsubjects($connect){
        $assigned_subject = Subject::where('connect', $connect)->first();

        $assigned_teacherto_subjects = Teacher::where('school_id', auth::guard('teacher')->user()->school_id
        )->whereNot('assign1', 'Principal')->get();
       
        $classnames = Classname::all();

        return view('dashboard.teacher.assignedsubjects', compact('assigned_teacherto_subjects', 'classnames', 'assigned_subject'));
    }


        public function assignedsubject($connect){
        $view_subject = Subject::where('connect', $connect)->first();
        if (!$view_subject) {
            return redirect()->back()->with('fail', 'Subject not found.');
        }
        $view_classes = Classname::where('section', 'Secondary')->get();
        $view_arms = Alm::all();
        $view_teachers = User::where('role', 'teacher')
        ->where('school_id', auth()->user()->school_id)
        ->get();
        $sessions = Academicsession::latest()->take(1)->get();
        return view('dashboard.teacher.assignedsubject', compact('view_arms', 'view_teachers', 'view_classes', 'view_subject', 'sessions'));
    }

    public function viewsinglesubjectschool($user_id){
        $view_subjects1 = Subject::where('user_id', $user_id)->first();
        $view_subjects = Subject::where('user_id', $user_id)->get();
        $view_subjectcounts = Subject::where('user_id', $user_id)->count();
        return view('dashboard.admin.viewsinglesubjectschool', compact('view_subjects1', 'view_subjectcounts', 'view_subjects'));
    }

    
}
