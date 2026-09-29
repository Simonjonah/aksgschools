<?php

namespace App\Http\Controllers;

use App\Models\Teacherassign;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class TeacherassignController extends Controller
{
   

    public function assignsubjectstoteacher (Request $request, $id){
        $add_assignteacher = User::where('id', $id)->first();
        $request->validate([
            'teacher_id' => ['required', 'string', 'max:255'],
            'subject_id' => ['required', 'string', 'max:255'],
            'school_id' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],

        ]);
        $add_assignteacher = new Teacherassign();
        $add_assignteacher->teacher_id = $request->teacher_id;
        $add_assignteacher->subject_id = $request->subject_id;
        $add_assignteacher->school_id = $request->school_id;
        $add_assignteacher->slug = $request->slug;
        $add_assignteacher->section = $request->section;
        $add_assignteacher->classname = $request->classname;
    
        $add_assignteacher->save();
        if ($add_assignteacher) {

            return redirect()->back()->with('success', 'you have added successfully');
            //return Redirect::to('http://127.0.0.1:8000/admin/viewsubject')->with('success', 'you have added successfully');
        }
     
    }

    public function assignsubjectstoteacherbysc (Request $request){
        // $add_assignteacher = User::where('id', $id)->first();
        $request->validate([
            'ref_no1' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            'teacher_id' => ['required', 'string', 'max:255'],
            'subject_id' => ['required', 'string', 'max:255'],
            'school_id' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            'classname' => ['required', 'string', 'max:255'],
        ]);
        $add_assignteacher = new Teacherassign();
        $add_assignteacher->ref_no1 = $request->ref_no1;
        $add_assignteacher->user_id = $request->user_id;
        $add_assignteacher->teacher_id = $request->teacher_id;
        $add_assignteacher->subject_id = $request->subject_id;
        $add_assignteacher->school_id = $request->school_id;
        $add_assignteacher->slug = $request->slug;
        $add_assignteacher->section = $request->section;
        $add_assignteacher->classname = $request->classname;
    
        $add_assignteacher->save();
        if ($add_assignteacher) {

            return redirect()->back()->with('success', 'you have added successfully');
            //return Redirect::to('http://127.0.0.1:8000/admin/viewsubject')->with('success', 'you have added successfully');
        }
     
    }

    public function teachertosubjects(){
        $view_teachersubjects = Teacherassign::all();
        return view('dashboard.admin.teachertosubjects', compact('view_teachersubjects'));
    }

    public function viewteachersubjects($teacher_id){
        $find_teachersubjects = Teacherassign::find($teacher_id);
        $find_teachersubjects = $display_teachersubjects = Teacherassign::where('teacher_id', $teacher_id)->get();

        return view('dashboard.admin.viewteachersubjects', ['display_teachersubjects' => $display_teachersubjects, 'find_teachersubjects' => $find_teachersubjects]);
    }

    public function mysubjects(){
        $my_subjects = Teacherassign::where('teacher_id', auth::guard('web')->id()
        )->get();

        return view('dashboard.mysubjects', compact('my_subjects'));
    }

    

    public function deletesubjectscs($id){
        $view_subjectsteachers = Teacherassign::where('id', $id)->delete();

        return redirect()->back()->with('success', 'You have deleted successfully');
    }

    

    
    
}
