<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Pin;
use App\Models\Position;
use App\Models\Student;
use App\Models\User;
use App\Models\Psycomotor;
use App\Models\Studentdomain;
use App\Models\Subject;
use App\Models\Teacherdomain;
use App\Models\Classname;
use App\Models\Alm;
use App\Models\Teacher;
use App\Models\Term;
use PDF;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

class ResultController extends Controller
{
   

     public function createresults(Request $request){
        // dd($request->all());
        foreach ($request->results as $add_result) {
        $result = Result::where([
            'subjectname'  => $add_result['subjectname'],
            'term'          => $add_result['term'],
            // 'alms'       => $add_result['alms'],
            'classname'     => $add_result['classname'],
            'section'       => $add_result['section'],
            'regnumber'     => $add_result['regnumber'],
            'academic_session'  => $add_result['academic_session'],
            'school_id'      => $add_result['school_id'],
        ])->exists();

        if ($result) {
            return redirect()->back()->with('fail', 'You have already submitted results of this person');
        }
    }

    
        $request->validate([
        'results.*.test_1' => 'nullable|string',
        'results.*.test_2' => 'nullable|string',
        'results.*.exams' => 'nullable|string',
        'results.*.subjectname' => 'nullable|string',
        'results.*.user_id' => 'nullable|string',

        'results.*.student_id' => 'nullable|string',
        'results.*.teacher_id' => 'nullable|string',
        'results.*.fname' => 'nullable|string',
        'results.*.lname' => 'nullable|string',
        'results.*.middlename' => 'nullable|string',

        'results.*.classname' => 'nullable|string',
        'results.*.regnumber' => 'nullable|string',
        'results.*.section' => 'nullable|string',
        'results.*.subsection' => 'nullable|string',
        'results.*.term' => 'nullable|string',

        'results.*.gender' => 'nullable|string',
        'results.*.academic_session' => 'nullable|string',
        'results.*.school_id' => 'nullable|string',
        'results.*.dob' => 'nullable|string',
        'results.*.alms' => 'nullable|string',
        'results.*.logo' => 'nullable|string',
        'results.*.signature' => 'nullable|string',
        'results.*.lga' => 'nullable|string',
        'results.*.dob' => 'nullable|string',
        'results.*.schooltype' => 'nullable|string',
        'results.*.slug' => 'nullable|string',
        
    ]);
        
        foreach ($request->results as $add_result) {
        Result::create([
            'test_1' => $add_result['test_1'] ?? null,
            'test_2' => $add_result['test_2'] ?? null,
            'exams' => $add_result['exams'] ?? null,
            'subjectname' => $add_result['subjectname'] ?? null,
            'fname' => $add_result['fname'] ?? null,
            'surname' => $add_result['surname'] ?? null,
            'middlename' => $add_result['middlename'] ?? null,
            'gender' => $add_result['gender'] ?? null,
            'schooltype' => $add_result['schooltype'] ?? null,
            'term' => $add_result['term'] ?? null,
            'alms' => $add_result['alms'] ?? null,
            'dob' => $add_result['dob'] ?? null,
            'classname' => $add_result['classname'] ?? null,
            'section' => $add_result['section'] ?? null,
            'subsection' => $add_result['subsection'] ?? null,
            'regnumber' => $add_result['regnumber'] ?? null,
            'user_id' => $add_result['user_id'] ?? null,
            'student_id' => $add_result['student_id'] ?? null,
            'teacher_id' => $add_result['teacher_id'] ?? null,
            'school_id' => $add_result['school_id'] ?? null,
            'images' => $add_result['images'] ?? null,
            'academic_session' => $add_result['academic_session'] ?? null,
            'regnumber' => $add_result['regnumber'] ?? null,
            'logo' => $add_result['logo'] ?? null,
            'lga' => $add_result['lga'] ?? null,
            'signature' => $add_result['signature'] ?? null,
            'ref_no' => $add_result['ref_no'] ?? null,
            'tfname' => $add_result['tfname'] ?? null,
            'tlname' => $add_result['tlname'] ?? null,
            'ref_no2' => 'RS-' . uniqid(),
            'slug' => $add_result['slug'] ?? null,


        ]);
    }
       
    return redirect()->back()->with('success', 'Results added successfully.');

    }



    
   
    public function teacherviewresults($student_id){
        $view_myresult_results = Result::where('student_id', $student_id)
        ->where('term', 'First Term')
        ->get();

        $view_results = Result::where('student_id', $student_id)->first();
           
        return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    }

