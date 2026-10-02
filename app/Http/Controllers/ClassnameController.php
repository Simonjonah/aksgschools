<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Http\Resources\ClassnameCollection;

use App\Models\Classname;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Term;
use App\Models\Transaction;
use App\Models\Teacher;
use App\Models\user;
use App\Models\Alm;
use App\Models\Lga;
use App\Models\School;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ClassnameController extends Controller
{
    public function addclass (){

        return view('dashboard.admin.addclass');
    }

     public function addsecondaryClasses(){

        return view('dashboard.admin.addsecondaryClasses');
    }
     public function addtechClasses(){

        return view('dashboard.admin.addtechClasses');
    }

    
    public function createclasses (Request $request){
        $request->validate([

            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);
        $addclasses = new Classname();
        $addclasses->classname = $request->classname;
        $addclasses->section = $request->section;
        $addclasses->subsection = $request->subsection;
        $addclasses->ref_no = $request->ref_no;
        $addclasses->connect = substr(rand(0,time()),0, 9);
        $addclasses->ref_no = substr(rand(0,time()),0, 9);
       
        $addclasses->save();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function addclassessc(){
        $view_classes_scs = User::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.addclassessc', compact('view_classes_scs'));
    }


    public function createclassessc (Request $request){
        $request->validate([

            'classname' => ['required', 'string', 'unique:classnames', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);
        $addclasses = new Classname();
        $addclasses->classname = $request->classname;
        $addclasses->section = $request->section;
        $addclasses->subsection = $request->subsection;

        $addclasses->connect = substr(rand(0,time()),0, 9);
        $addclasses->ref_no = substr(rand(0,time()),0, 9);
       
        $addclasses->save();

        return redirect()->back()->with('success', 'you have added successfully');
    }


    
    public function viewclassestables(){
        $view_clesses = Classname::orderBy('classname')->get();
        return view('dashboard.admin.viewclassestables', compact('view_clesses'));
    }

    public function editclasses($ref_no){
        $edit_clesses = Classname::where('ref_no', $ref_no,)->first();
        return view('dashboard.admin.editclasses', compact('edit_clesses'));
    }

    public function editclas1($connect){
        $edit_cless1 = Classname::where('connect', $connect)->first();
        return view('dashboard.editclas1', compact('edit_cless1'));
    }
    

    public function viewallclasses(){
        $view_classesbysc = Classname::all();
        return view('dashboard.viewallclasses', compact('view_classesbysc'));
    }

    
    public function updatecclassessc (Request $request, $connect){
        $edit_cless1 = Classname::where('connect', $connect)->first();
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);

        $edit_cless1->classname = $request->classname;
        $edit_cless1->section = $request->section;
        $edit_cless1->subsection = $request->subsection;

        $edit_cless1->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }



    public function updateclass (Request $request, $ref_no){
        $edit_clesses = Classname::where('ref_no', $ref_no,)->first();

        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            
        ]);

        $edit_clesses->classname = $request->classname;
        $edit_clesses->section = $request->section;
        $edit_clesses->subsection = $request->subsection;

        $edit_clesses->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function classesdelete($ref_no){
        $classdelted = Classname::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function deleteclass($connect){
        $classdelted = Classname::where('connect', $connect)->delete();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    

    public function classrooms($classname){
        $view_classstudents = Classname::where('classname', $classname)->first();
        $view_classstudents = user::where('classname', $classname)
        ->where('section', 'Primary')->get();

        $view_student_abujas = Classname::where('classname', $classname)->first();
        $view_student_abujas = user::where('classname', $classname)
        ->where('section', 'Secondary')->get();
        $view_classes = Classname::all();
        return view('dashboard.admin.classrooms', compact('view_classes', 'view_student_abujas', 'view_classstudents'));
    }


    public function viewclassesbysc($classname){
        $view_classnametudents = Classname::where('classname', $classname)->first();
        $view_classnametudents = Student::where('classname', $classname)
        ->where('schooltype', auth::guard('web')->user()->schooltype)->latest()
        ->get();

        $view_student_secondaries = Classname::where('classname', $classname)->first();
        $view_student_secondaries = Student::where('classname', $classname)->where('schooltype', auth::guard('web')->user()->schooltype)
        ->where('section', 'Secondary')->get();

        return view('dashboard.viewclassesbysc', compact('view_student_secondaries', 'view_classnametudents'));
    }


    public function viewclassesbyprinc($classname){
        $view_classnametudents = Classname::where('classname', $classname)->first();
        $view_classnametudents = Student::where('classname', $classname)
        ->get();

        $view_student_secondaries = Classname::where('classname', $classname)->first();
        $view_student_secondaries = Student::where('classname', $classname)->where('school_id', auth::id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.teacher.viewclassesbyprinc', compact('view_student_secondaries', 'view_classnametudents'));
    }


    
    public function viewclasses(){
        $view_clesses = Classname::orderBy('created_at', 'DESC')->get();
        
        return view('dashboard.admin.viewclasses', compact('view_clesses'));
    }

    public function viewsingleclassschool($user_id){
        $view_clesses1 = Classname::where('user_id', $user_id)->first();
        $view_clesses = Classname::where('user_id', $user_id)->get();
        $view_clessecounts = Student::where('user_id', $user_id)->count();
        return view('dashboard.admin.viewsingleclassschool', compact('view_clesses1', 'view_clessecounts', 'view_clesses'));
    }

    public function viewyourteachersby($classname){
        $view_clesses1 = Classname::where('classname', $classname)->first();
        $view_myteachers = User::where('classname', $classname)->where('assign1', 'teacher')->get();
        return view('dashboard.teacher.viewyourteachersby', compact('view_clesses1', 'view_myteachers'));
    }
    
    

    public function printregclass($classname){
        $print_studentclasses = Classname::where('classname', $classname)->first();
        $print_studentclasses = user::where('classname', $classname)
        ->where('status', null)
        ->where('section', 'Primary')->get();

        return view('dashboard.admin.printregclass', compact('print_studentclasses'));
    }


    public function classes($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = user::where('classname', $classname)
        ->where('status', null)->get();
        return view('dashboard.classes', compact('view_classes'));
    }

    public function classpayments($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = Transaction::where('classname', $classname)->get();
        return view('dashboard.account.classpayments', compact('view_classes'));
    }
   

    

    public function classpaymentad($classname){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_classes = Transaction::where('classname', $classname)->get();
        return view('dashboard.admin.classpaymentad', compact('view_classes'));
    }

    public function addresultsad($classname){
        $view_addresults = Classname::where('classname', $classname)->first();
        $view_addresults = User::where('role', null)->where('classname', $classname)->latest()->get();
        return view('dashboard.admin.addresultsad', compact('view_addresults'));
    }

    public function viewclassresults($classname){
        $view_addresults = Classname::where('classname', $classname)->first();
        $view_addresults = Result::where('classname', $classname)->latest()->get();
        return view('dashboard.admin.viewclassresults', compact('view_addresults'));
    }
    
    public function viewyourstudentsinschhol($classname){
        $view_secondarystudents = Student::where('classname', $classname)
        ->where('user_id', auth::guard('web')->id())->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.viewyourstudentsinschhol', compact('lgas', 'view_sessions', 'view_classes', 'view_secondarystudents'));
    }
    public function firstermresults($classname){
        $view_myresults = Classname::where('classname', $classname)->first();
        $view_myresults = Result::where('classname', $classname)->where('user_id', auth::guard('web')->id())->get();
        $view_classes = Classname::orderBy('classname')->get();
        $view_terms = Term::all();
        $view_sessions = Academicsession::latest()->get();
        $view_schools = School::latest()->get();
        $view_lgas = Lga::orderBy('lga')->get();

        $view_student_abujas = Classname::where('classname', $classname)->first();
        $view_student_abujas = Result::where('classname', $classname)->where('user_id', auth::guard('web')->id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.firstermresults', compact('view_lgas', 'view_schools', 'view_sessions', 'view_terms', 'view_classes', 'view_student_abujas', 'view_myresults'));
    }


    public function viewyourstudentsprimary($classname){
        $view_primarypupils = Classname::where('classname', $classname)->first();
        $view_primarypupils = Student::where('classname', $classname)
        ->latest()->get();
        $view_classes = Classname::all();
        $view_alms = Alm::all();
        $view_sessions = Academicsession::latest()->get();
        return view('dashboard.teacher.viewyourstudentsprimary', compact('view_sessions', 'view_alms', 'view_classes', 'view_primarypupils'));
    }


    public function firstermresultsbyprinc ($classname){
        $view_myresults = Classname::where('classname', $classname)->first();
        $view_myresults = Result::where('classname', $classname)->where('status', null)
        ->where('school_id', auth::guard('web')->user()->school_id)
        ->latest()->get();
        $view_classes = Classname::all();
        
        $view_alms = Alm::all();
        $view_sessions = Academicsession::latest()->get();

        $view_student_abujas = Classname::where('classname', $classname)->first();
        $view_student_abujas = Result::where('classname', $classname)->where('user_id', auth::guard('web')->id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.teacher.firstermresultsbyprinc ', compact('view_alms', 'view_sessions', 'view_classes', 'view_student_abujas', 'view_myresults'));
    }


    public function firstermresultsbyprincapproved ($classname){
        $view_myresults = Classname::where('classname', $classname)->first();
        $view_myresults = Result::where('classname', $classname)->where('status', 'approved')
        ->latest()->get();
        $view_classes = Classname::all();
        $view_alms = Alm::all();
        $view_sessions = Academicsession::latest()->get();

        $view_student_abujas = Classname::where('classname', $classname)->first();
        $view_student_abujas = Result::where('classname', $classname)->where('user_id', auth::guard('web')->id())
        ->where('section', 'Secondary')->get();

        return view('dashboard.teacher.firstermresultsbyprincapproved ', compact('view_alms', 'view_sessions', 'view_classes', 'view_student_abujas', 'view_myresults'));
    }

    public function viewresultbygenadmin($classname, $slug){
        $view_classes = Classname::where('classname', $classname)->first();
        $schoolresults = Result::where('classname', $classname)->where('slug', $slug)->get();
        $students = Student::where('classname', $classname)->where('slug', $slug)->get();
        $view_academcsessions  = Academicsession::all();
        $view_byadminclasses = Classname::all();
        $view_alms = Alm::all();

        return view('dashboard.admin.viewresultbygenadmin', compact('view_alms', 'students', 'view_byadminclasses', 'view_academcsessions', 'view_classes', 'schoolresults'));
    }


    public function viewallstudentsadmin($classname, $slug){
        $view_classes = Classname::where('classname', $classname)->first();
        $viewstudents = Student::where('classname', $classname)->where('slug', $slug)->get();
        $view_academcsessions  = Academicsession::all();
        $view_byadminclasses = Classname::all();

        return view('dashboard.admin.viewallstudentsadmin', compact('view_byadminclasses', 'view_academcsessions', 'view_classes', 'viewstudents'));
    }
    

    public function schoolsresults($classname, $slug){
        $class = Classname::where('classname', $classname)
        // ->where('section', auth::guard('web')->user()->section)
        ->first();
        $view_myresults = Result::where('classname', $classname)->where('slug', $slug)->where('user_id', auth::guard('web')->user()->user_id)->latest()->get();
        $view_students = Student::where('classname', $classname)->where('slug', $slug)->where('user_id', auth::guard('web')->user()->user_id)->latest()->get();
        $view_alms = Alm::all();
        $view_sessions = Academicsession::latest()->get();
         $myclasses = Classname::where('classname', $classname)->get();
        return view('dashboard.schoolsresults', compact('myclasses', 'view_alms', 'view_sessions', 'view_students', 'class', 'view_myresults'));
    }


    public function schoolsstudents($classname, $slug){
        $view_classes = Classname::where('classname', $classname)->first();
        $view_sessions = Academicsession::latest()->get();
        $viewschool_students = Student::where('classname', $classname)->where('slug', $slug)->where('user_id', auth::guard('web')->user()->user_id)->latest()->get();
        return view('dashboard.schoolsstudents', compact('view_sessions', 'view_classes', 'viewschool_students'));
    }




    public function viewmallclassnames(){
        $view_classnames = Classname::orderBy('classname')->get();
        return new ClassnameCollection($view_classnames);
    }


    
    
} 

