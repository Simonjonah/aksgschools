<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Blog;
use App\Models\Schoolnew;
use App\Models\Assignsubject;
use App\Models\School;

use App\Models\User;
use App\Models\Classname;
use App\Models\Domain;
use App\Models\Notification;
use App\Models\Query;
use App\Models\Subject;
use App\Models\Teacherassign;
use App\Models\Result;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Lga;
use App\Models\Studentdomain;

use App\Models\Term;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;
use PDF;

class UserController extends Controller
{

    public function create(Request $request){
        //create method
        $request->validate([
            'agree' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => 'required|min:5|max:30|same:cpassword'
           
        ]);

        $registration = new User();
        // $registration->fname = $request->fname;
        // $registration->surname = $request->surname;
       $registration->role = 'admin';
        $registration->email = $request->email;
        $registration->password = \Hash::make($request->password);
        $registration->save();
 
        if ($registration) {
            return redirect()->route('admin.home')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    

    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:5']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('admin.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('admin.login')->with('error', 'Failed to login');
        }
    }


    public function add_childto_parents (Request $request){
       
        $request->validate([
            'schoolname' => ['nullable', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string'],
            'lga' => ['required', 'string'],
            'establishdate' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'logo' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'plans' => ['required', 'string'],
            'ref_no' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => 'required|min:5|max:30|same:cpassword',
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();

        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->guardian_id = $request->guardian_id;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;
        
       $add_adimission->preclassname = $request->preclassname;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        // $add_adimission->state = $request->state;
        // $add_adimission->term = $request->term;
        // $add_adimission->classname = $request->classname;
         $add_adimission->ref_no = $request->ref_no;
        
        // $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);

        $add_adimission->save();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }

    public function secondregistration($ref_no){
        $addsec_registration = User::where('ref_no', $ref_no)->first();
        return view('pages.secondregistration', compact('addsec_registration'));
    }
    public function thirdregistration($ref_no){
        $addthird_registration = User::where('ref_no', $ref_no)->first();
        return view('pages.thirdregistration', compact('addthird_registration'));
    }


  
    public function medicalreports($ref_no){
        $addthid_admission = User::where('ref_no', $ref_no)->first();
        return view('pages.medicalreports', compact('addthid_admission'));
    }
    
    public function updateadmission (Request $request, $ref_no1){

        $edit_students = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'middlename' => ['required', 'string'],
            'age' => ['required', 'string'],
            'bloodgroup' => ['required', 'string'],
            'genotype' => ['required', 'string'],
            'previouschoolname' => ['required', 'string'],
            'preclassname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'lastschooladdress' => ['required', 'string'],
            'disability' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'section' => ['required', 'string'],
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


        $edit_students['images'] = $path;
        $edit_students->surname = $request->surname;
        $edit_students->middlename = $request->middlename;
        $edit_students->previouschoolname = $request->previouschoolname;
        $edit_students->fname = $request->fname;
        $edit_students->age = $request->age;
        $edit_students->dob = $request->dob;
        $edit_students->gender = $request->gender;
        $edit_students->bloodgroup = $request->bloodgroup;
        $edit_students->genotype = $request->genotype;
        
       $edit_students->preclassname = $request->preclassname;
        $edit_students->classname = $request->classname;
        $edit_students->lastschooladdress = $request->lastschooladdress;
        $edit_students->disability = $request->disability;
        $edit_students->section = $request->section;
       
        $edit_students->update();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }



    public function printadmissionform($ref_no){
        $print_admissionform = User::where('ref_no', $ref_no)->first();
        return view('pages.printadmissionform', compact('print_admissionform'));
    }


   

    

   
    public function addingregno(Request $request, $id){
        $student_regno = User::where('id', $id)->first();
        $request->validate([
            //'regnumber' => ['required', 'string', 'max:255'],
            'regnumber' => ['required', 'string', 'max:255', 'unique:users'],

        ]);
       
        $student_regno->regnumber = $request->regnumber;
        $student_regno->update();
        if ($student_regno) {
            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
    
    public function schoolpdf($ref_no1){
        $print_students = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.schoolpdf', compact('print_students'));
    }

    public function medicalspdf($ref_no1){
        $printmedi_students = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.medicalspdf', compact('printmedi_students'));
    }
    public function allstudents(){
        $all_students = User::latest()->where('role', null)->get();
        return view('dashboard.admin.allstudents', compact('all_students'));
    }
    public function allstudentpdf(){
        $printall_students = User::latest()->get();
        return view('dashboard.admin.allstudentpdf', compact('printall_students'));
    }

    public function allcrechepdf(){
        $printallcreche_students = User::where('section', 'Creche')->latest()->get();
        return view('dashboard.admin.allcrechepdf', compact('printallcreche_students'));
    }

    public function allnurserypdf(){
        $printallnursery_students = User::where('section', 'Nursery')->latest()->get();
        return view('dashboard.admin.allnurserypdf', compact('printallnursery_students'));
    }
    public function allprimarypdf(){
        $printallPrimary_students = User::where('section', 'Primary')->latest()->get();
        return view('dashboard.admin.allprimarypdf', compact('printallPrimary_students'));
    }

    public function allhighschpdf(){
        $printallhigh_students = User::where('section', 'High School')->latest()->get();
        return view('dashboard.admin.allhighschpdf', compact('printallhigh_students'));
    }


 

    public function checkfirst (Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'string', 'min:5']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('web.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('login')->with('error', 'Failed to login');
        }

    }

    public function home(){
   

    //THE SUB-ADMIN FUNCTIONS
    $countyourresults = Result::where('schooltype', auth::guard('web')->user()->schooltype)->count();
        $countteachers = User::where('schooltype', auth::guard('web')->user()->schooltype)
        ->where('role', 'teacher')
        ->count();
        $countclasses = Classname::where('section', 'Primary')->count();
        $countmysubjects = Subject::where('section', 'Primary')->count();
        $countstudents = Student::where('schooltype', auth::guard('web')->user()->schooltype)
        ->count();
        $countpsyco = Domain::where('user_id', auth::guard('web')->id())->count();
        $countnews = Schoolnew::where('user_id', auth::guard('web')->id())->count();
        $view_notices = User::latest()->take(1)->get();
        //SUBADMIN ADMINS STOP HERE

        //GENERAL ADMIN START
        $countstudent = Student::count();
        $countsubjects = Subject::count();
        $countsubjecthigh = Subject::where('section', 'Secondary')->count();
        $countsubjectprim = Subject::where('section', 'Primary')->count();
        $countteacher = User::where('role', 'teacher')->count();
        $countsunapprveteacher = User::where('role', 'teacher')
       ->where('status', null)->count();

        $countschool = School::count();
        $countstudenttsuspend = Student::where('status', 'suspend')->count();
        $countstudentapprove = Student::where('status', 'suspend')->count();
        $countstudentreject = Student::where('status', 'reject')->count();
        $countschoolunpproved = School::where('status', null)->count();
        $countschoolapproved = School::where('status', 'approved')->count();
        $countschoolsuspend = School::where('status', 'suspend')->count();
        $countschoolrejected = School::where('status', 'reject')->count();
        $myschools = School::where('schooltype', auth()->user()->schooltype)->count();
        
      

        $countteacherunpproved = User::where('role', 'teacher')->where('status', null)->count();
        $countteacherapproved = User::where('role', 'teacher')->where('status', 'approved')->count();
        $countteachersuspend = User::where('role', 'teacher')->where('status', 'suspend')->count();
        $countteacherrejected = User::where('role', 'teacher')->where('status', 'reject')->count();
      
        $countsclasses = Classname::count();
        $countcount = Domain::count();
        $countprincipals = User::where('section', 'Secondary')->where('role', 'Principal')->count();
        $countheadmaster = User::where('section', 'Primary')->where('role', 'Principal')->count();
        // $countsnotification = Notification::count();
        
        $view_lecturers = User::orderby('created_at', 'DESC')->where('role', 'teacher')->take(4)->get();
        $view_students = Student::orderby('created_at', 'DESC')->take(5)->get();
        $view_schools = School::orderby('created_at', 'DESC')->take(5)->get();
        $view_blogs = Blog::orderby('created_at', 'DESC')->take(5)->get();
        // $view_payments = Transaction::orderby('created_at', 'DESC')->take(5)->get();
        $view_results = Result::orderBy('created_at', 'DESC')->take(5)->get();
        $count_results = Result::count();
        $countboards = User::where('role', 'subadmin')->count();
        
        
    //THE BEGINS OF PRINCIPAL AND TEACHER DASHBOARD VIEWS

    
        $resultscounts = Result::where('teacher_id', auth::guard('web')->id()
        )->count();

        $countcognitive = Studentdomain::where('section', auth::guard('web')->user()->section
        )->where('psycomoto', 'Cognitive Domain')->count();
        
        $countpsycomo = Studentdomain::where('section', auth::guard('web')->user()->section
        )->where('psycomoto', 'Psychomotor Domain')->count();
        $countsubject = Teacherassign::where('teacher_id', auth::guard('web')->id()
        )->count();
        $countprimarysubjects = Subject::where('section', 'Primary')->count();
        $countseconsubjects = Subject::where('section', 'Secondary')->count();
        $countteachers = User::where('school_id', auth::guard('web')->user()->school_id)
        ->where('role', 'teacher')
        ->count();
        $countclasses = Classname::where('section', 'Secondary')->count();

        $countapproveresult = Result::where('teacher_id', auth::guard('web')->id()
        )->where('status', 'approved')->count();
        
        $countunapproveresult = Result::where('teacher_id', auth::guard('web')->id()
        )->where('status', 'approved')->count();

        $countpsyco = Domain::where('psycomoto', 'Cognitive Domain')
        ->where('section', auth::guard('web')->user()->section)
        ->count();

        //principals/hm/hs section
        $countresults = Result::where('school_id', auth::guard('web')->user()->school_id)->count();
        $countunapprove = Result::where('school_id', auth::guard('web')->user()
        ->school_id)->where('status', null)->count();
        $countunapprove = Result::where('school_id', auth::guard('web')->user()
        ->school_id)->where('status', null)->count();

        $countapprove = Result::where('school_id', auth::guard('web')->user()
        ->school_id)->where('status', 'approved')->count();
        $countsprimarysubjects = Subject::where('section', 'Primary')->count();
        $countsecondarysubjects = Subject::where('subsection', 'Senior Secondary')->count();
        $countjuniorsubjects = Subject::where('subsection', 'Junior Secondary')->count();
        $countpsycomo1 = Domain::whereNot('section', 'Primary')->count();

        
        $countstudent = Student::where('school_id', auth::guard('web')->user()
        ->school_id)->count();

        $reinstate = Student::where('school_id', auth::guard('web')->user()
        ->school_id)->where('status', 'approved')->count();
        $suspendedstu = Student::where('school_id', auth::guard('web')->user()
        ->school_id)->where('status', 'suspend')->count();

        $viewschoolnews = Schoolnew::where('school_id', auth::guard('web')->user()
        ->school_id)->count();
         $my_subjects = Assignsubject::where('user_id', auth::guard('web')->id()
        )->latest()->get();

        return view('dashboard/home', compact('my_subjects', 'viewschoolnews', 'suspendedstu', 'reinstate', 'countstudent', 'countpsycomo1', 'countjuniorsubjects', 'countsecondarysubjects', 'countsprimarysubjects', 'countapprove', 'countunapprove', 'countresults', 'countpsyco', 'countclasses', 'countteachers', 'countseconsubjects', 'countprimarysubjects', 'countunapproveresult', 'countapproveresult', 'countsubject', 'countpsycomo', 'countcognitive', 'resultscounts', 'myschools', 'countnews', 'countboards', 'countheadmaster', 'countprincipals', 'view_blogs', 'view_schools', 'countcount', 'count_results', 'view_results',  'countteacherrejected', 'countteachersuspend', 'countteacherapproved', 'countteacherunpproved', 'countschoolunpproved', 'countschoolapproved', 'countschoolsuspend', 'countschoolrejected', 'countschool', 'countsunapprveteacher', 'countteacher', 'view_lecturers', 'countsclasses', 'view_students', 'countstudentreject', 'countstudentapprove', 'countstudenttsuspend', 'countsubjectprim', 'countsubjecthigh', 'countsubjects', 'countstudent', 'countpsyco', 'countstudents', 'countclasses','countteachers', 'countmysubjects', 'countyourresults'));
    }

    public function registerssebandsubeb(){

        return view('dashboard.admin.registerssebandsubeb');
        
    }
    public function profile($ref_no1){
        $view_profile = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.profile', compact('view_profile'));
    }

    public function admisionletter(){

        return view('dashboard.admisionletter');
    }

    public function registerteacher(){
       $dsplay_classes = Classname::all();
        return view('dashboard.registerteacher', compact('dsplay_classes'));
    }

    public function createschoolboard(Request $request, $ref_no1){
       $board = User::where('ref_no1', $ref_no1)->first();
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'schooltype' => ['required', 'string'],
          

        ]);

        $add_school = new User();
        $add_school->surname = $request->surname;
        $add_school->user_id = $board->id;
        $add_school->fname = $request->fname;
        $add_school->email = $request->email;
        $add_school->phone = $request->phone;
        $add_school->role = 'subadmin';
      
        $add_school->schooltype = $request->schooltype;
        $add_school->status = 'admitted';
        $add_school->password = \Hash::make($request->phone);
        $add_school->ref_no1 = substr(rand(0,time()),0, 9);
        $add_school->connect = substr(rand(0,time()),0, 9);
        $add_school->save();

      //  return redirect()->route('registerprincipal', ['ref_no1' =>$add_school->ref_no1]); 
    
        if ($add_school) {

            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }



    public function createboard(Request $request){
        $request->validate([
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'schooltype' => ['required', 'string'],
        ]);

        $add_board = new User();
        $add_board->email = $request->email;
        $add_board->phone = $request->phone;
      
        $add_board->schooltype = $request->schooltype;
        $add_board->status = 'admitted';
        $add_board->role = 'board';
        $add_board->password = \Hash::make($request->phone);
        $add_board->ref_no1 = substr(rand(0,time()),0, 9);
        $add_board->connect = substr(rand(0,time()),0, 9);
        $add_board->save();

      //  return redirect()->route('registerprincipal', ['ref_no1' =>$add_board->ref_no1]); 
    
        if ($add_board) {

            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
   
    public function printclasses(Request $request){
        $request->validate([
            'classname' => ['required', 'string'],
            'centername' => ['required', 'string'],
        ]);
        if($getyour_classes = user::where('classname', $request->classname)
        ->where('centername', $request->centername)
        ->exists()) {
            $getyour_classes = User::orderby('created_at', 'DESC')
            ->where('centername', $request->centername)
            ->where('classname', $request->classname)
       
            ->get(); 
            }else{
                return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.printregclass', compact('getyour_classes'));

        }


        public function firsterm(){
            $view_terms = User::all();
          
            return view('dashboard.firsterm', compact('view_terms'));
        }

        public function secondterm(){
            $view_terms = User::all();
            return view('dashboard.secondterm', compact('view_terms'));
        }

        public function assignedteacher($section){
            $assign_teachers = User::where('section', $section)->first();
            $view_teachers = User::where('section', $section)
            ->where('status', 'teacher')->get();

            $view_classes = Classname::all();

            return view('dashboard.admin.assignedteacher', compact('view_classes', 'view_teachers', 'assign_teachers'));
        }

        public function assignteachertoclass (Request $request, $ref_no1){
            $add_assignteacher = User::where('ref_no1', $ref_no1)->first();
            $request->validate([
               
                'classname' => ['required', 'string', 'max:255'],
                'term' => ['required', 'string', 'max:255'],
                'section' => ['required', 'string', 'max:255'],
                
            ]);
            $add_assignteacher->classname = $request->classname;
            $add_assignteacher->term = $request->term;
            $add_assignteacher->section = $request->section;
            $add_assignteacher->update();
    
            return redirect()->back()->with('success', 'you have added successfully');
    
        }
         
        public function assignedstudent($ref_no1){
            $assign_teachers = User::where('ref_no1', $ref_no1)->first();
            $view_classes = Classname::all();
            return view('dashboard.assignedstudent', compact('view_classes', 'assign_teachers'));
        }
        
        public function thirdterm(){
            $view_terms = User::all();
          
            return view('dashboard.thirdterm', compact('view_terms'));
        }

        public function assignstudentclass(Request $request, $ref_no){
        $add_assignstudents = User::where('ref_no', $ref_no)->first();
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'term' => ['required', 'string', 'max:255'],
        ]);
        
        $add_assignstudents->classname = $request->classname;
        $add_assignstudents->term = $request->term;
 
        $add_assignstudents->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    

    
    

    public function changeclasses ($ref_no){
        $assign_classestoTeacher = User::where('ref_no', $ref_no)->first();
        // $view_centernames = Studycenter::all();
        $classnames = Classname::all();
        return view('dashboard.admin.changeclasses', compact('classnames', 'assign_classestoTeacher'));
    }

    public function changgeteacherclass (Request $request, $id){
        $change_classestoTeacher = User::find($id);
        $request->validate([
            'classname' => ['required', 'string', 'max:255'],
            'centername' => ['required', 'string', 'max:255'],
            'term' => ['required', 'string'],
            'section' => ['required', 'string'],
        ]);
      
        $change_classestoTeacher->classname = $request->classname;
        $change_classestoTeacher->centername = $request->centername;
        $change_classestoTeacher->term = $request->term;
        $change_classestoTeacher->section = $request->section;
        $change_classestoTeacher->update();
        if ($change_classestoTeacher) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
   
    public function addrole($ref_no){
        $view_teachers = User::where('ref_no', $ref_no)->first();
        $view_classes = Classname::latest()->get();
        return view('dashboard.admin.addrole', compact('view_classes', 'view_teachers'));
    }

    public function viewroles(){
        $view_roles = User::where('role', 'teacher')->where('status', 'admitted')->get();
        return view('dashboard.admin.viewroles', compact('view_roles'));
    }


    public function viewboardmembers(){
        $view_boards = User::where('role', 'subadmin')
        ->get();
        return view('dashboard.admin.viewboardmembers', compact('view_boards'));
    }

    

    public function addboardmemebers($ref_no1){
        $board = User::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.addboardmemebers', compact('board'));
    }

    public function createrol (Request $request, $id){
        $add_roles = User::find($id);
        $request->validate([
            'role' => ['required', 'string', 'max:255'],
            'section' => ['required', 'string', 'max:255'],
            // 'classname' => ['required', 'string', 'max:255'],
        ]);
      
        $add_roles->role = $request->role;
        $add_roles->assign1 = $request->role;
        $add_roles->update();
       
 
        if ($add_roles) {
            return redirect()->back()->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function promotions(){
        $view_classess = Classname::all();
        $view_classstudents = User::all();
        return view('dashboard.promotions', compact('view_classess', 'view_classstudents'));
    }



    
        public function updatetransfer(Request $request, $ref_no){
            $transfer = User::where('ref_no', $ref_no)->first();
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

    public function lecturersprint($ref_no){
        $print_students = User::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.lecturersprint', compact('print_students'));
    }



    public function teacherapprove($ref_no){
        $approved_teacher = User::where('ref_no', $ref_no)->first();
        $approved_teacher->status = 'admitted';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function teachersuspend($ref_no){
        $approved_teacher = User::where('ref_no', $ref_no)->first();
        $approved_teacher->status = 'suspend';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function teachersacked($ref_no){
        $approved_teacher = User::where('ref_no', $ref_no)->first();
        $approved_teacher->status = 'sacked';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have sacked successfully');
    }
    
    public function teacherquery($ref_no){
        $query_singteachers = User::where('ref_no', $ref_no)->first();

        return view('dashboard.admin.teacherquery', compact('query_singteachers'));
    }

    public function teachersprint(){
        $print_teachers = User::latest()->get();

        return view('dashboard.admin.teachersprint', compact('print_teachers'));
    }

    public function approveteachers(){
        $approves_teachers = User::where('status', 'admitted')
        ->where('assign1', 'teacher')
        ->get();
        return view('dashboard.admin.approveteachers', compact('approves_teachers'));
    }
    public function suspendedteachers(){
        $suspend_teachers = User::where('status', 'suspend')->get();
        return view('dashboard.admin.suspendedteachers', compact('suspend_teachers'));
    }
    public function sackedteachers(){
        $sacked_teachers = User::where('status', 'sacked')->get();
        return view('dashboard.admin.sackedteachers', compact('sacked_teachers'));
    }

  

    public function crecheheads(){
        $view_classess = Classname::all();
        $view_crecheclassstudents = User::where('section', 'Creche')->get();
        return view('dashboard.crecheheads', compact('view_classess', 'view_crecheclassstudents'));
    }

    public function nurseryschoolheads(){
        $view_classess = Classname::all();
        $view_nurseryclassstudents = User::where('section', 'Nursery')->get();
        return view('dashboard.nurseryschoolheads', compact('view_classess', 'view_nurseryclassstudents'));
    }
    
    public function printstudents ($ref_no1){
        $printyouchild = User::where('ref_no1', $ref_no1)->first();

        return view('dashboard.guardian.printstudents', compact('printyouchild'));
    }

    public function preschoolheads(){
        $view_classess = Classname::all();
        $view_preschoolstudents = User::where('section', 'Pre-School')->get();
        return view('dashboard.preschoolheads', compact('view_classess', 'view_preschoolstudents'));
    }
    public function primaryheads(){
        $view_classess = Classname::where('section', 'Primary')->get();
        $view_primarystudents = User::where('section', 'Primary')->get();
        return view('dashboard.primaryheads', compact('view_classess', 'view_primarystudents'));
    }

    public function highschools(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.highschools', compact('view_classess', 'view_highstudents'));
    }
    public function viewaddresults(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.viewaddresults', compact('view_classess', 'view_highstudents'));
    }
    
    public function createsection(){
        $view_classess = Classname::all();
        $view_crechsectionstudents = User::where('section', 'Creche')->get();
        return view('dashboard.createsection', compact('view_classess', 'view_crechsectionstudents'));
    }
    public function preschoolsection(){
        $view_classess = Classname::all();
        $view_preschstudents = User::where('section', 'Pre-School')->get();
        return view('dashboard.preschoolsection', compact('view_classess', 'view_preschstudents'));
    }
    public function primarysection(){
        $view_classess = Classname::where('section', 'Primary')->get();
        $view_primarystudents = User::where('section', 'Primary')->get();
        return view('dashboard.primarysection', compact('view_classess', 'view_primarystudents'));
    }

    public function nurserysection(){
        $view_classess = Classname::all();
        $view_nuserystudents = User::where('section', 'Nursery')->get();
        return view('dashboard.nurserysection', compact('view_classess', 'view_nuserystudents'));
    }
    public function highschoolsection(){
        $view_classess = Classname::where('section', 'Secondary')->get();
        $view_highstudents = User::where('section', 'Secondary')->get();
        return view('dashboard.highschoolsection', compact('view_classess', 'view_highstudents'));
    }


    

    
    public function addparent(){
        $display_acasessions = Academicsession::all();
        $view_sections = Section::where('user_id', auth::guard('web')->id()
        )->get();
        return view('dashboard.admin.addparent', compact('view_sections', 'display_acasessions'));
    }
    
    
    public function parentviewstudent($ref_no1){
        $viewyour_child = User::where('ref_no1', $ref_no1)->first();
        $view_classes = Classname::all();
        return view('dashboard.guardian.parentviewstudent', compact('view_classes', 'viewyour_child'));
    }

    

    public function parenteditstudent ($ref_no1){
        $editby_parent = User::where('ref_no1', $ref_no1)->first();
        $view_classes = Classname::all();
        return view('dashboard.guardian.parenteditstudent', compact('view_classes', 'editby_parent'));
    }
    public function updatebyparent(Request $request, $ref_no1){

        $editby_parent = User::where('ref_no1', $ref_no1)->first();
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'middlename' => ['required', 'string'],
            'age' => ['required', 'string'],
            'bloodgroup' => ['required', 'string'],
            'genotype' => ['required', 'string'],
            'previouschoolname' => ['required', 'string'],
            'preclassname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'lastschooladdress' => ['required', 'string'],
            'disability' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'section' => ['required', 'string'],
            'term' => ['required', 'string'],
            'gender' => ['required', 'string'],
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


        $editby_parent['images'] = $path;
        $editby_parent->surname = $request->surname;
        $editby_parent->term = $request->term;
        $editby_parent->middlename = $request->middlename;
        $editby_parent->previouschoolname = $request->previouschoolname;
        $editby_parent->fname = $request->fname;
        $editby_parent->age = $request->age;
        $editby_parent->dob = $request->dob;
        $editby_parent->gender = $request->gender;
        $editby_parent->bloodgroup = $request->bloodgroup;
        $editby_parent->genotype = $request->genotype;
        
       $editby_parent->preclassname = $request->preclassname;
        $editby_parent->classname = $request->classname;
        $editby_parent->lastschooladdress = $request->lastschooladdress;
        $editby_parent->disability = $request->disability;
        $editby_parent->section = $request->section;
       
        $editby_parent->update();
        return redirect()->back()->with('success', 'You have successfully edited your child ');

    }

     public function princidelete($ref_no){
        $reject_student = User::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

// bridbotb_arise  Ur7BO{dJcLS0

    public function addyourchild(){
       $view_classes = Classname::all();
       $acas = Academicsession::all();
        return view('dashboard.guardian.addyourchild', compact('acas', 'view_classes'));
    }

    
    public function yourchildren(){
        $viewyour_childrens = User::where('guardian_id', auth::guard('guardian')->id()
        )->get();
        return view('dashboard.guardian.yourchildren', compact('viewyour_childrens'));
    }
    public function payment(){
        $viewyour_childrens = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.payment', compact('viewyour_childrens'));
    }

    public function buspayment(){
        $bus_payments = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.buspayment', compact('bus_payments'));
    }
    public function feedingpaypayment(){
        $bus_payments = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.feedingpaypayment', compact('bus_payments'));
    }
    public function partypayment(){
        $bus_payments = User::where('guardian_id', auth::guard('guardian')->id()
        )->where('term', 'First Term')->get();
        return view('dashboard.guardian.partypayment', compact('bus_payments'));
    }
    

    // public function payschoolfees($classname){
    //     $pay_fees = User::where('classname', $classname)->first();
    //     $view_classpayments = Payment::where('classname', $classname)->where('feeding', 'school')
    //     ->get();
    //     return view('dashboard.guardian.payschoolfees', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    // }
    // public function payfeeding($classname){
    //     $pay_fees = User::where('classname', $classname)->first();
    //     $view_classpayments = Payment::where('classname', $classname)
    //     ->where('feeding', 'feeding')->get();
    //     return view('dashboard.guardian.payfeeding', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    // }

    // public function paybuservicefee($classname){
    //     $pay_fees = User::where('classname', $classname)->first();
    //     $view_classpayments = Payment::where('classname', $classname)
    //     ->where('feeding', 'trans')->get();
    //     return view('dashboard.guardian.paybuservicefee', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    // }

    // public function paypartfee($classname){
    //     $pay_fees = User::where('classname', $classname)->first();
    //     $view_classpayments = Payment::where('classname', $classname)
    //     ->where('feeding', 'party')->get();
    //     return view('dashboard.guardian.paypartfee', ['pay_fees' => $pay_fees, 'view_classpayments' => $view_classpayments]);
    // }
    
    
    
    public function addchildbyparent (Request $request){
       
        $request->validate([
            'guardian_id' => ['nullable', 'string'],
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'middlename' => ['required', 'string'],
            'age' => ['required', 'string'],
            'bloodgroup' => ['required', 'string'],
            'genotype' => ['required', 'string'],
            'previouschoolname' => ['required', 'string'],
            'preclassname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'lastschooladdress' => ['required', 'string'],
            'disability' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'ref_no' => ['required', 'string'],
            'section' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'term' => ['required', 'string'],
            // 'password' => ['required', 'string'],
            
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }else{

            $path = 'noimage.jpg';
        }

        $add_adimission = new User();

        $add_adimission['images'] = $path;
        $add_adimission->surname = $request->surname;
        $add_adimission->middlename = $request->middlename;
        $add_adimission->previouschoolname = $request->previouschoolname;
        $add_adimission->guardian_id = $request->guardian_id;
        $add_adimission->fname = $request->fname;
        $add_adimission->age = $request->age;
        $add_adimission->dob = $request->dob;
        $add_adimission->gender = $request->gender;
        $add_adimission->bloodgroup = $request->bloodgroup;
        $add_adimission->genotype = $request->genotype;
        
       $add_adimission->preclassname = $request->preclassname;
        $add_adimission->classname = $request->classname;
        $add_adimission->lastschooladdress = $request->lastschooladdress;
        $add_adimission->disability = $request->disability;
        $add_adimission->section = $request->section;
        $add_adimission->academic_session = $request->academic_session;
        $add_adimission->term = $request->term;
        // $add_adimission->state = $request->state;
        // $add_adimission->term = $request->term;
        // $add_adimission->classname = $request->classname;
         $add_adimission->ref_no = $request->ref_no;
        
        // $add_adimission->password = \Hash::make($request->password);
        $add_adimission->ref_no1 = substr(rand(0,time()),0, 9);

        $add_adimission->save();
        return redirect()->back()->with('success', 'You have successfully add child to parent');

    }


    public function teacherform(){
            $view_classes = Classname::all();
        return view('dashboard.teacherform', compact('view_classes'));
    }


    
    public function sendspec ($id){
        $viewparent_sendpecti = User::find($id);
        return view('dashboard.sendspec', compact('viewparent_sendpecti'));
    }
    

    

// public function viewprinci(){
//     $view_principals = User::where('assign1', 'Principal')->where('schooltype', 'Principal')->get();
//     return view('dashboard.admin.viewprinci', compact('view_principals'));
// }


    public function currentresult(){
        $view_yourresults = User::where('guardian_id', auth::guard('guardian')->id()
        )->get();
        return view('dashboard.guardian.currentresult', compact('view_yourresults'));
    }
    

    


    public function createprincipals2(Request $request){
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'schoolname' => ['required', 'string'],
            'ref_no1' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'schooltype' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'schooltype' => ['required', 'string'],
            'lga' => ['required', 'string'],
            'connect' => ['required', 'string'],
            // 'centernumber' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'section' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'password' => ['required', 'string', 'min:5'],
        ]);
        // dd($request->all());
        $add_teacher = new User();
        $add_teacher->surname = $request->surname;
        $add_teacher->fname = $request->fname;
        $add_teacher->email = $request->email;
        $add_teacher->phone = $request->phone;
        $add_teacher->connect = $request->connect;
        $add_teacher->schooltype = $request->schooltype;
        $add_teacher->lga = $request->lga;
        $add_teacher->schoolname = $request->schoolname;
        $add_teacher->alms = $request->alms;
        $add_teacher->ref_no1 = $request->ref_no1;
        $add_teacher->slug = $request->slug;
        $add_teacher->academic_session = $request->academic_session;
        $add_teacher->school_id = $request->school_id;
        $add_teacher->user_id = $request->user_id;
        $add_teacher->motor = $request->motor;
        $add_teacher->section = $request->section;
        $add_teacher->logo = $request->logo;
        $add_teacher->address = $request->address;
        $add_teacher->term = $request->term;
        $add_teacher->role = 'Principal';
        $add_teacher->assign1 = 'Principal';
        $add_teacher->ref_no = substr(rand(0,time()),0, 9);
        $add_teacher->classname = $request->classname;
        $add_teacher->password = \Hash::make($request->password);
       
        $add_teacher->save();
        if ($add_teacher) {
            return redirect()->route('login')->with('success', 'you have successfully registered');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function viewprincipals(){
    $view_principals = User::where('assign1', 'Principal')
    ->where('section', 'Secondary')->latest()->get();
   
    return view('dashboard.admin.viewprincipals', compact('view_principals'));
}







   

    public function schoolsprincipals ($ref_no1){
        $getyours = User::where('ref_no1', $ref_no1)->first();
        $getclasses = Classname::where('ref_no1', $ref_no1)->get();
        $lgas = Lga::orderBy('lga')->get();
        $addacademics = Academicsession::latest()->get();
        
        return view('auth.schoolsprincipals', compact('lgas', 'getclasses', 'getyours', 'addacademics'));
    }



    public function profile1() {
        $countresults = Result::where('teacher_id', auth::id()
        )->count();
        return view('dashboard.teacher.profile1', compact('countresults'));
    }


    public function updatephoto(Request $request, $ref_no){
        $edit_singteachers = User::where('ref_no', $ref_no)->first();
        $request->validate([
            'images' => 'required|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $edit_singteachers['images'] = $path;

        }
        $edit_singteachers->term = $request->term;
        $edit_singteachers->update();
        if ($edit_singteachers) {
            return redirect()->back()->with('success', 'you have successfully updated');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }


    public function addsignature($ref_no){
    $add_signature = User::where('ref_no', $ref_no)->first();

    return view('dashboard.teacher.addsignature', compact('add_signature'));
}


public function updatesignature(Request $request, $ref_no){
    $add_signature = User::where('ref_no', $ref_no)->first();
    $request->validate([
        'signature' => 'required|mimes:jpg,png,jpeg'
    ]);
    if ($request->hasFile('signature')){

        $file = $request['signature'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('signature')->storeAs('resourcesignature', $filename);
         $add_signature['signature'] = $path;

    }

    $add_signature->update();
    return redirect()->back()->with('success', 'you have successfully updated');

}


    public function settingsupdate(Request $request, $id){
        $edit_profiles = teacher::find($id);
        $edit_profiles = teacher::where('id', $id)->first();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone' => ['required', 'string'],
            'motor' => ['required', 'string'],
            'address' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
       // dd($request->all());
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_profiles['images'] = $path;
        $edit_profiles->name = $request->name;
        $edit_profiles->email = $request->email;
        $edit_profiles->address = $request->address;
        $edit_profiles->phone = $request->phone;
        $edit_profiles->motor = $request->motor;
        $edit_profiles->designation = $request->designation;


        $edit_profiles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }

    
    
    public function sectionboard(){
        $view_boards = User::where('role', 'board')->get();
       
        return view('dashboard.admin.sectionboard', compact('view_boards'));
    }

    public function schoolsheads($ref_no1){
        $getyours = User::where('ref_no1', $ref_no1)->first();
        $getclasses = Classname::all();
        $lgas = Lga::orderBy('lga')->get();
        $addacademics = Academicsession::latest()->get();
        
        return view('auth.schoolsheads', compact('lgas', 'getclasses', 'getyours', 'addacademics'));
    }


    
    
public function viewschoolsteacheradlgas($slug){
    $view_principals = User::where('assign1', 'teacher')
    ->where('slug', $slug)
    ->latest()->get();
    return view('dashboard.admin.viewschoolsteacheradlgas', compact('view_principals'));
}


public function viewprinci($ref_no){
    $view_principals = User::where('ref_no', $ref_no)->first();
    return view('dashboard.admin.viewprinci', compact('view_principals'));
}

    public function editteacher($ref_no){
        $edit_singteachers = User::where('ref_no', $ref_no)->first();
        $view_classnames = Classname::all();
        $view_lgas = Lga::all();
        
        return view('dashboard.admin.editteacher', compact('view_lgas', 'view_classnames', 'edit_singteachers'));
    }
    

    public function princisaddmit ($ref_no){
    $reject_principal = User::where('ref_no', $ref_no)->first();
    $reject_principal->status = 'admitted';
    $reject_principal->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function primsaddmit($ref_no){
    $reject_principal = User::where('ref_no', $ref_no)->first();
    $reject_principal->status = 'admitted';
    $reject_principal->save();
    return redirect()->back()->with('success', 'you have approved successfully');
}

public function rejectprinci($ref_no){
    $reject_student = User::where('ref_no', $ref_no)->first();
    $reject_student->status = 'reject';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}

public function rejectprim($ref_no){
    $reject_student = User::where('ref_no', $ref_no)->first();
    $reject_student->status = 'reject';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}

public function suspendprim($ref_no){
    $reject_student = User::where('ref_no', $ref_no)->first();
    $reject_student->status = 'suspend';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}




public function suspendprinci($ref_no){
    $reject_student = User::where('ref_no', $ref_no)->first();
    $reject_student->status = 'suspend';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have suspended successfully');
}

public function retiredprim($ref_no){
    $reject_student = User::where('ref_no', $ref_no)->first();
    $reject_student->status = 'retired';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have retired successfully');
}




public function updatehm(Request $request, $ref_no){
    $edit_principal = User::where('ref_no', $ref_no)->first();
       
    $request->validate([
        'fname' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
        'motor' => ['nullable', 'string'],
        'address' => ['nullable', 'string'],
        'schooltype' => ['required', 'string'],
        'lga' => ['required', 'string'],
        'section' => ['required', 'string'],
        // 'images' => 'nullable|mimes:jpg,png,jpeg'
    ]);
    // dd($request->all());
    if ($request->hasFile('images')){

        $file = $request['images'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('images')->storeAs('resourceimages', $filename);
        $edit_principal['images'] = $path;

    }else{

        $path = 'noimage.jpg';
    }


    $edit_principal->surname = $request->surname;
    $edit_principal->fname = $request->fname;
    $edit_principal->phone = $request->phone;
    $edit_principal->schooltype = $request->schooltype;
    $edit_principal->schoolname = $request->schoolname;
    $edit_principal->motor = $request->motor;
    $edit_principal->address = $request->address;
    $edit_principal->section = $request->section;
    $edit_principal->update();
    if ($edit_principal) {
        return redirect()->back()->with('success', 'you have successfully updated');
            
        }else{
            return redirect()->back()->with('fail', 'you have fail to registered');
    }
}



public function teacheretired($ref_no){
    $reject_student = User::where('ref_no', $ref_no)->first();
    $reject_student->status = 'retired';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have retired successfully');
}


 
public function tranfer($ref_no){
    $transfer_principal = User::where('ref_no', $ref_no)->first();
    $all_schools = School::all();
    $all_lgas = Lga::all();
    return view('dashboard.admin.tranfer', compact('all_lgas', 'all_schools', 'transfer_principal'));
}

public function teachertransfer($ref_no){
    $transfer_principal = User::where('ref_no', $ref_no)->first();
    $all_schools = School::all();
    $all_lgas = Lga::all();
    return view('dashboard.admin.teachertransfer', compact('all_lgas', 'all_schools', 'transfer_principal'));
}


public function tranferprim($ref_no){
    $transfer_principal = User::where('ref_no', $ref_no)->first();
    $all_schools = School::all();
    $all_lgas = Lga::all();
    return view('dashboard.tranferprim', compact('all_lgas', 'all_schools', 'transfer_principal'));
}

public function viewprim($ref_no){
    $view_principal = User::where('ref_no', $ref_no)->first();
    $view_classes = Classname::all();
    if(auth()->user()->role == 'admin'){
    return view('dashboard.viewprim', compact('view_classes', 'view_principal'));
    }else{
        return view('dashboard.viewprim', compact('view_classes', 'view_principal'));
    }
}

public function editprim($ref_no){
    $edit_principal = User::where('ref_no', $ref_no)->first();
    $view_lgas = Lga::orderBy('lga')->get();
    return view('dashboard.editprim', compact('edit_principal', 'view_lgas'));
}

public function retired($ref_no){
    $reject_student = User::where('ref_no', $ref_no)->first();
    $reject_student->status = 'retired';
    $reject_student->save();
    return redirect()->back()->with('success', 'you have retired successfully');
}

    public function teacherupdated(Request $request, $ref_no){
        $edit_singteachers = User::where('ref_no', $ref_no)->first();
       
        $request->validate([
            'fname' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'middlename' => ['nullable', 'string'],
            'classname' => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'section' => ['nullable', 'string'],
            'term' => ['nullable', 'string'],
            'lga' => ['nullable', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $edit_singteachers['images'] = $path;
        }

        $edit_singteachers->surname = $request->surname;
        $edit_singteachers->fname = $request->fname;
        $edit_singteachers->middlename = $request->middlename;
        $edit_singteachers->phone = $request->phone;
        $edit_singteachers->section = $request->section;
        $edit_singteachers->gender = $request->gender;
       
        $edit_singteachers->term = $request->term;
        $edit_singteachers->lga = $request->lga;
        $edit_singteachers->classname = $request->classname;
       
        $edit_singteachers->update();
        if ($edit_singteachers) {
            return redirect()->back()->with('success', 'you have successfully updated');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }



public function viewheadmaster(){
    $view_principals = User::where('assign1', 'Principal')
    ->where('schooltype', 'SUBEB')
    ->latest()->get();
    //->where('section', 'Primary')->
    return view('dashboard.admin.viewheadmaster', compact('view_principals'));
}

    

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }



        public function createteacher(Request $request){
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'schoolname' => ['required', 'string'],
            'ref_no1' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'schooltype' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'schooltype' => ['required', 'string'],
            'lga' => ['required', 'string'],
            'connect' => ['required', 'string'],
            // 'centernumber' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'section' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            //'password' => ['required', 'string', 'min:5'],
        ]);
        // dd($request->all());
        $signature = User::where('id', auth::id())->first();
        if($signature->signature === null){
            return redirect()->back()->with('fail', 'You have add your Signature, Please add it before your can register Teachers thanks');
        }
        
        $add_teacher = new User();
        $add_teacher->surname = $request->surname;
        $add_teacher->fname = $request->fname;
        $add_teacher->email = $request->email;
        $add_teacher->signature = $request->signature;
        $add_teacher->phone = $request->phone;
        $add_teacher->connect = $request->connect;
        $add_teacher->schooltype = $request->schooltype;
        $add_teacher->lga = $request->lga;
        $add_teacher->schoolname = $request->schoolname;
        $add_teacher->alms = $request->alms;
        $add_teacher->ref_no1 = $request->ref_no1;
        $add_teacher->slug = $request->slug;
        $add_teacher->academic_session = $request->academic_session;
        $add_teacher->school_id = $request->school_id;
        $add_teacher->user_id = $request->user_id;
        $add_teacher->motor = $request->motor;
        $add_teacher->section = $request->section;
        $add_teacher->logo = $request->logo;
        $add_teacher->address = $request->address;
        $add_teacher->term = $request->term;
        $add_teacher->assign1 = 'teacher';
        $add_teacher->role = 'teacher';
        $add_teacher->ref_no = substr(rand(0,time()),0, 9);
        $add_teacher->classname = $request->classname;
        $add_teacher->password = \Hash::make($request->phone);
       
        $add_teacher->save();
        if ($add_teacher) {
            return redirect()->back()->with('success', 'you have successfully registered the teacher');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }

    

    public function addteacher(){
        $lgas = Lga::orderBy('lga')->get();
        $addacademics = Academicsession::latest()->get();
        $alms = Alm::latest()->get();
        $view_classnames = Classname::where('section', auth()->user()->section)->latest()->get();
        return view('dashboard.teacher.addteacher', compact('view_classnames', 'alms', 'lgas', 'addacademics'));
    }


     public function myteachers(){
        $mmy_teachers = User::where('school_id', auth::user()->school_id)
        ->where('assign1', 'teacher')
        ->latest()->get();
        return view('dashboard.teacher.myteachers', compact('mmy_teachers'));
    }


    public function approveteacherbytr ($ref_no){
        $reject_student = User::where('ref_no', $ref_no)->first();
        $reject_student->status = 'admitted';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function viewtteachertr($ref_no){
        $edit_teacher = User::where('ref_no', $ref_no)->first();
        $view_alms = Alm::all();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.teacher.viewtteachertr', compact('view_sessions', 'view_classes', 'view_sessions', 'view_alms', 'edit_teacher'));
    }

    
    public function suspendteacherbysc ($ref_no){
        $reject_student = User::where('ref_no', $ref_no)->first();
        $reject_student->status = 'suspend';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }

    public function tecacherdomainadd($ref_no){
        $view_yourtudents = User::where('ref_no', $ref_no)->first();
        $view_yourdomains = Domain::where('section', auth()->user()->section)->get();
        return view('dashboard.teacher.tecacherdomainadd', compact('view_yourdomains','view_yourtudents'));
    }


    public function teachertrash(){
        $view_teachertrashs = User::onlyTrashed()->where('schooltype', auth()->user()->schooltype)
        ->where('role', 'teacher')
        ->latest()->get();
        return view('dashboard.teachertrash', compact('view_teachertrashs'));
    }

    public function boardmembertrash(){
        $view_boardmembertrashs = User::onlyTrashed()->where('schooltype', auth()->user()->schooltype)
        ->where('role', 'subadmin')
        ->latest()->get();
        return view('dashboard.boardmembertrash', compact('view_boardmembertrashs'));
    }

    
     public function restoreteacher($id){
        $restore_student = User::withTrashed()->find($id);
        $restore_student->restore();
        return redirect()->back()->with('success', 'you have restored successfully');
    }

    public function deleteteacherfully($ref_no){
        $force_delete_student = User::withTrashed()->where('ref_no', $ref_no);
        $force_delete_student->forceDelete();
        return redirect()->back()->with('success', 'you have permanently deleted successfully');
    }


    public function yourclassbyteacher($classname){
        $view_yourtudents = User::where('classname', $classname)->first();
        $view_yourstudents = Student::where('classname', $classname)
        ->where('school_id', auth()->user()->school_id)
        ->where('term', auth()->user()->term)
        ->where('alms', auth()->user()->alms)
        ->where('academic_session', auth()->user()->academic_session)
        ->get();
        return view('dashboard.teacher.yourclassbyteacher', compact('view_yourstudents','view_yourtudents'));
    }

    public function updateprofileboard(Request $request, $ref_no1){
        $user = User::where('ref_no1', $ref_no1)->first();
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'address' => ['nullable', 'string'],
            'middlename' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $user['images'] = $path;
        }

        $user->surname = $request->surname;
        $user->fname = $request->fname;
        $user->middlename = $request->middlename;
        $user->address = $request->address;
        $user->update();
        return redirect()->back()->with('success', 'you have Updated successfully');

    }

    

    public function reachresultbyteacherschead(Request $request){
        // dd($request->all());
        $request->validate([
            // 'classname' => ['nullable', 'string'],
            'school_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
        ]);
        // dd($request);
        if($view_headmasters = User::where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->exists()) {
            $view_headmasters = User::orderby('created_at', 'DESC')
            ->where('school_id', $request->school_id)
                ->where('academic_session', $request->academic_session)
                ->where('section', $request->section)
            ->get(); 
            }else{
                return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.yourclassteacher', compact('view_headmasters'));
    
    }


    public function viewsubjectsassignteachers($ref_no){
        $view_subjectsassignteachers = User::where('ref_no', $ref_no)->first();
        $view_subjectsteachers = Assignsubject::where('ref_no', $ref_no)
        ->where('school_id', auth()->user()->school_id)
        ->get();
        return view('dashboard.teacher.viewsubjectsassignteachers', compact('view_subjectsassignteachers', 'view_subjectsteachers'));
    }

    public function primdelete($ref_no){
        $edit_schools = User::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'you have deleted successfully');
    }


    public function viewteachers(){
        $view_teachers = User::where('assign1', 'teacher')
        ->latest()->orderBy('schoolname')->get();
        return view('dashboard.admin.viewteachers', compact('view_teachers'));
    }

    public function allteachers(){
        $all_teachers = User::where('role', 'teacher')->latest()->get();
        return view('dashboard.admin.allteachers', compact('all_teachers'));
    }

     public function viewsingleteacher($ref_no){
        $view_singteachers = User::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.viewsingleteacher', compact('view_singteachers'));
    }
    

    public function updatesteacher(Request $request, $ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            'classname' => ['required', 'string'],
          
            'user_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],

            
        ]);
// dd($request->all());
        $edit_teacher->surname = $request->surname;
        // $edit_teacher->email = $request->email;
        $edit_teacher->phone = $request->phone;
        $edit_teacher->section = $request->section;
        // $edit_teacher->schoolname = $request->schoolname;
        $edit_teacher->alms = $request->alms;
        // $edit_teacher->ref_no = $request->ref_no;
        $edit_teacher->academic_session = $request->academic_session;
        $edit_teacher->user_id = $request->user_id;
        $edit_teacher->motor = $request->motor;
       
        $edit_teacher->term = $request->term;
        $edit_teacher->classname = $request->classname;
       
        $edit_teacher->update();

        return redirect()->back()->with('success', 'you have successfully registered');

    }
    

    public function registerteachers($ref_no){
        $principal = User::where('ref_no', $ref_no)->first();
        if (!$principal) {
            return redirect()->back()->with('fail', 'Principal not found');
        }
        $addacademics = Academicsession::latest()->get();
        $view_lgas = Lga::orderby('lga')->get();
        $view_classnames = Classname::where('section', $principal->section)->get();
        $view_alms = Alm::orderby('alms')->get();

        return view('auth.registerteachers', compact('view_alms', 'view_classnames', 'addacademics', 'view_lgas', 'principal'));

    }



    public function createteacherpersonal(Request $request, $ref_no){
        $principal = User::where('ref_no', $ref_no)->first();
        if (!$principal) {
            return redirect()->back()->with('fail', 'Principal not found');
        }
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'schoolname' => ['required', 'string'],
            'ref_no1' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'schooltype' => ['required', 'string'],
            'term' => ['required', 'string'],
            'motor' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'schooltype' => ['required', 'string'],
            'lga' => ['required', 'string'],
            'connect' => ['required', 'string'],
            // 'centernumber' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'section' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            //'password' => ['required', 'string', 'min:5'],
        ]);
        // dd($request->all());
        $signature = User::where('ref_no', $ref_no)->first();
        if($signature->signature === null){
            return redirect()->back()->with('fail', 'You have add your Signature, Please add it before your can register Teachers thanks');
        }
        
        $add_teacher = new User();
        $add_teacher->surname = $request->surname;
        $add_teacher->fname = $request->fname;
        $add_teacher->email = $request->email;
        $add_teacher->signature = $request->signature;
        $add_teacher->phone = $request->phone;
        $add_teacher->connect = $request->connect;
        $add_teacher->schooltype = $request->schooltype;
        $add_teacher->lga = $request->lga;
        $add_teacher->schoolname = $request->schoolname;
        $add_teacher->alms = $request->alms;
        $add_teacher->ref_no1 = $request->ref_no1;
        $add_teacher->slug = $request->slug;
        $add_teacher->academic_session = $request->academic_session;
        $add_teacher->school_id = $request->school_id;
        $add_teacher->user_id = $request->user_id;
        $add_teacher->motor = $request->motor;
        $add_teacher->section = $request->section;
        $add_teacher->logo = $request->logo;
        $add_teacher->address = $request->address;
        $add_teacher->term = $request->term;
        $add_teacher->assign1 = 'teacher';
        $add_teacher->role = 'teacher';
        $add_teacher->ref_no = substr(rand(0,time()),0, 9);
        $add_teacher->classname = $request->classname;
        $add_teacher->password = \Hash::make($request->password);
       
        $add_teacher->save();
        if ($add_teacher) {
            return redirect()->back()->with('success', 'you have successfully registered the teacher');
                
            }else{
                return redirect()->back()->with('error', 'you have fail to registered');
        }
    }
}