    public function teacherviewresults2nd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'Second Term')
        ->get();

        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults', compact('view_results', 'view_myresult_results'));
    }


    public function teacherviewresults3rd($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)
        ->where('term', 'third Term')
        ->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.teacherviewresults3rd', compact('view_results', 'view_myresult_results'));
    }

    public function addpsychomotor($ref_no2){
        $add_psychomotor = Result::where('ref_no2', $ref_no2)->first();
        $view_domains = Domain::where('section', auth()->user()->section)->get();
        $view_pscos = Domain::where('psycomoto', 'Psychomotor Domain')
        ->where('section', auth()->user()->section)->get();
        if(auth()->user()->role == 'subadmin'){

             $view_domains = Domain::where('section', auth()->user()->section)->get();
        $view_pscos = Domain::where('psycomoto', 'Psychomotor Domain')->get();
            return view('dashboard.addpsychomotor', compact('view_pscos','add_psychomotor', 'view_domains'));

        }
        return view('dashboard.teacher.addpsychomotor', compact('view_pscos','add_psychomotor', 'view_domains'));
    }

    public function thirdtermresults(){
        $view_myresults = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'third Term')
        ->get();
        return view('dashboard.thirdtermresults', compact('view_myresults'));
    }
 
    

    public function secondtermresults(){
        $view_myresult_penultimates = Result::where('teacher_id', auth::guard('web')->id())
         ->where('term', 'Second Term')
        ->get();
        return view('dashboard.secondtermresults', compact('view_myresult_penultimates'));
    }
    
   
    public function checkresult(){
       $the_results = Academicsession::all();
        return view('dashboard.guardian.checkresult', compact('the_results'));
    }
    

    public function yourresult(Request $request){
        $request->validate([
            'pins' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'pins.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->where('pins', $request->pins)
        ->exists()) {
        $getyour_results = Result::where('user_id', auth::guard('web')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
       // $view_results = Result::where('user_id', $user_id)->first();
       $getyours = Result::where('user_id', auth::guard('web')->id()
       )->where('term', 'First Term')->take(1)
       ->get();

       
       
        // $pdf = PDF::loadView('dashboard.pdf', compact('getyours','getyour_results'));

        // return $pdf->download('school_report.pdf');
    return view('dashboard.guardian.yourresult', compact('getyours','getyour_results'));
      
    }

    public function printresult(Request $request, $user_id){
        $print_results = Result::where('user_id', $user_id)
        ->where('term', 'First Term')->get();
        return view('dashboard.printresult', compact('print_results'));
    }




    public function generatePDF(Request $request)
    {

        $request->validate([
            // 'classname' => ['required', 'string'],
            'regnumber' => ['required', 'string',],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->exists()) {
        $getyour_results = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->count();

        $total_student = Result::where('guardian_id', auth::guard('guardian')->id()
        )->where('classname', $request->classname)
        ->where('term', $request->term)->count();
        $pdf = PDF::loadView('dashboard.guardian.pdf', compact('total_student', 'total_subject', 'getyour_results'));
     
        return $pdf->download('goldendestinyschools.pdf');
    }



    public function viewresultbyadmins(){
        $view_results = Result::latest()->get();
        $view_schoolsnames = User::where('status', 'admitted')->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewresultbyadmins', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'view_results'));
    }

    public function searchresults(Request $request){
        $request->validate([
            'term' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
        ]);
        if($view_schholsresults = Result::where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)
        ->exists()) {
            $view_schholsresults = Result::orderby('created_at', 'DESC')
            ->where('school_id', $request->school_id)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->get(); 
            }else{
                return view('dashboard.admin.noresult');
                //return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.yourschoolreults', compact('view_schholsresults'));
    
        }
    
        
        
            public function editviewresultsad($id){
                $edit_results = Result::find($id);
                return view('dashboard.admin.editviewresultsad', compact('edit_results'));
            }
        

    public function viewresults($user_id){
        $view_myresult_results = Result::where('user_id', $user_id)->get();
        $view_results = Result::where('user_id', $user_id)->first();
           
        return view('dashboard.admin.viewresults', compact('view_results', 'view_myresult_results'));
    }

    public function viewresult($id){
        // $view_myresult_results = Result::where('id', $id)->get();
        $viewsingle_results = Result::where('id', $id)->first();
        
           
        return view('dashboard.admin.viewresult', compact('viewsingle_results'));
    }

    public function viewallresults(){
        $viewals_results = Result::latest()->get();
        return view('dashboard.admin.viewallresults', compact('viewals_results'));
    }

    
    public function approveresultbyteacher($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function approveresults($id){
        $approved_results = Result::find($id);
        $approved_results->status = 'approved';
        $approved_results->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    // public function approvedresultsc($id){
    //     $approved_results = Result::find($id);
    //     $approved_results->status = 'approved';
    //     $approved_results->save();
    //     return redirect()->back()->with('success', 'you have approved successfully');
    // }

    public function viewpins(){
        $view_pins = Result::latest()->get();
        $view_schoolsnames = User::where('status', 'admitted')->latest()->get();
        $view_academcsessions = Academicsession::all();
        $view_terms = Term::all();
        return view('dashboard.admin.viewpins', compact('view_terms', 'view_academcsessions', 'view_schoolsnames', 'view_pins'));
    }

    public function viewapproveresultsbyad(){
        $approve_results = Result::where('status', 'approved')->get();
        $view_schoolsnames = User::where('status', 'admitted')->get();
        $view_academcsessions = Academicsession::all();
        // $view_terms = Term::all();
        return view('dashboard.admin.viewapproveresultsbyad', compact('view_academcsessions', 'view_schoolsnames', 'approve_results'));
    }
    
    public function addpsychomotorad($id){
        $add_psychomotorad = Result::find($id);
        return view('dashboard.admin.addpsychomotorad', compact('add_psychomotorad'));
    }

   
         
      
    public function pdf1(){
        $getyour_results = Result::all();
        return view('dashboard.guardian.pdf1', compact('getyour_results'));
    }
    public function tecacherviewresultbysub(){
        $view_myresult_results = Result::where('teacher_id', auth::guard('web')->id())
        ->where('status', null)->latest()->get();
        $view_sessions = Academicsession::latest()->get();
        $view_students = Student::where('classname', auth::guard('web')->user()->classname)
        ->where('school_id', auth::guard('web')->user()->school_id)
        ->where('term', auth::guard('web')->user()->term)
        ->where('academic_session', auth::guard('web')->user()->academic_session)
        ->get();
        $view_alms = Alm::all();
        
        return view('dashboard.teacher.tecacherviewresultbysub', compact('view_alms', 'view_students', 'view_sessions', 'view_myresult_results'));
    }

    public function tecacherviewresultbysubapproved(){
        // $view_results = Result::where('student_id', $student_id)->first();
        $view_myresult_results = Result::where('teacher_id', auth::guard('web')->id())
        ->where('status', 'approved')->latest()->get();
        $view_sessions = Academicsession::latest()->get();
        $view_students = Student::where('classname', auth::guard('web')->user()->classname)
        ->where('school_id', auth::guard('web')->user()->school_id)
        ->where('term', auth::guard('web')->user()->term)
        ->where('academic_session', auth::guard('web')->user()->academic_session)
        ->get();
        $view_alms = Alm::all();
         
        return view('dashboard.teacher.tecacherviewresultbysubapproved', compact('view_alms', 'view_students', 'view_sessions', 'view_myresult_results'));
    }

    

    public function addpsychomotorteacher($id){
        $addpsychomotor_results = Result::find($id);
        return view('dashboard.teacher.addpsychomotorteacher', compact('addpsychomotor_results'));
    }

    

    public function checkresults (){
        $addacademics = Academicsession::latest()->get();
        $get_alms = Alm::all();
        $get_classnames = Classname::orderBy('classname')->get();
        return view('pages.checkresults', compact('get_classnames', 'get_alms', 'addacademics'));
    }


    public function checkyourresults(Request $request)
    {
        $request->validate([
            'pins' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'term' => ['required', 'string',],
            
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        if($getyour_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
        ->exists()) {
        $getyour_results = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

        $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();

        $total_student = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        // $phone = User::find(1)->phone;

        $getyour_resultsdomains = Studentdomain::where('term', $request->term)->get();
        //$pdf = PDF::loadView('dashboard.guardian.pdf', compact('total_student', 'total_subject', 'getyour_results'));
     
        return view('pages.resultterm', compact('getyour_resultsdomains', 'total_student', 'total_subject', 'getyour_results'));
    }

    public function addpsychomotorteacher1($id){
        $view_yourtudents = Result::where('id', $id)->first();
        $view_yourdomains = Domain::all();
        return view('dashboard.teacher.addpsychomotorteacher1', compact('view_yourdomains','view_yourtudents'));
    }
    

    public function searchstudentresults(Request $request){
        $request->validate([
            'term' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'academic_session' => ['required', 'string'],
            'classname' => ['required', 'string'],
        ]);
        dd($request->all());
        if($view_schholsresults = Result::where('term', $request->term)
        ->where('regnumber', $request->regnumber)
        ->where('academic_session', $request->academic_session)
        ->where('classname', $request->classname)
        ->where('term', $request->term)
        ->exists()) {
            $view_schholsresults = Result::orderby('created_at', 'DESC')
            ->where('regnumber', $request->regnumber)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_sessbion)
            ->where('classname', $request->classname)

            ->get(); 
            }else{
                return view('dashboard.admin.noresult');
                //return redirect()->back()->with('fail', 'There is no students in these class!');
            }
            return view('dashboard.admin.viewresultsl', compact('view_schholsresults'));
    
        }
    public function allresults(){
        $view_resultalls = Result::where('user_id', auth::guard('web')->user()->user_id)->get();
        $view_classes = Classname::all();
        return view('dashboard.allresults', compact('view_classes', 'view_resultalls'));
    }

  

    // public function schoolsresults(){
    //     $view_resultalls = Result::where('user_id', auth::guard('web')->id())->get();
    //     $view_classes = Classname::all();
    //     return view('dashboard.schoolsresults', compact('view_classes', 'view_resultalls'));
    // }

    
    public function reachresultbysc(Request $request){
        $request->validate([
            'school_id' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string',],

        ], [
            'school_id.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request);
        if($view_allresults = Result::where('classname', $request->classname)
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)
        ->exists()) {
        $view_allresults = Result::where('user_id', auth::guard('web')->id()
        )
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('classname', $request->classname)
        ->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
    
            return view('dashboard.viewresultsbysc', compact('view_allresults'));
    
        }


        public function reachresultbystudentsc(Request $request){
            $request->validate([
                'classname' => ['required', 'string'],
                'regnumber' => ['required', 'string',],
                'academic_session' => ['required', 'string',],
                'term' => ['required', 'string'],
                'section' => ['required', 'string'],
    
            ], [
                'regnumber.exist'=>'This email does not exist in the admins table'
            ]);
            
            if($view_myresult_results = Result::where('regnumber', $request->regnumber)->where('term', $request->term)
            ->where('classname', $request->classname)
            ->where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->exists()) {
            $view_myresult_results = Result::where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)
            ->where('term', $request->term)
            ->where('regnumber', $request->regnumber)
            ->where('section', $request->section)
            ->get();
            }else{
                return redirect()->back()->with('fail', 'There is no results for you!');
            }
            
            $view_psyos = Studentdomain::where('term', $request->term)->get();

            $total_subject = Result::where('academic_session', $request->academic_session)
        ->where('term', $request->term)->count();
        return back()->with('success', 'Pass throught LGA');
        return view('dashboard.yourresultschools', compact('total_subject', 'view_psyos', 'view_myresult_results'));
          
        }




    public function generateresultPDF(Request $request){
        // dd($request->all());
        $request->validate([
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'term' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
        ], [
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request->all());
        if($view_getresults = Result::where('term', $request->term)->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->where('alms', $request->alms)
        // ->where('location', $request->location)

        ->exists()) {
        $view_getresults = Result::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('alms', $request->alms)
        ->where('classname', $request->classname)
        // ->where('location', $request->location)

        ->get();
        // dd($view_getresults);

        $average = $view_getresults->map(function ($r) {
            return $r->test_1 + $r->test_2 + $r->exams;
        })->avg();
        // dd($request->all());

        $view_getresultsdomains = Studentdomain::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->get();
    //    dd($view_results);
        if(!$view_getresultsdomains){
            return redirect()->back()->with('fail', 'Your Results is on Process check back!');
        }

        $numberinclass = Student::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('alms', $request->alms)
        ->where('classname', $request->classname)
        
        ->count();

          $results = Result::where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->where('alms', $request->alms)
            ->where('classname', $request->classname)
            ->get();

        // Add total score
        $results = $results->map(function ($r) {
            $r->total_score = $r->test_1 + $r->test_2  + $r->exams;
            return $r;
        });

        // Group by subject
        $grouped = $results->groupBy('subjectname');

        $finalPositions = [];

        foreach ($grouped as $subject => $students) {

            // Sort each subject
            $sorted = $students->sortByDesc('total_score')->values();

            $rank = 1;
            $prevScore = null;

            foreach ($sorted as $index => $res) {

                if ($prevScore !== null && $res->total_score < $prevScore) {
                    $rank = $index + 1;
                }

                $finalPositions[] = [
                    'student_id'  => $res->student_id,
                    'subject'     => $subject,
                    'total_score' => $res->total_score,
                    'position'    => $rank
                ];

                $prevScore = $res->total_score;
            }
        }

        //STUDENT POSITION BEGINS HERE
    // Fetch all results of students in that class
    $results = Result::where('term', $request->term)
    ->where('classname', $request->classname)
    ->where('academic_session', $request->academic_session)
    // ->where('location', $request->location)
    ->get()
    ->groupBy('student_id');

    $studentTotals = collect();

    foreach ($results as $student_id => $studentResults) {
        $total = $studentResults->sum(function ($r) {
            return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;
        });

        $average = $studentResults->avg(function ($r) {
            return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;
        });

    
        $studentTotals->push([
        'student_id' => $student_id,
        'regnumber'  => $studentResults->first()->regnumber,
        'student'    => $studentResults->first()->student,
        'total'      => $total,
        'average'    => round($average, 2),
    ]);
    }
    // dd($studentTotals);


    // Sort and rank
    $sorted = $studentTotals->sortByDesc('total')->values();

    $ranked = $sorted->map(function ($item, $index) use ($sorted) {
        if ($index > 0 && $sorted[$index - 1]['total'] == $item['total']) {
            $item['position'] = $sorted[$index - 1]['position']; // same rank for tie
        } else {
            $item['position'] = $index + 1;
        }
        return $item;
    });
    // dd($ranked);

    $currentStudent = $ranked->firstWhere('regnumber', $request->regnumber);
    
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        if ($request->section == 'Secondary') {
             return view('pages.resultspdf', compact('currentStudent',
            'ranked', 'finalPositions', 'average', 'numberinclass', 'view_getresultsdomains', 'view_getresults'));

        }elseif($request->section == 'Primary' || $request->section == 'Reception' || $request->section == 'Nursery'){
            return view('pages.resultspdf', compact('currentStudent',
            'ranked', 'finalPositions', 'average', 'numberinclass', 'view_getresultsdomains', 'view_getresults'));
        }
        return redirect()->back()->with('fail', 'Fetch result not found');

    }


    



        public function searchpins(Request $request){
            $request->validate([
                'schoolname' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'term' => ['required', 'string'],
    
            ], [
                'schoolname.exist'=>'This email does not exist in the admins table'
            ]);
        if($getyour_pins = Result::where('schoolname', $request->schoolname)->where('term', $request->term)
        ->exists()) {
        $getyour_pins = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

         
        $pdf = PDF::loadView('dashboard.admin.pdfpins', compact('getyour_pins'));
    
        return $pdf->download('school_pins.pdf');
         
        }

        public function viewschoolpins($user_id){
            $view_schoolpins = Result::where('user_id', $user_id)->latest()->get();
            $view_academcsessions = Academicsession::all();
            return view('dashboard.admin.viewschoolpins', compact('view_academcsessions', 'view_schoolpins'));
        }


        
        public function searchpinsforclass(Request $request){
            $request->validate([
                'schoolname' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'term' => ['required', 'string'],
                'classname' => ['required', 'string'],
    
            ], [
                'schoolname.exist'=>'This email does not exist in the admins table'
            ]);
        if($getyour_pins = Result::where('schoolname', $request->schoolname)->where('term', $request->term)
        ->where('classname', $request->classname)
        ->exists()) {
        $getyour_pins = Result::where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }

         
        $pdf = PDF::loadView('dashboard.admin.pdfpinsforclass', compact('getyour_pins'));
    
        return $pdf->download('school_classpins.pdf');
         
        }
        

        public function searchfortermbyschresult(Request $request){
            // dd($request->all());
            $request->validate([
                'term' => ['required', 'string'],
                'academic_session' => ['required', 'string'],
                'classname' => ['required', 'string'],
                'section' => ['required', 'string'],
                'school_id' => ['required', 'string'],
                'alms' => ['nullable', 'string'],

            ]);
            // dd($request->all());
            if($view_myresults = Result::where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('classname', $request->classname)
            ->where('school_id', $request->school_id)
            ->where('section', $request->section)
            ->exists()) {
                $view_myresults = Result::orderby('created_at', 'DESC')
                ->where('term', $request->term)
                ->where('academic_session', $request->academic_session)
                ->where('classname', $request->classname)
                ->where('school_id', $request->school_id)
                ->where('section', $request->section)
                ->where('alms', $request->alms)

                ->get(); 
                }else{
                   // return view('dashboard.teacher.noresult');
                    return redirect()->back()->with('fail', 'There is no students results in these class!');
                }
                if(auth()->user()->role == 'subadmin' || auth()->user()->role == 'admin'){
                    return view('dashboard.yourschoolreultstermbyprinc', compact('view_myresults'));
                }else{
                    return view('dashboard.teacher.yourschoolreultstermbyprinc', compact('view_myresults'));
                }
            }


            public function searchfortermbysch(Request $request){
                $request->validate([
                    'term' => ['required', 'string'],
                    'academic_session' => ['required', 'string'],
                    'classname' => ['required', 'string'],
                    'schoolname' => ['required', 'string'],
                    'lga' => ['required', 'string'],
                ]);
                if($view_myresults = Result::where('term', $request->term)
                ->where('academic_session', $request->academic_session)
                ->where('classname', $request->classname)
                ->where('schoolname', $request->schoolname)
                ->where('lga', $request->lga)
                ->exists()) {
                    $view_myresults = Result::orderby('created_at', 'DESC')
                    ->where('term', $request->term)
                    ->where('academic_session', $request->academic_session)
                    ->where('classname', $request->classname)
                    ->where('schoolname', $request->schoolname)
                    ->where('lga', $request->lga)
    
                    ->get(); 
                    }else{
                       // return view('dashboard.web.noresult');
                        return redirect()->back()->with('fail', 'Result not found!');
                    }
                    return view('dashboard.yourschoolreultsterm', compact('view_myresults'));
            
                }


            public function allresultsprinci(){
                $view_myresults = Classname::all();
                $view_myresults = Result::where('school_id', auth()->user()->school_id)
                ->where('status', null)
                ->latest()->get();
                $view_classes = Classname::all();
                $view_alms = Alm::all();
                $view_sessions = Academicsession::latest()->get();
        
                return view('dashboard.teacher.allresultsprinci', compact('view_alms', 'view_sessions', 'view_classes', 'view_myresults'));
           
            }

            public function allresultsprinciapproved(){
                $view_myresults = Classname::all();
                $view_myresults = Result::where('status', 'approved')->latest()->get();
                $view_classes = Classname::all();
                $view_alms = Alm::all();
                $view_sessions = Academicsession::latest()->get();
        
                return view('dashboard.teacher.allresultsprinciapproved', compact('view_alms', 'view_sessions', 'view_classes', 'view_myresults'));
           
            }

            public function addheadteachercomment($ref_no2){
                $add_comments = Result::where('ref_no2', $ref_no2)->first();

                return view('dashboard.teacher.addheadteachercomment', compact('add_comments'));
            }
            


    public function updateheadteachercommentteacher(Request $request, $ref_no2){
        $add_comments = Result::where('ref_no2', $ref_no2)->first();
        $add_comments->headteach_comment = $request->headteach_comment;
        $add_comments->save();

        return redirect()->back()->with('success', 'Head Teacher comment added successfully.');
    }


        public function addcomment($id){
            $add_comments = Result::find($id);
            return view('dashboard.teacher.addcomment', compact('add_comments'));
        }

        public function addresultcomment(Request $request, $id){
            $add_comments = Result::find($id);
            $request->validate([
                'headteach_comment' => ['required'],
            ]);

            $add_comments->headteach_comment = $request->headteach_comment;
            $add_comments->update();

            return redirect()->back()->with('success', 'You have successfully added result comment');

        }


    public function addcommentsteachers($id){
        $add_comments = Result::find($id);

        return view('dashboard.teacher.addcommentsteachers', compact('add_comments'));
    }


    

    
    public function addresultcommentbyteachers(Request $request, $id){
        $add_comments = Result::find($id);
        $request->validate([
            'teacher_comment' => ['required'],
            'next_term' => ['required'],
            
        ]);

        $add_comments->next_term = $request->next_term;
        $add_comments->teacher_comment = $request->teacher_comment;
        $add_comments->update();



        return redirect()->back()->with('success', 'You have successfully added result comment');

    }

    public function addheadcommentbyteachers(Request $request, $id){
        $add_comments = Result::find($id);
        $request->validate([
            'headteachercomment' => ['required'],
            
        ]);

        $add_comments->headteachercomment = $request->headteachercomment;
        $add_comments->update();

        return redirect()->back()->with('success', 'You have successfully added result comment');

    }

    public function editresultsbyteacher($ref_no2){
        $edit_results = Result::where('ref_no2', $ref_no2)->first();

        return view('dashboard.teacher.editresultsbyteacher', compact('edit_results'));
    }

    public function updateheresult(Request $request, $ref_no2){
        // dd($request->all());
        $edit_results = Result::where('ref_no2', $ref_no2)->first();
        $request->validate([
            'test_1' => ['required', 'max:255'],
            // 'test_3' => ['required', 'max:255'],
            'test_2' => ['required', 'max:255'],
            'exams' => ['required', 'max:255'],
        ]);

        $edit_results->test_1 = $request->test_1;
        $edit_results->test_2 = $request->test_2;
        $edit_results->exams = $request->exams;
        $edit_results->update();
        return redirect()->back()->with('success', 'You have successfully edited result ');
        
    }



    public function approveallprimary(Request $request){
    $action = $request->input('action_type');
    $terminals = $request->input('terminals');
    if ($action === 'approve') {
        foreach ($terminals as $item) {
            Result::where('id', $item['id'])->update(['status' => 'approved']);
        }

    } elseif ($request->has('delete_ids')) {
        foreach ($request->delete_ids as $id) {
            Result::where('id', $id)->delete();
    }

    if ($action === 'approve') {
        return redirect('admin/responsepageheadteacher')->with('success', 'Selected result approved successfully.');

    }else{
        return redirect('admin/responsepageheadteacher')->with('success', 'Selected result deleted successfully.');
    }
    }
    
        return redirect('admin/responsepageheadteacher')->with('success', 'Selected result approved successfully.');
    }


    public function responsepageheadteacher(){
        return view('dashboard.teacher.responsepageheadteacher');
    }

    public function approveresulteacher($ref_no2){
        $approved_result = Result::where('ref_no2', $ref_no2)->first();
        if (!$approved_result) {
            return redirect()->back()->with('error', 'Result not found.');
        }

        $approved_result->status = 'approved';
        $approved_result->update();

        return redirect()->back()->with('success', 'Result approved successfully.');
    }



    public function updateheresultadmin(Request $request, $id){
        // dd($request->all());
        $edit_results = Result::find($id);
        $request->validate([
            'test_1' => ['required', 'max:255'],
            // 'test_3' => ['required', 'max:255'],
            'test_2' => ['required', 'max:255'],
            'exams' => ['required', 'max:255'],
        ]);

        $edit_results->test_1 = $request->test_1;
        $edit_results->test_2 = $request->test_2;
        $edit_results->test_3 = $request->test_3;
        $edit_results->exams = $request->exams;
        $edit_results->update();
        return redirect()->back()->with('success', 'You have successfully edited result ');
        
    }

     
    public function reachresultbyposition(Request $request){
        $request->validate([
            'school_id' => ['required', 'string'],
            // 'classname' => ['required', 'string'],
            'academic_session' => ['required', 'string',],
            'term' => ['required', 'string'],
            'section' => ['required', 'string'],

        ], [
            'school_id.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request->all());

        if($view_allresults = Result::where('term', $request->term)
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->exists()) {
        $view_allresults = Result::where('section', $request->section)
        ->where('term', $request->term)
        ->where('school_id', $request->school_id)
        ->where('academic_session', $request->academic_session)->get();
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
    
            return view('dashboard.viewresultsbyscposition', compact('view_allresults'));
    
        }

    public function addcommentadmin($id){
        $add_comment = Result::find($id);
        return view('dashboard.admin.addcommentadmin', compact('add_comment'));
    }

    public function addcommentsbyadmin(Request $request, $id){
        $add_comment = Result::find($id);
        $request->validate([
            'headteacher_comment' => ['required'],
        ]);
        $add_comment->headteacher_comment = $request->headteacher_comment;
        $add_comment->update();

        return redirect()->back()->with('success', 'You have added comment to the result successfully');
    }

    public function analyseresult($slug){
        $viewanalisis = Result::where('slug', $slug)->first();
        $view_academcsessions = Academicsession::latest()->get();
        $studentcount = Student::where('slug', $slug)->count();
        $teachercount = User::where('slug', $slug)->count();

        return view('dashboard.admin.analyseresult', compact('teachercount', 'studentcount', 'view_academcsessions', 'viewanalisis'));
    }







public function searchforstudentresulthead(Request $request){
        $request->validate([
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'term' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            
        ], [
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request->all());
        
        if($view_getresults = Result::where('term', $request->term)->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->where('alms', $request->alms)
        // ->orwhere('school_id', $request->school_id)
        ->exists()) {
        $view_getresults = Result::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('alms', $request->alms)
        // ->orwhere('school_id', $request->school_id)
        ->where('classname', $request->classname)
        ->get();
        // dd($view_getresults);

        $average = $view_getresults->map(function ($r) {
            return $r->test_1 + $r->test_2 + $r->exams;
        })->avg();

        $view_results = Studentdomain::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->first();
        if(!$view_results){
            return redirect()->back()->with('fail', 'No Pscomotor added to this student results');
        }

        $numberinclass = Student::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('alms', $request->alms)
        ->where('classname', $request->classname)
        ->where('school_id', $request->school_id)
        ->count();


            $results = Result::where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->where('alms', $request->alms)
            // ->orwhere('school_id', $request->school_id)
            ->where('classname', $request->classname)
            ->get();

            // dd($results);

        // Add total score
        $results = $results->map(function ($r) {
            $r->total_score = $r->test_1 + $r->test_2 + $r->exams;
            return $r;
        });

        // Group by subject
        $grouped = $results->groupBy('subjectname');

        $finalPositions = [];

        foreach ($grouped as $subject => $students) {

            // Sort each subject
            $sorted = $students->sortByDesc('total_score')->values();

            $rank = 1;
            $prevScore = null;

            foreach ($sorted as $index => $res) {

                if ($prevScore !== null && $res->total_score < $prevScore) {
                    $rank = $index + 1;
                }

                $finalPositions[] = [
                    'student_id'  => $res->student_id,
                    'subject'     => $subject,
                    'total_score' => $res->total_score,
                    'position'    => $rank
                ];

                $prevScore = $res->total_score;
            }
        }

        //return $finalPositions;


        //STUDENT POSITION BEGINS HERE
        // Fetch all results of students in that class
        $results = Result::where('term', $request->term)
            ->where('classname', $request->classname)
            ->where('academic_session', $request->academic_session)
            ->where('school_id', $request->school_id)
            ->get()
            ->groupBy('student_id');

        $studentTotals = collect();

        foreach ($results as $student_id => $studentResults) {
            $total = $studentResults->sum(function ($r) {
                // return (float)$r->test_1 + (float)$r->exams;
                return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;

            });

            $average = $studentResults->avg(function ($r) {
                return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;
            });

        
            $studentTotals->push([
            'student_id' => $student_id,
            'regnumber'  => $studentResults->first()->regnumber,
            'student'    => $studentResults->first()->student,
            'total'      => $total,
            'average'    => round($average, 2),
        ]);
        }
        // dd($studentTotals);


        // Sort and rank
        $sorted = $studentTotals->sortByDesc('total')->values();

        $ranked = $sorted->map(function ($item, $index) use ($sorted) {
            if ($index > 0 && $sorted[$index - 1]['total'] == $item['total']) {
                $item['position'] = $sorted[$index - 1]['position']; // same rank for tie
            } else {
                $item['position'] = $index + 1;
            }
            return $item;
        });
        // dd($ranked);

        $currentStudent = $ranked->firstWhere('regnumber', $request->regnumber);
        $getyour_resultsdomains = Studentdomain::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('regnumber', $request->regnumber)
        ->get();

        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        if ($request->section == 'Secondary') {
            return view('dashboard.childresultsecondary', compact('getyour_resultsdomains', 'currentStudent',
            'ranked', 'average', 'numberinclass', 'view_results', 'view_getresults', 'finalPositions'));

        }elseif($request->section == 'Primary' || $request->section == 'Reception' || $request->section == 'Nursery'){
            return view('dashboard.childresults', compact('getyour_resultsdomains', 'currentStudent',
            'ranked', 'average', 'numberinclass', 'view_results', 'view_getresults', 'finalPositions'));
        }
        return redirect()->back()->with('fail', 'Fetch result not found');

    }

    public function searchforstudentresult(Request $request){
        $request->validate([
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'term' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
            
        ], [
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request->all());
        
        if($view_getresults = Result::where('term', $request->term)->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->where('alms', $request->alms)
        // ->orwhere('school_id', $request->school_id)
        ->exists()) {
        $view_getresults = Result::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('alms', $request->alms)
        // ->orwhere('school_id', $request->school_id)
        ->where('classname', $request->classname)
        ->get();
        // dd($view_getresults);

        $average = $view_getresults->map(function ($r) {
            return $r->test_1 +$r->test_2 + $r->exams;
        })->avg();

        $view_results = Studentdomain::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->first();
        if(!$view_results){
            return redirect()->back()->with('fail', 'No Pscomotor added to this student results');
        }

        $numberinclass = Student::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('alms', $request->alms)
        ->where('classname', $request->classname)
        ->where('school_id', $request->school_id)
        ->count();


            $results = Result::where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->where('alms', $request->alms)
            // ->orwhere('school_id', $request->school_id)
            ->where('classname', $request->classname)
            ->get();

            // dd($results);

        // Add total score
        $results = $results->map(function ($r) {
            $r->total_score = $r->test_1 + $r->test_2 + $r->exams;
            return $r;
        });

        // Group by subject
        $grouped = $results->groupBy('subjectname');

        $finalPositions = [];

        foreach ($grouped as $subject => $students) {

            // Sort each subject
            $sorted = $students->sortByDesc('total_score')->values();

            $rank = 1;
            $prevScore = null;

            foreach ($sorted as $index => $res) {

                if ($prevScore !== null && $res->total_score < $prevScore) {
                    $rank = $index + 1;
                }

                $finalPositions[] = [
                    'student_id'  => $res->student_id,
                    'subject'     => $subject,
                    'total_score' => $res->total_score,
                    'position'    => $rank
                ];

                $prevScore = $res->total_score;
            }
        }

        //return $finalPositions;


        //STUDENT POSITION BEGINS HERE
        // Fetch all results of students in that class
        $results = Result::where('term', $request->term)
            ->where('classname', $request->classname)
            ->where('academic_session', $request->academic_session)
            ->where('school_id', $request->school_id)
            ->get()
            ->groupBy('student_id');

        $studentTotals = collect();

        foreach ($results as $student_id => $studentResults) {
            $total = $studentResults->sum(function ($r) {
                return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;
            });

            $average = $studentResults->avg(function ($r) {
                return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;
            });

        
            $studentTotals->push([
            'student_id' => $student_id,
            'regnumber'  => $studentResults->first()->regnumber,
            'student'    => $studentResults->first()->student,
            'total'      => $total,
            'average'    => round($average, 2),
        ]);
        }
        // dd($studentTotals);


        // Sort and rank
        $sorted = $studentTotals->sortByDesc('total')->values();

        $ranked = $sorted->map(function ($item, $index) use ($sorted) {
            if ($index > 0 && $sorted[$index - 1]['total'] == $item['total']) {
                $item['position'] = $sorted[$index - 1]['position']; // same rank for tie
            } else {
                $item['position'] = $index + 1;
            }
            return $item;
        });
        // dd($ranked);

        $currentStudent = $ranked->firstWhere('regnumber', $request->regnumber);
        $getyour_resultsdomains = Studentdomain::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('regnumber', $request->regnumber)
        ->get();

        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }
        if(auth()->user()->schooltype == 'SSEB' || auth()->user()->schooltype == 'SUBEB' || auth()->user()->role == 'admin')
            if ($request->section == 'Secondary') {
                return view('dashboard.childresults', compact('getyour_resultsdomains', 'currentStudent',
                'ranked', 'average', 'numberinclass', 'view_results', 'view_getresults', 'finalPositions'));

            }elseif($request->section == 'Primary'){
                return view('dashboard.childresults', compact('getyour_resultsdomains', 'currentStudent',
                'ranked', 'average', 'numberinclass', 'view_results', 'view_getresults', 'finalPositions'));
            
    }else{
        if ($request->section == 'Secondary') {
                return view('dashboard.teacher.childresults', compact('getyour_resultsdomains', 'currentStudent',
                'ranked', 'average', 'numberinclass', 'view_results', 'view_getresults', 'finalPositions'));

            }elseif($request->section == 'Primary'){
                return view('dashboard.teacher.childresults', compact('getyour_resultsdomains', 'currentStudent',
                'ranked', 'average', 'numberinclass', 'view_results', 'view_getresults', 'finalPositions'));
            }
    
        return redirect()->back()->with('fail', 'Fetch result not found');

    }
    }




    
    public function resultstrash(){
        $trash_results = Result::onlyTrashed()->where('schooltype', auth()->user()->schooltype)
        ->latest()->get();
        return view('dashboard.resultstrash', compact('trash_results'));
    }

    
     public function restoreresult($id){
        $restore_student = Result::withTrashed()->find($id);
        $restore_student->restore();
        return redirect()->back()->with('success', 'you have restored successfully');
    }

    public function deleteresultfully($ref_no){
        $force_delete_student = Result::withTrashed()->where('ref_no', $ref_no);
        $force_delete_student->forceDelete();
        return redirect()->back()->with('success', 'you have permanently deleted successfully');
    }






    public function checkresultsbyportal(Request $request){
        // dd($request->all());
        $request->validate([
            'academic_session' => ['required', 'string'],
            'section' => ['required', 'string'],
            'classname' => ['required', 'string'],
            'term' => ['required', 'string'],
            'regnumber' => ['required', 'string'],
            'alms' => ['nullable', 'string'],
        ], [
            'regnumber.exist'=>'This email does not exist in the admins table'
        ]);
        // dd($request->all());
        if($view_getresults = Result::where('term', $request->term)->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->where('alms', $request->alms)
        // ->where('location', $request->location)

        ->exists()) {
        $view_getresults = Result::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('alms', $request->alms)
        ->where('classname', $request->classname)
        // ->where('location', $request->location)

        ->get();
        // dd($view_getresults);

        $average = $view_getresults->map(function ($r) {
            return $r->test_1 + $r->test_2 + $r->exams;
        })->avg();
        // dd($request->all());

        $view_getresultsdomains = Studentdomain::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('regnumber', $request->regnumber)
        ->where('classname', $request->classname)
        ->get();
    //    dd($view_results);
        if(!$view_getresultsdomains){
            return redirect()->back()->with('fail', 'Your Results is on Process check back!');
        }

        $numberinclass = Student::where('term', $request->term)
        ->where('academic_session', $request->academic_session)
        ->where('section', $request->section)
        ->where('alms', $request->alms)
        ->where('classname', $request->classname)
        
        ->count();

          $results = Result::where('term', $request->term)
            ->where('academic_session', $request->academic_session)
            ->where('section', $request->section)
            ->where('alms', $request->alms)
            ->where('classname', $request->classname)
            ->get();

        // Add total score
        $results = $results->map(function ($r) {
            $r->total_score = $r->test_1 + $r->test_2 + $r->exams;
            return $r;
        });

        // Group by subject
        $grouped = $results->groupBy('subjectname');

        $finalPositions = [];

        foreach ($grouped as $subject => $students) {

            // Sort each subject
            $sorted = $students->sortByDesc('total_score')->values();

            $rank = 1;
            $prevScore = null;

            foreach ($sorted as $index => $res) {

                if ($prevScore !== null && $res->total_score < $prevScore) {
                    $rank = $index + 1;
                }

                $finalPositions[] = [
                    'student_id'  => $res->student_id,
                    'subject'     => $subject,
                    'total_score' => $res->total_score,
                    'position'    => $rank
                ];

                $prevScore = $res->total_score;
            }
        }

        //STUDENT POSITION BEGINS HERE
    // Fetch all results of students in that class
    $results = Result::where('term', $request->term)
    ->where('classname', $request->classname)
    ->where('academic_session', $request->academic_session)
    // ->where('location', $request->location)
    ->get()
    ->groupBy('student_id');

    $studentTotals = collect();

    foreach ($results as $student_id => $studentResults) {
        $total = $studentResults->sum(function ($r) {
            return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;
        });

        $average = $studentResults->avg(function ($r) {
            return (float)$r->test_1 + (float)$r->test_2 + (float)$r->exams;
        });

    
        $studentTotals->push([
        'student_id' => $student_id,
        'regnumber'  => $studentResults->first()->regnumber,
        'student'    => $studentResults->first()->student,
        'total'      => $total,
        'average'    => round($average, 2),
    ]);
    }
    // dd($studentTotals);


    // Sort and rank
    $sorted = $studentTotals->sortByDesc('total')->values();

    $ranked = $sorted->map(function ($item, $index) use ($sorted) {
        if ($index > 0 && $sorted[$index - 1]['total'] == $item['total']) {
            $item['position'] = $sorted[$index - 1]['position']; // same rank for tie
        } else {
            $item['position'] = $index + 1;
        }
        return $item;
    });
    // dd($ranked);

    $currentStudent = $ranked->firstWhere('regnumber', $request->regnumber);
    
        }else{
            return redirect()->back()->with('fail', 'There is no results for you!');
        }


        return response()->json([
            'alms' =>$request->alms,
            'section' =>$request->section,
            'fname' =>$request->fname,
            'middlename' =>$request->middlename,
            'surname' =>$request->surname,
            'position' =>$finalPositions,
            'average' =>$average,
            'ranked' =>$ranked,
            'numberinclass' =>$numberinclass,
            'Psycomotor' =>$view_getresultsdomains,
            'Results' => $view_getresults,
        ], 200);
        // if ($request->section == 'Secondary') {
        //      return view('pages.resultspdf', compact('currentStudent',
        //     'ranked', 'finalPositions', 'average', 'numberinclass', 'view_getresultsdomains', 'view_getresults'));

        // }elseif($request->section == 'Primary' || $request->section == 'Reception' || $request->section == 'Nursery'){
        //     return view('pages.resultspdf', compact('currentStudent',
        //     'ranked', 'finalPositions', 'average', 'numberinclass', 'view_getresultsdomains', 'view_getresults'));
        // }
        // return redirect()->back()->with('fail', 'Fetch result not found');

    }

        
}

    


