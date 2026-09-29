<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Lga;
use App\Models\Classname;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignsubject;
use Carbon\Carbon;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacherassign;
use App\Models\Term;
use App\Models\School;
// use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function addstudent(){
        $view_classes = Classname::all();
        $view_sesions = Academicsession::latest()->get();
        $view_alms = Alm::all();
        $view_lgas = Lga::orderBy('lga')->get();
        return view('dashboard.teacher.addstudent', compact('view_sesions', 'view_lgas', 'view_alms', 'view_classes'));
    }

    

    public function createstudent (Request $request){
        $request->validate([
            'school_id' => ['required', 'string'],
            'teacher_id' => ['nullable', 'string'],
            'user_id' => ['required', 'string'],
            'fname' => ['required', 'string'],
            'motor' => ['required', 'string'],
            'logo' => ['nullable', 'string'],
            'middlename' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'schoolname' => ['nullable', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'schooltype' => ['required', 'string'],
            'state' => ['required', 'string'],
            'lga' => ['required', 'string'],
            'gender' => ['required', 'string'],
            // 'age' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'term' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'ref_no1' => ['required', 'string'],
            'section' => ['required', 'string'],
            'subsection' => ['nullable', 'string'],
            'academic_session' => ['required', 'string'],
            'connect' => ['required', 'string'],
            'regnumber' => ['required', 'string',  'max:255', 'unique:students'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new Student();
        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->surname = $request->surname;
       $add_adimission->age = $request->dob
        ? Carbon::parse($request->dob)->age
        : null;
        $add_adimission->state = $request->state;
        $add_adimission->fname = $request->fname;
        $add_adimission->subsection = $request->subsection;
        $add_adimission->schooltype = $request->schooltype;
        
        $add_adimission->lga = $request->lga;
        $add_adimission->motor = $request->motor;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->address = $request->address;
        $add_adimission->schoolname = $request->schoolname;
       $add_adimission->alms = $request->alms;
        $add_adimission->classname = $request->classname;
        $add_adimission->regnumber = $request->regnumber;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        $add_adimission->user_id = $request->user_id;
        $add_adimission->school_id = $request->school_id;
        $add_adimission->term = $request->term;
        $add_adimission->classname = $request->classname;
        $add_adimission->logo = $request->logo;
        $add_adimission->slug = $request->slug;
         $add_adimission->ref_no = substr(rand(0,time()),0, 9);
         $add_adimission->status = 'admitted';
        $add_adimission->ref_no1 = $request->ref_no1;
        $add_adimission->centernumber = $request->centernumber;

        $add_adimission->save();
        return redirect()->back()->with('success', 'You have successfully registered');

    }

    public function updatecreatestudent (Request $request, $ref_no){
       $edit_primarypupils = Student::where('ref_no', $ref_no)->first();
        $request->validate([
           
            'fname' => ['nullable', 'string'],
          
            'middlename' => ['nullable', 'string'],
            'surname' => ['nullable', 'string'],
           
            'address' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string'],
            'lga' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            // 'age' => ['required', 'string'],
            'dob' => ['nullable', 'string'],
            'alms' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            
            
            'section' => ['nullable', 'string'],
            'academic_session' => ['nullable', 'string'],
            
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $edit_primarypupils['images'] = $path;
        }

        

        $edit_primarypupils->surname = $request->surname;
        $edit_primarypupils->middlename = $request->middlename;
        $edit_primarypupils->surname = $request->surname;
        $edit_primarypupils->subsection = $request->subsection;
        $edit_primarypupils->age = $request->dob
        ? Carbon::parse($request->dob)->age
        : null;
        $edit_primarypupils->state = $request->state;
        $edit_primarypupils->fname = $request->fname;
        $edit_primarypupils->lga = $request->lga;
        $edit_primarypupils->dob = $request->dob;
        $edit_primarypupils->gender = $request->gender;

        $edit_primarypupils->address = $request->address;
       $edit_primarypupils->alms = $request->alms;
        $edit_primarypupils->classname = $request->classname;
        $edit_primarypupils->academic_session = $request->academic_session;
        $edit_primarypupils->section = $request->section;
        $edit_primarypupils->subsection = $request->subsection;
        $edit_primarypupils->term = $request->term;
        $edit_primarypupils->classname = $request->classname;
        $edit_primarypupils->update();
        return redirect()->back()->with('success', 'You have successfully registered');

    }

    public function updatescstudent (Request $request, $ref_no){
        $edit_primarypupils = Student::where('ref_no', $ref_no)->first();

        $request->validate([
            'fname' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'surname' => ['nullable', 'string'],
            'schoolname' => ['nullable', 'string'],
            // 'address' => ['required', 'string', 'max:255'],
            'state' => ['nullable', 'string'],
            'lga' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'age' => ['nullable', 'string'],
            'dob' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'term' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        // $add_adimission = new Student();

        $edit_primarypupils['images'] = $path;
        $edit_primarypupils->surname = $request->surname;
        $edit_primarypupils->middlename = $request->middlename;
        $edit_primarypupils->surname = $request->surname;
        $edit_primarypupils->age = $request->age;
        $edit_primarypupils->state = $request->state;
        $edit_primarypupils->fname = $request->fname;
        $edit_primarypupils->lga = $request->lga;
        $edit_primarypupils->dob = $request->dob;
        $edit_primarypupils->gender = $request->gender;

        // $edit_primarypupils->address = $request->address;
        $edit_primarypupils->schoolname = $request->schoolname;
        
       $edit_primarypupils->alms = $request->alms;
        $edit_primarypupils->classname = $request->classname;
        $edit_primarypupils->regnumber = $request->regnumber;
        $edit_primarypupils->academic_session = $request->academic_session;
        $edit_primarypupils->section = $request->section;
        $edit_primarypupils->academic_session = $request->academic_session;
        $edit_primarypupils->term = $request->term;
       
        $edit_primarypupils->update();
        return redirect()->back()->with('success', 'You have successfully updated child records');

    }
    public function transferstudentbyhead($ref_no){
        $transfer_student = Student::where('ref_no', $ref_no)->first();
        $all_schools = School::all(); 
        $all_lgas = Lga::all();
        return view('dashboard.transferstudentbyhead', compact('all_lgas', 'all_schools', 'transfer_student'));
    }


    
    public function transferstudent($ref_no){
        $transfer_student = Student::where('ref_no', $ref_no)->first();
        // dd($transfer_student);
        $all_schools = School::where('schooltype', $transfer_student->schooltype)->latest()->get(); 
        $all_lgas = Lga::all();
        return view('dashboard.teacher.transferstudent', compact('all_lgas', 'all_schools', 'transfer_student'));
    }

    public function updatetransferstudent(Request $request, $ref_no){
        $transfer = Student::where('ref_no', $ref_no)->first();
        $request->validate([
            'school_id' => 'required|string',
            'lga' => 'required|string',
        ]);
        // dd($request->all());
    
        $transfer->school_id = $request->school_id;
        $transfer->lga = $request->lga;
        $transfer->update();
        return redirect()->back()->with('success', 'you have successfully to transfered');
    
    }

    public function updatetransferstudentby(Request $request, $ref_no){
        $transfer = Student::where('ref_no', $ref_no)->first();
        $request->validate([
            'school_id' => 'required|string',
            'lga' => 'required|string',
        ]);
        // dd($request->all());
    
        $transfer->school_id = $request->school_id;
        $transfer->lga = $request->lga;
        $transfer->update();
        return redirect()->back()->with('success', 'you have successfully to transfered');
    
    }
   
    public function viewyourstudentsecondary(){
        $view_secondarystudents = Student::where('user_id', auth::guard('web')->user()->user_id)->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.viewyourstudentsecondary', compact('lgas', 'view_sessions', 'view_classes', 'view_secondarystudents'));
    }


    
    
 

    public function editstudentsc($ref_no){
        $edit_primarypupils = Student::where('ref_no', $ref_no)->first();
        $view_classes = Classname::all();
        // $view_terms = Term::all();
        $view_sesions = Academicsession::latest()->get();
        
        $view_alms = Alm::all();
        $view_lgas = Lga::all();
        
        $view_schools = School::all();

        return view('dashboard.editstudentsc', compact('view_lgas', 'view_schools', 'view_alms', 'view_sesions', 'view_classes', 'edit_primarypupils'));
    }
    
    public function viewstu($ref_no){
        $view_primarypupils = Student::where('ref_no', $ref_no)->first();
        $view_classes = Classname::all();
        // $view_terms = Term::all();
        $view_sesions = Academicsession::latest()->get();
        
        $view_alms = Alm::all();
        $view_lgas = Lga::all();
        
        $view_schools = School::all();

        return view('dashboard.viewstu', compact('view_lgas', 'view_schools', 'view_alms', 'view_sesions', 'view_classes', 'view_primarypupils'));
    }
    

    public function editstudentsm($ref_no){
        $edit_primarypupils = Student::where('ref_no', $ref_no)->first();
        $view_classes = Classname::all();
        $view_sesions = Academicsession::latest()->get();
        $view_lgas = Lga::orderby('lga')->get();
        $view_alms = Alm::all();
        return view('dashboard.teacher.editstudentsm', compact('view_lgas', 'view_alms', 'view_sesions', 'view_classes', 'edit_primarypupils'));
    }


    public function viewsudentscm($ref_no){
        $edit_primarypupils = Student::where('ref_no', $ref_no)->first();
        $view_classes = Classname::all();
        $view_sesions = Academicsession::latest()->get();
        
        $view_alms = Alm::all();
        $view_lgas = Lga::all();

        return view('dashboard.teacher.viewsudentscm', compact('view_lgas', 'view_alms', 'view_sesions', 'view_classes', 'edit_primarypupils'));
    }


    public function addresults($ref_no){
        $view_student = Student::where('ref_no', $ref_no)->first();

        if ($view_student->section == 'Secondary' && auth::user()->section == 'Secondary' && auth::user()->role == 'teacher') {
           $view_subjects = Assignsubject::where('user_id', auth::user()->id)->get();

        }else if($view_student->section == 'Secondary' && $view_student->subsection == 'Junior Secondary' || $view_student->subsection == 'Senior Secondary' && auth::user()->role == 'Principal' && auth::user()->section == 'Secondary'){
            $view_subjects = Assignsubject::where('user_id', auth::user()->id)->get();

        }else if($view_student->section == 'Primary' && auth::user()->section == 'Primary'){
            $view_subjects = Subject::where('section', $view_student->section)->get();
        }
        else{
            $view_subjects = Subject::all();
        }
        // dd($view_subjects);
        return view('dashboard.teacher.addresults', compact('view_student', 'view_subjects'));

    }

    public function deletestudentsc($ref_no){
        $edit_primarypupils = Student::where('ref_no', $ref_no)->delete();

        return redirect()->back()->with('success', 'You have successfully deleted');
    }

   

  


  public function suspendedtudent($ref_no){
    $view_students = Student::where('ref_no', $ref_no)->first();
    $view_students->status = 'suspend';
    $view_students->save();
        return redirect()->back()->with('success', 'You have successfully suspended');

    }


    public function viewstudent($ref_no){
    $view_students = Student::where('ref_no', $ref_no)->first();
    return view('dashboard.admin.viewstudent', compact('view_students'));
    }

    public function editstudent($ref_no){
        $edit_students = Student::where('ref_no', $ref_no)->first();
        $view_classes = Classname::all();
        $view_alms = Alm::all();
        $view_lgas = Lga::all();
        $view_sesions = Academicsession::latest()->get();
        
        return view('dashboard.admin.editstudent', compact('view_sesions', 'view_lgas', 'view_alms', 'view_classes', 'edit_students'));
    }
    public function studentpdf($ref_no){
        $print_students = Student::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.studentpdf', compact('print_students'));
    }

    public function schoolstudents($user_id){
        // $views_students = User::where('user_id', $user_id)->first();
        $views_students = Student::where('user_id', $user_id)->get();
        // $classes = Classname::where('section', $schools_students->section)->get();


        return view('dashboard.admin.schoolstudents', compact('views_students'));
    }

    public function suspendedstu($ref_no){
        $suspend_student = Student::where('ref_no', $ref_no)->first();
        $suspend_student->status = 'suspend';
        $suspend_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    } 

    
    public function approvestudent($ref_no){
        $suspend_student = Student::where('ref_no', $ref_no)->first();
        $suspend_student->status = 'approved';
        $suspend_student->save();
        return redirect()->back()->with('success', 'you have Approved successfully');
    } 
    
    
    public function rejectedstudents($ref_no){
        $suspend_student = Student::where('ref_no', $ref_no)->first();
        $suspend_student->status = 'reject';
        $suspend_student->save();
        return redirect()->back()->with('success', 'you have rejected successfully');
    }
    
    public function suspendstudent($ref_no){
        $suspend_student = Student::where('ref_no', $ref_no)->first();
        $suspend_student->status = 'suspend';
        $suspend_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    public function addmitstu($ref_no){
        $suspend_student = Student::where('ref_no', $ref_no)->first();
        $suspend_student->status = 'approved';
        $suspend_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function suspendstudents(){
        $suspend_students = Student::where('status', 'suspend')->get();
        return view('dashboard.admin.suspendstudents', compact('suspend_students'));
    }

    public function viewsuspended(){
        $suspend_students = Student::where('status', 'suspend')->get();
        return view('dashboard.admin.viewsuspended', compact('suspend_students'));
    }

    public function studentsaddmit($ref_no){
        $admit_student = Student::where('ref_no', $ref_no)->first();
        $admit_student->status = 'admitted';
        $admit_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    
    public function rejectstudent($ref_no){
        $reject_student = Student::where('ref_no', $ref_no)->first();
        $reject_student->status = 'reject';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

  
  public function addresultsbyteacher($ref_no){
    $view_studentsubject = Student::where('ref_no', $ref_no)->first();
     if (Auth::guard('teacher')->user()->section == 'Primary') {
        $view_teachersubjects = Subject::all();
     }else{
        $view_teachersubjects = Teacherassign::where('teacher_id', auth::guard('teacher')->id())->get();
     }
    return view('dashboard.teacher.addresultsbyteacher', compact('view_teachersubjects','view_studentsubject'));
}

 

public function searchclass(Request $request){
    $request->validate([
        'classname' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
    ]);
    if($view_students = Student::where('classname', $request->classname)
    ->where('schoolname', $request->schoolname)
    ->exists()) {
        $view_students = Student::orderby('created_at', 'DESC')
        ->where('schoolname', $request->schoolname)
        ->where('classname', $request->classname)
   
        ->get(); 
        }else{
            return redirect()->back()->with('fail', 'There is no students in these class!');
        }
        if(auth()->user()->role == 'admin'){
            return view('dashboard.admin.yourclass', compact('view_students'));
        }elseif(auth()->user()->role == 'subadmin'){
            return view('dashboard.yourclass', compact('view_students'));
        }
    }


    

    public function searchresults(Request $request){
        $request->validate([
            'classname' => ['required', 'string'],
            'schoolname' => ['required', 'string'],
        ]);
        if($view_students = Student::where('classname', $request->classname)
        ->where('schoolname', $request->schoolname)
        ->exists()) {
            $view_students = Student::orderby('created_at', 'DESC')
            ->where('schoolname', $request->schoolname)
            ->where('classname', $request->classname)
       
            ->get(); 
            }else{
                return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.yourclass', compact('view_students'));
    
        }


    public function adminprogress(){
        $view_primarypupls = Student::latest()->get();
        return view('dashboard.admin.adminprogress', compact('view_primarypupls'));
    }

    public function addrenumbyteacher($ref_no){
        $view_primary = Student::where('ref_no', $ref_no)->first();
        return view('dashboard.teacher.addrenumbyteacher', compact('view_primary'));
    }

    public function addgregnobyteacher(Request $request, $ref_no){
        $view_primary = Student::where('ref_no', $ref_no)->first();
        $request->validate([
            'regnumber' => ['required', 'string', 'unique:students'],
        ]);

        $view_primary->regnumber = $request->regnumber;

        $view_primary->update();

        return redirect()->back()->with('success', 'You have added reg number successfully');
    }
     
    public function changeterm($ref_no){
        $change_term = Student::where('ref_no', $ref_no)->first();
        $view_acas = Academicsession::latest()->get();
        $view_classnames = Classname::where('section', auth()->user()->section)->get();
        return view('dashboard.teacher.changeterm', compact('view_classnames', 'view_acas', 'change_term'));
    }

    public function updtatetermteacher(Request $request, $ref_no){
        $change_term = Student::where('ref_no', $ref_no)->first();
        $request->validate([
            'term' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'classname' => ['required', 'string'],
        ]);

        $change_term->term = $request->term;
        $change_term->classname = $request->classname;
        $change_term->academic_session = $request->academic_session;

        $change_term->update();

        return redirect()->back()->with('success', 'You have updated the term successfully');
    }
    
     
     
    public function searchforstudentinclass(Request $request){
        // dd($request->all());
        $request->validate([
            'term' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'section' => ['required', 'string'],

        ]);
        // dd($request->all());
        if($view_primarypupils = Student::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)
        ->where('school_id', $request->school_id)
        ->where('section', $request->section)
        // ->where('alms', $request->alms)
        ->exists()) {
            $view_primarypupils = Student::orderby('created_at', 'DESC')
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)
            ->where('school_id', $request->school_id)
            ->where('section', $request->section)
            // ->where('alms', $request->alms)
            ->get(); 
            }else{
                // return view('dashboard.teacher.noresult');
                return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            if(auth()->user()->schooltype == 'SSEB' || auth()->user()->schooltype == 'SUBEB'){
                return view('dashboard.yourschoolstudentsterm', compact('view_primarypupils'));
            }
            return view('dashboard.teacher.yourschoolstudentsterm', compact('view_primarypupils'));
    
        }
        public function viewallstudentsbyprinc (){
            $view_primarypupils = Classname::all();
            $view_primarypupils = Student::latest()->get();
            $view_classes = Classname::all();
            $view_alms = Alm::all();
            $view_terms = Term::all();
            $view_sessions = Academicsession::latest()->get();
            return view('dashboard.teacher.viewallstudentsbyprinc ', compact('view_sessions', 'view_terms', 'view_alms', 'view_classes', 'view_primarypupils'));
        }

        

        public function restatedstudent (){
            $view_primarypupils = Classname::all();
            $view_primarypupils = Student::where('status', 'approved')->latest()->get();
            $view_classes = Classname::all();
            $view_alms = Alm::all();
            $view_terms = Term::all();
            $view_sessions = Academicsession::latest()->get();
            return view('dashboard.teacher.restatedstudent ', compact('view_sessions', 'view_terms', 'view_alms', 'view_classes', 'view_primarypupils'));
        }

        public function suspendstudentone (){
            $view_primarypupils = Classname::all();
            $view_primarypupils = Student::where('status', 'suspend')->latest()->get();
            $view_classes = Classname::all();
            $view_alms = Alm::all();
            $view_terms = Term::all();
            $view_sessions = Academicsession::latest()->get();
            return view('dashboard.teacher.suspendstudentone ', compact('view_sessions', 'view_terms', 'view_alms', 'view_classes', 'view_primarypupils'));
        }

        
        public function reachresultbystudentschead(Request $request){
            // dd($request->all());
            $request->validate([
                'classname' => ['nullable', 'string'],
                'school_id' => ['required', 'string'],
                // 'lga' => ['required', 'string'],
                'term' => ['nullable', 'string'],
                'academic_session' => ['required', 'string'],
                'section' => ['required', 'string'],
            ]);
            // dd($request->all());

            if($view_secondarystudents = Student::where('school_id', $request->school_id)
            // ->where('lga', $request->lga)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->exists()) {
                $view_secondarystudents = Student::orderby('created_at', 'DESC')
                ->where('school_id', $request->school_id)
                ->where('classname', $request->classname)
                // ->where('lga', $request->lga)
                    ->where('term', $request->term)
                    ->where('academic_session', $request->academic_session)
                    ->where('section', $request->section)
                ->get(); 

                }else{
                    return redirect()->back()->with('fail', 'There is no students in these class!');
                }
                return view('dashboard.yourclassstudent', compact('view_secondarystudents'));
        
        }



        public function reachresultbystudentss(Request $request){
            // dd($request->all());
            $request->validate([
                'classname' => ['nullable', 'string'],
                'schoolname' => ['required', 'string'],
                'lga' => ['required', 'string'],
                'alms' => ['nullable', 'string'],
                'academic_session' => ['required', 'string'],
                'section' => ['required', 'string'],
            ]);
            if($view_secondarystudents = Student::where('schoolname', $request->schoolname)
            ->where('lga', $request->lga)
            ->where('alms', $request->alms)
            ->where('classname', $request->classname)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->exists()) {
                $view_secondarystudents = Student::orderby('created_at', 'DESC')
                ->where('schoolname', $request->schoolname)
                ->where('classname', $request->classname)
                ->where('lga', $request->lga)
                    ->where('alms', $request->alms)
                    ->where('academic_session', $request->academic_session)
                    ->where('section', $request->section)
                ->get(); 
                }else{
                    return redirect()->back()->with('fail', 'There is no students in these class!');
                }
                return view('dashboard.yourclassstudent', compact('view_secondarystudents'));
        
        }


        public function reachresultbystudentbyadmin(Request $request){
            // dd($request->all());
            $request->validate([
                'schoolname' => ['required', 'string'],
                'lga' => ['required', 'string'],
                'section' => ['required', 'string'],
            ]);
            if($view_secondarystudents = Student::where('schoolname', $request->schoolname)
            ->where('lga', $request->lga)
            ->where('alms', $request->alms)
            ->where('classname', $request->classname)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->exists()) {
                $view_secondarystudents = Student::orderby('created_at', 'DESC')
                ->where('schoolname', $request->schoolname)
                ->where('classname', $request->classname)
                ->where('lga', $request->lga)
                    ->where('alms', $request->alms)
                    ->where('academic_session', $request->academic_session)
                    ->where('section', $request->section)
                ->get(); 
                }else{
                    return redirect()->back()->with('fail', 'There is no students in these class!');
                }
                return view('dashboard.admin.sttudentsbyadmin', compact('view_secondarystudents'));
        
        }
        
        
    public function viewallstudentsadmin($slug){
        $viewstudents = Student::where('slug', $slug)->latest()->get();
        return view('dashboard.admin.viewallstudentsadmin', compact('viewstudents'));
    }

    public function viewsrejectedstudentsad($slug){
        $viewstudents = Student::where('slug', $slug)->where('status', 'reject')->latest()->get();
        return view('dashboard.admin.viewsrejectedstudentsad', compact('viewstudents'));
    }

    public function viewsuspendedstudentsad($slug){
        $viewstudents = Student::where('slug', $slug)->where('status', 'suspend')->latest()->get();
        return view('dashboard.admin.viewsuspendedstudentsad', compact('viewstudents'));
    }


    public function viewschoolsadmittedstudentad($slug){
        $viewstudents = Student::where('slug', $slug)->latest()->get();
        return view('dashboard.admin.viewschoolsadmittedstudentad', compact('viewstudents'));
    }

    
    public function addresultsad1($ref_no){
        $view_studentsubject = Student::where('ref_no', $ref_no)->first();
         
        $view_teachersubjects = Subject::all();
    //    $view_teachersubjects = Teacherassign::where('teacher_id', auth::guard('web')->id())->get();
        return view('dashboard.admin.addresultsad1', compact('view_teachersubjects','view_studentsubject'));
    }

    public function studenttrash(){
        $students_trashes = Student::onlyTrashed()->where('schooltype', auth::guard('web')->user()->schooltype)->latest()->get();
        return view('dashboard.studenttrash', compact('students_trashes'));
    }


    public function restorestudent($id){
        $restore_student = Student::withTrashed()->find($id);
        $restore_student->restore();
        return redirect()->back()->with('success', 'you have restored successfully');
    }

    public function deletestudentfully($id){
        $force_delete_student = Student::withTrashed()->find($id);
        $force_delete_student->forceDelete();
        return redirect()->back()->with('success', 'you have permanently deleted successfully');
    }
}
