<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignsubject;
use App\Models\User;
use App\Models\Classname;
use App\Models\Alm;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class AssignsubjectController extends Controller
{
     public function createassignsubject(Request $request)
{
    $request->validate([
        'user_id' => 'required|string|max:255',
        'subjectname' => 'required|string|max:255',
        'subject_id' => 'required',
        'connect' => 'required|string|max:255',
        'section' => 'required|string|max:255',
        'classname' => 'required|string|max:255',
        'subsection' => 'nullable|string|max:255',
        'term' => 'required|string|max:255',
        'alms' => 'nullable|string|max:255',
        'academic_session' => 'required|string|max:255',
    ]);
// dd($request->all());
    // Get the same school_id that will be saved
    $schoolId = auth()->user()->school_id;

    // Check if the exact assignment already exists
    $exist = Assignsubject::where('alms', $request->alms)
        ->where('term', $request->term)
        ->where('user_id', $request->user_id)
        ->where('subject_id', $request->subject_id)
        ->where('school_id', $schoolId)
        ->where('subjectname', $request->subjectname)
        ->where('ref_no', $request->ref_no)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)
        ->where('connect', $request->connect)
        ->where('section', $request->section)
        ->where(function ($query) use ($request) {
            if (empty($request->subsection)) {
                $query->whereNull('subsection')
                      ->orWhere('subsection', '');
            } else {
                $query->where('subsection', $request->subsection);
            }
        })
        ->exists();

    // If already exists, don't save
    if ($exist) {
        return redirect()->back()->with(
            'fail',
            'You have already assigned this subject to this teacher.'
        );
    }

    // Create new assignment
    $assignedTeacher = new Assignsubject();

    $assignedTeacher->subject_id = $request->subject_id;
    $assignedTeacher->user_id = $request->user_id;
    $assignedTeacher->school_id = $schoolId;

    $assignedTeacher->alms = $request->alms;
    $assignedTeacher->subjectname = $request->subjectname;
    $assignedTeacher->connect = $request->connect;
    $assignedTeacher->ref_no = $request->ref_no;
    $assignedTeacher->term = $request->term;
    $assignedTeacher->academic_session = $request->academic_session;
    $assignedTeacher->subsection = $request->subsection;
    $assignedTeacher->ref_no1 = 'ATS-' . uniqid();
    $assignedTeacher->section = $request->section;
    $assignedTeacher->classname = $request->classname;

    $assignedTeacher->save();

    return redirect()->back()->with(
        'success',
        'You have Assigned Subject successfully.'
    );
}



public function editassignesubjects($ref_no1){
        $edit_assigsubject = Assignsubject::where('ref_no1', $ref_no1)->first();
        $view_subjects = Subject::where('subsection', $edit_assigsubject->subsection)->get();
// dd($view_subjects);


        $view_teachers = User::where('role', 'teacher')
        ->where('school_id', auth::guard('web')->user()->school_id)
        ->latest()->get();
        $view_classes = Classname::where('section', 'Secondary')->get();
        $view_arms = Alm::all();
        
        return view('dashboard.teacher.editassignesubjects', compact('view_subjects', 'view_arms', 'view_classes', 'view_teachers', 'edit_assigsubject'));
    }



    

    public function updateassignsubject(Request $request, $ref_no1){
        $request->validate([
            'user_id' => 'required|string|max:255',
            'subjectname' => 'required|string|max:255',
            'connect' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'classname' => 'required|string|max:255',
            'subsection' => 'required|string|max:255',
            'term' => 'required|string|max:255',
            'alms' => 'required|string|max:255',
            
        ]);
        
        $edit_assigsubject = Assignsubject::where('ref_no1', $ref_no1)->first();
        $edit_assigsubject->subject_id = $request->subject_id;
        $edit_assigsubject->user_id = $request->user_id;
        $edit_assigsubject->alms = $request->alms;
        $edit_assigsubject->subjectname = $request->subjectname;
        $edit_assigsubject->connect = $request->connect;
        $edit_assigsubject->term = $request->term;
        $edit_assigsubject->subsection = $request->subsection;
        $edit_assigsubject->section = $request->section;
        $edit_assigsubject->classname = $request->classname;
        $edit_assigsubject->update();
        return redirect()->back()->with('success', 'You have Assigned Subject successfully.');
    }

    public function deleteassignsubjects($ref_no1){
        $delete_subject = Assignsubject::where('ref_no1', $ref_no1)->first();
        if (!$delete_subject) {
            return redirect()->back()->with('fail', 'Subject not found.');
        }
        $delete_subject->delete();

        return redirect()->back()->with('success', 'Assigned subject deleted successfully.');
    }

    public function viewassignsubjectsteachers(){
        $view_teachers = Assignsubject::latest()->get();
        return view('dashboard.admin.viewassignsubjectsteachers', compact('view_teachers'));
        
    }

    public function viewallsubjectsteacher(){
        $view_subjectsteachers = Assignsubject::where('school_id', auth::guard()->user()->school_id)->latest()->get();
        return view('dashboard.teacher.viewallsubjectsteacher', compact('view_subjectsteachers'));
    }


     public function viewmyassignsubjects(){
        $view_teachers = Assignsubject::where('user_id', auth::guard()->user()->id)->latest()->get();
        return view('dashboard.viewmyassignsubjects', compact('view_teachers'));
        
    }
    


    public function myteachersubjects(){
        $my_subjects = Assignsubject::where('user_id', auth::guard('web')->id()
        )->get();

        return view('dashboard.teacher.myteachersubjects', compact('my_subjects'));
    }
    

}
