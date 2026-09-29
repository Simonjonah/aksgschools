<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Alm;
use App\Models\Classname;
use App\Models\Subject;
use App\Models\Domain;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Teacherassign;
use App\Models\Teacherdomain;
use App\Models\Term;
use App\Models\School;
use App\Models\User;
use App\Models\Schoolnew;

use App\Models\Lga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //

    
    


    public function teachercheck(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:teachers'],
            'password' => ['required', 'string', 'min:5']
        ], [
            'email.exist'=>'This email does not exist in the teachers table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('teacher')->attempt($creds)) {
            return redirect()->route('teacher.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('teacher.login')->with('error', 'Failed to login');
        }
    }

    public function home(){
        
        $resultscounts = Result::where('teacher_id', auth::guard('teacher')->id()
        )->count();

        $countcognitive = Teacherdomain::where('teacher_id', auth::guard('teacher')->id()
        )->where('psycomoto', 'Cognitive Domain')->count();
        
        $countpsycomo = Teacherdomain::where('teacher_id', auth::guard('teacher')->id()
        )->where('psycomoto', 'Psychomotor Domain')->count();
        $countsubject = Teacherassign::where('teacher_id', auth::guard('teacher')->id()
        )->count();
        $countprimarysubjects = Subject::where('section', 'Primary')->count();
        $countseconsubjects = Subject::where('section', 'Secondary')->count();
        $countteachers = Teacher::where('school_id', auth::guard('teacher')->user()->school_id)->count();
        $countclasses = Classname::where('section', 'Secondary')->count();

        $countapproveresult = Result::where('teacher_id', auth::guard('teacher')->id()
        )->where('status', 'approved')->count();
        
        $countunapproveresult = Result::where('teacher_id', auth::guard('teacher')->id()
        )->where('status', 'approved')->count();

        $countpsyco = Domain::where('psycomoto', 'Cognitive Domain')->count();

        //principals/hm/hs section
        $countresults = Result::where('school_id', auth::guard('teacher')->user()->school_id)->count();
        $countunapprove = Result::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', null)->count();
        $countunapprove = Result::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', null)->count();

        $countapprove = Result::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', 'approved')->count();
        $countsprimarysubjects = Subject::where('section', 'primary')->count();
        $countsecondarysubjects = Subject::where('section', 'Senior Secondary')->count();
        $countjuniorsubjects = Subject::where('section', 'Junior Secondary')->count();
        $countpsycomo1 = Domain::whereNot('section', 'Primary')->count();

        
        $countstudent = Student::where('school_id', auth::guard('teacher')->user()
        ->school_id)->count();

        $reinstate = Student::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', 'approved')->count();
        $suspendedstu = Student::where('school_id', auth::guard('teacher')->user()
        ->school_id)->where('status', 'suspend')->count();

        $viewschoolnews = Schoolnew::where('school_id', auth::guard('teacher')->user()
        ->school_id)->count();
        
        
        return view('dashboard.teacher.home', compact('viewschoolnews', 'suspendedstu', 'reinstate', 'countstudent', 'countpsycomo1', 'countjuniorsubjects', 'countsecondarysubjects', 'countsprimarysubjects', 'countapprove', 'countunapprove', 'countresults', 'countpsyco', 'countclasses', 'countteachers', 'countseconsubjects', 'countprimarysubjects', 'countunapproveresult', 'countapproveresult', 'countsubject', 'countpsycomo', 'countcognitive', 'resultscounts'));
    }

    public function profile1() {
        $countresults = Result::where('teacher_id', auth::guard('teacher')->id()
        )->count();
        return view('dashboard.teacher.profile1', compact('countresults'));
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



    public function editstudentsc($ref_no){
        $edit_studentsc = Teacher::where('ref_no', $ref_no)->first();

        return view('dashboard.editstudentsc', compact('edit_studentsc'));
       
    }
    public function approveteacherbysc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'admitted';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function approveteacherbytr ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'admitted';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function suspendteacherbysc ($ref_no){
        $reject_student = Teacher::where('ref_no', $ref_no)->first();
        $reject_student->status = 'suspend';
        $reject_student->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }


   
    

    public function edittteachersc($ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Section::where('user_id', auth::guard('web')->id()
        )->get();
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.edittteachersc', compact('view_sessions', 'view_classes', 'view_sesions', 'view_terms', 'view_alms', 'edit_teacher'));
    }

    
    

    public function viewtteachersc($ref_no){
        $edit_teacher = Teacher::where('ref_no', $ref_no)->first();
        $view_alms = Alm::where('user_id', auth::guard('web')->id()
        )->get();

        $view_terms = Term::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sesions = Section::where('user_id', auth::guard('web')->id()
        )->get();
        $view_classes = Classname::where('user_id', auth::guard('web')->id()
        )->get();
        $view_sessions = Academicsession::latest()->get();

        return view('dashboard.viewtteachersc', compact('view_sessions', 'view_classes', 'view_sesions', 'view_terms', 'view_alms', 'edit_teacher'));
    }


    

    

    
    


   
    

    

    // public function primaryteachers(){
    //     $all_teachers = Teacher::latest()->get();
    //     return view('dashboard.admin.primaryteachers', compact('all_teachers'));
    // }
    
    
    public function primaryteachers(){
        $view_uyoteachers = Teacher::latest()->get();
        return view('dashboard.admin.primaryteachers', compact('view_uyoteachers'));
    }
    public function secondaryteachers(){
        $view_abujateachers = Teacher::latest()->get();
        return view('dashboard.admin.secondaryteachers', compact('view_abujateachers'));
    }
    public function myteachers(){
        $mmy_teachers = Teacher::where('assign1', 'teacher')->get();
        return view('dashboard.teacher.myteachers', compact('mmy_teachers'));
    }

   


    public function studentsubjectbyhead($ref_no){
        $view_studentsubjects = User::where('ref_no', $ref_no)->first();
        $view_subjects = Subject::where('section', 'Primary')->get();
        return view('dashboard.studentsubjectbyhead', compact('view_studentsubjects', 'view_subjects'));
    }

    public function studentsubjectsbyheads($ref_no){
        $view_studentsubjects = User::where('ref_no', $ref_no)->first();
        $view_subjects = Subject::where('section', 'Secondary')->get();
        return view('dashboard.studentsubjectsbyheads', compact('view_studentsubjects', 'view_subjects'));
    }
    
    public function studentsubjectsall($ref_no){
        $view_studentsubjects = User::where('ref_no', $ref_no)->first();
        $view_subjects = Subject::all();
        return view('dashboard.studentsubjectsall', compact('view_studentsubjects', 'view_subjects'));
    }
    





public function createprincipals2(Request $request){
       
    $request->validate([
        'fname' => ['required', 'string', 'max:255'],
        'surname' => ['required', 'string'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
        'phone' => ['required', 'string', 'unique:teachers'],
        'school_id' => ['required', 'string'],
        'ref_no1' => ['required', 'string'],
        'user_id' => ['required', 'string'],
        'academic_session' => ['required', 'string'],
        'slug' => ['required', 'string'],
        'term' => ['required', 'string'],
        'motor' => ['nullable', 'string'],
        'address' => ['nullable', 'string'],
        'schooltype' => ['required', 'string'],
        'lga' => ['required', 'string'],
        'section' => ['required', 'string'],
        'connect' => ['required', 'string'],
        'school_id' => ['required', 'string'],
        'centernumber' => ['required', 'string'],
        
        'password' => ['required', 'string', 'min:5'],
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


    $add_teacher['images'] = $path;
// dd($request->all());
   $add_teacher = new Teacher();
    $add_teacher->surname = $request->surname;
    $add_teacher->fname = $request->fname;
    $add_teacher->email = $request->email;
    $add_teacher->lga = $request->lga;
    $add_teacher->phone = $request->phone;
    $add_teacher->connect = $request->connect;
    $add_teacher->schooltype = $request->schooltype;
    $add_teacher->schoolname = $request->schoolname;
    $add_teacher->alms = $request->alms;
    $add_teacher->ref_no1 = $request->ref_no1;
    $add_teacher->academic_session = $request->academic_session;
    $add_teacher->user_id = $request->user_id;
    $add_teacher->school_id = $request->school_id;
    $add_teacher->centernumber = $request->centernumber;
    
    $add_teacher->motor = $request->motor;
    $add_teacher->logo = $request->logo;
    $add_teacher->address = $request->address;
    $add_teacher->section = $request->section;
    $add_teacher->slug = $request->slug;
   
    $add_teacher->term = $request->term;
    $add_teacher->assign1 = 'Principal';
    $add_teacher->ref_no = substr(rand(0,time()),0, 9);
    $add_teacher->classname = $request->classname;
    $add_teacher->password = \Hash::make($request->password);
   
    $add_teacher->save();
    if ($add_teacher) {
        return redirect()->route('teacher.home')->with('success', 'you have successfully registered');
            
        }else{
            return redirect()->back()->with('error', 'you have fail to registered');
    }
}




public function viewallhm(){
    $view_headmasters = Teacher::where('assign1', 'Principal')->latest()->get();
    return view('dashboard.viewallhm', compact('view_headmasters'));
}







public function updatetransfersprinc(Request $request, $ref_no){
    $transfer = Teacher::where('ref_no', $ref_no)->first();
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






public function registerteachers($ref_no){

       
    $getyours = Teacher::where('ref_no', $ref_no)->first();
    $getyoursterms = Term::all();
    $getclasses = Classname::all();
    $getalms = Alm::all();
    $addacademics = Academicsession::latest()->get();
    $lgas = Lga::all();

 
    
    return view('pages.registerteachers', compact('lgas', 'getyoursterms', 'getalms', 'getclasses', 'getyours', 'addacademics'));

}

public function updatesignature(Request $request, $ref_no){
    $add_signature = Teacher::where('ref_no', $ref_no)->first();
    $request->validate([
        'signature' => 'required|mimes:jpg,png,jpeg'
    ]);
    if ($request->hasFile('signature')){

        $file = $request['signature'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('signature')->storeAs('resourcesignature', $filename);
    }else{

        $path = 'noimage.jpg';
    }

    $add_signature['signature'] = $path;
    $add_signature->update();
    return redirect()->back()->with('success', 'you have successfully updated');

}

public function addsignature($ref_no){
    $add_signature = Teacher::where('ref_no', $ref_no)->first();

    return view('dashboard.teacher.addsignature', compact('add_signature'));
}



public function searchteachersbysusb(Request $request){
    $request->validate([
        // 'term' => ['required', 'string'],
        // 'academic_session' => ['required', 'string'],
        // 'classname' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
        'lga' => ['required', 'string'],
        'section' => ['required', 'string'],
    ]);
    if($view_teachers = Teacher::where('schoolname', $request->schoolname)
    // ->where('academic_session', $request->academic_session)
    // ->where('classname', $request->classname)
    // ->where('schoolname', $request->schoolname)
    ->where('lga', $request->lga)
    ->where('section', $request->section)
    ->exists()) {
        $view_teachers = Teacher::orderby('created_at', 'DESC')
        // ->where('term', $request->term)
        // ->where('academic_session', $request->academic_session)
        // ->where('classname', $request->classname)
        ->where('section', $request->section)
        ->where('schoolname', $request->schoolname)
        ->where('lga', $request->lga)

        ->get(); 
        }else{
           // return view('dashboard.web.noresult');
            return redirect()->back()->with('fail', 'Teachers not found!');
        }
        return view('dashboard.yourschoolteachers', compact('view_teachers'));

    }


    public function addlogotr($ref_no){
        $add_logo = Teacher::where('ref_no', $ref_no)->first();
        return view('dashboard.teacher.addlogotr', compact('add_logo'));
    }

    public function updatelogo(Request $request, $ref_no){
        $add_signature = Teacher::where('ref_no', $ref_no)->first();
        $request->validate([
            'logo' => 'required|mimes:jpg,png,jpeg'
        ]);
        if ($request->hasFile('logo')){
    
            $file = $request['logo'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('resourcesignature', $filename);
        }else{
    
            $path = 'noimage.jpg';
        }
    
        $add_signature['logo'] = $path;
        $add_signature->update();
        return redirect()->back()->with('success', 'you have successfully updated');
    
    }



    


public function logout(){
    Auth::guard('teacher')->logout();
    return redirect('teacher/login');
}
    

}
