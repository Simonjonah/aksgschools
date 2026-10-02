<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lga;
use App\Models\School;
use App\Models\user;
use App\Http\Resources\LgaCollection;
use App\Http\Resources\LgaResource;
use App\Http\Resources\SchoolCollection;
use App\Http\Resources\SchoolResource;
use App\Models\Classname;
use App\Models\Academicsession;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Result;

use Auth;
class LgaController extends Controller
{
    public function addlga(){

        return view('dashboard.admin.addlga');
    }

    public function createlga(Request $request){
        $request->validate([
            'lga' =>['required', 'string', 'max:255', 'unique:lgas'],
        ]);
        $addlga = new Lga();
        $addlga->lga = $request->lga;
        $addlga->ref_no = substr(rand(0,time()),0, 9);
        $addlga->save();
        if($addlga){
            return redirect()->back()->with('success', 'You have registered successfully');
        }
        return redirect()->back()->with('error', 'You have not registered successfully');

    }

    public function updatelga(Request $request, $id){

        $editlga = Lga::find($id);

        $request->validate([
            'lga' =>['required', 'string', 'max:255'],
        ]);
        $editlga->lga = $request->lga;
        $editlga->update();
        if($editlga){
            return redirect()->back()->with('success', 'You have registered successfully');
        }
        return redirect()->back()->with('error', 'You have not registered successfully');

    }

    
    public function editlga($id){
        $editlga = Lga::find($id);
        return view('dashboard.admin.editlga', compact('editlga'));
    }
    public function viewlga(){
        $viewlgas = Lga::all();
        return view('dashboard.admin.viewlga', compact('viewlgas'));
    }

    public function viewperlgaschools(){
        $viewlgaschools = Lga::all();
        return view('dashboard.admin.viewperlgaschools', compact('viewlgaschools'));
    }

    public function viewteacherbylga(){
        $viewlgaschools = Lga::all();
        return view('dashboard.viewteacherbylga', compact('viewlgaschools'));
    }

    public function allresultsbylga(){
        $viewlgaschools = Lga::all();
        return view('dashboard.allresultsbylga', compact('viewlgaschools'));
    }

    public function viewyourschoolsbylgas(){
        $viewlgaschools = Lga::all();
        return view('dashboard.viewyourschoolsbylgas', compact('viewlgaschools'));
    }
    public function firstermresults($lga){
        $viewlgas = Lga::where('lga', $lga)->first();
        $view_resultalls = Result::where('lga', $lga)
        ->where('user_id', auth::guard('web')->id())->get();
        $view_classes = Classname::all();
        return view('dashboard.firstermresults', compact('viewlgas', 'view_classes', 'view_resultalls'));
    }



     public function secondaryteachersbylgaadmin($lga){
        $lgaModel = Lga::where('lga', $lga)->first();
        $viewsecondaries = School::where('lga', $lga)
        ->where('section', 'Secondary')
        // ->where('role', 'teacher')
        ->latest()->get();
        $view_classes = Classname::all();
        return view('dashboard.admin.secondaryteachersbylgaadmin', compact('lgaModel', 'view_classes', 'viewsecondaries'));
    }

      public function primteachersbylgaadmin($lga){
        $lgaModel = Lga::where('lga', $lga)->first();
        $viewsecondaries = User::where('lga', $lga)
        ->where('section', 'Primary')
        ->where('role', 'teacher')
        ->latest()->get();
        $view_classes = Classname::all();
        return view('dashboard.admin.primteachersbylgaadmin', compact('lgaModel', 'view_classes', 'viewsecondaries'));
    }

   

    
    
    public function viewyourlgastudents(){
        $viewlgaschools = Lga::all();
        return view('dashboard.viewyourlgastudents', compact('viewlgaschools'));
    }
    public function viewlgabyteacher(){
        $view_lgas = Lga::all();
        return view('dashboard.admin.viewlgabyteacher', compact('view_lgas'));
    }
    public function viewsinglelgasteacher($lga){
        $view_lgas = Lga::where('lga', $lga)->first();
        return view('dashboard.admin.viewsinglelgasteacher', compact('view_lgas'));
    }

    

    public function viewsinglelgasschool($lga){
         
        $viewlga = Lga::where('lga', $lga)->first();
        $viewlgas = School::where('lga', $lga)->take(1)->get();
        $viewlgasecondaries = School::where('lga', $lga)->take(1)->get();
        $countprimayschools = School::where('lga', $lga)
        ->where('schooltype', 'SUBEB')->count();

        $countsecondaryschools = School::where('lga', $lga)
        ->where('schooltype', 'SSEB')->count();

         $counttechschools = School::where('lga', $lga)
        ->where('schooltype', 'TECHNICAL')->count();

        return view('dashboard.admin.viewsinglelgasschool', compact('counttechschools', 'viewlga', 'countsecondaryschools', 'countprimayschools', 'viewlgasecondaries', 'viewlgas'));
    }
    public function viewteachersinlgas1($lga, $schooltype){
        if(auth::guard('web')->user()->role == 'subadmin'){
           
        $viewlgas = Lga::where('lga', $lga)->first();
         $view_schools = School::where('lga', $lga)
         ->where('schooltype', $schooltype)->where('schooltype', auth::guard('web')->user()->schooltype)->latest()->get();
    
        $view_classes = Classname::all();

        
        $view_sessions = Academicsession::latest()->get();
        }elseif(auth::guard('web')->user()->role == 'admin'){
            $viewlgas = Lga::where('lga', $lga)->first();

            $view_schools = User::where('lga', $lga)
            ->where('assign1', 'teacher')
            ->latest()->get();
            // $view_schools = School::all();
            $view_classes = Classname::all();
            // $view_lgas = Lga::all();
            $view_sessions = Academicsession::latest()->get();
        }
        return view('dashboard.viewteachersinlgas1', compact('view_classes', 'view_schools', 'view_sessions', 'view_schools'));
    }

    public function viewschoolsinlgas($lga){
        $viewlgas = Lga::where('lga', $lga)->first();

        $view_schools = School::where('lga', $lga)
        ->where('schooltype', auth::guard('web')->user()->schooltype)->latest()->get();
        return view('dashboard.viewschoolsinlgas', compact('viewlgas', 'view_schools'));
    }

    public function viewshs($lga){
        $viewlgas = Lga::where('lga', $lga)->first();

        $view_headmasters = User::where('lga', $viewlgas->lga)
        ->where('role', 'Principal')
        ->where('schooltype', auth::guard('web')->user()->schooltype)->latest()->get();
        return view('dashboard.viewshs', compact('viewlgas', 'view_headmasters'));
    }

    
    public function viewprimariesschools($lga)
{
    $lgaModel = Lga::where('lga', $lga)->firstOrFail();

    $viewprimaries = School::where('lga', $lgaModel->lga)
        ->where('schooltype', 'SUBEB')
        ->latest()
        ->get();

    return view(
        'dashboard.admin.viewprimariesschools',
        compact('lgaModel', 'viewprimaries')
    );
}

    public function viewsecondariesschools($lga){
         
        $lgaModel = Lga::where('lga', $lga)->first();
        $viewsecondaries = School::where('lga', $lgaModel->lga)->where('schooltype', 'SSEB')->latest()->get();
        
        return view('dashboard.admin.viewsecondariesschools', compact('lgaModel', 'viewsecondaries'));
    }



    public function viewtechnicalschools($lga){
         
        $lgaModel = Lga::where('lga', $lga)->first();
        $viewsecondaries = School::where('lga', $lgaModel->lga)->where('schooltype', 'TECHNICAL')->latest()->get();
        
        return view('dashboard.admin.viewtechnicalschools', compact('lgaModel', 'viewsecondaries'));
    }

    
    public function viewprincipalsbylgadmin(){         
        $lgasprincipals = Lga::all();
        return view('dashboard.admin.viewprincipalsbylgadmin', compact('lgasprincipals'));
    }

    public function displaymbtlga(){         
        $lgasprincipals = Lga::all();
        return view('dashboard.displaymbtlga', compact('lgasprincipals'));
    }

    
    
    public function viewlgaprincipals($lga){
        $view_students = Lga::where('lga', $lga)->first();
        $view_headmasters = User::where('assign1', 'Principal')->where('lga', $lga)
        ->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.admin.viewlgaprincipals', compact('view_students', 'lgas', 'view_sessions', 'view_classes', 'view_headmasters'));
    }

    public function subebheadmaster($lga){
        $view_students = Lga::where('lga', $lga)->first();
        $view_headmasters = User::where('assign1', 'Principal')
        
        ->where('lga', $lga)
        ->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.admin.subebheadmaster', compact('view_students', 'lgas', 'view_sessions', 'view_classes', 'view_headmasters'));
    }

    
    
    

    public function viewstudentsinlgas($lga){
        $view_students = Lga::where('lga', $lga)->first();
        $view_secondarystudents = Student::where('user_id', auth::guard('web')->user()->user_id)
        ->where('lga', $lga)
        ->get();
        $view_classes = Classname::all();
        $view_sessions = Academicsession::all();
        $lgas = Lga::all();
        
        return view('dashboard.viewstudentsinlgas', compact('view_students', 'lgas', 'view_sessions', 'view_classes', 'view_secondarystudents'));
    }
    
    public function viewresultbylga(){
        $viewlgas = Lga::orderBy('lga')->get();
        return view('dashboard.admin.viewresultbylga', compact('viewlgas'));
    }

    public function viewlgaresultsbyadmins($lga){
        $view_schools = Lga::where('lga', $lga)->first();

        return view('dashboard.admin.viewlgaresultsbyadmins', compact('view_schools'));
    }


    
    


    

    public function viewlgastudentsbyadmins($lga){
        $view_lgastudents = Lga::where('lga', $lga)->first();

        return view('dashboard.admin.viewlgastudentsbyadmins', compact('view_lgastudents'));
    }

    
    public function viewprimaryschoolsresultsbyadmins($lga){
        $view_lgas = Lga::where('lga', $lga)->first();
        $view_schols = School::where('section', 'Primary')->where('schooltype', 'SUBEB')->get();
        return view('dashboard.admin.viewprimaryschoolsresultsbyadmins', compact('view_schols', 'view_lgas'));
    }



    public function viewsecondaryschoolsresultsbyadmin($lga){
        $view_lgas = Lga::where('lga', $lga)->first();
        $view_schols = School::where('section', 'Secondary')->where('schooltype', 'SSEB')->get();
        return view('dashboard.admin.viewsecondaryschoolsresultsbyadmin', compact('view_schols', 'view_lgas'));
    }

     
    
    public function lgastudents(){
        $viewlgas = Lga::orderBy('lga')->get();

        return view('dashboard.admin.lgastudents', compact('viewlgas'));
    }
    public function deletelga($id){
        $viewlgas = Lga::where('id', $id)->delete();
        return redirect()->back()->with('success', 'deleted successfully');
    }



     public function viewallga(){
        $viewLgas = Lga::orderBy('lga')->get();
        return new LgaCollection($viewLgas);
    }

    public function viewprimaryschoolsinsinglelgas($lga){
        $lgaModel = Lga::where('lga', $lga)->first();
        $viewPrimarySchoolsInSingleLgas = School::where('lga', $lga)
        ->where('section', 'Primary')
        ->latest()->get();
        

        return new SchoolCollection($viewPrimarySchoolsInSingleLgas);
    }

    public function viewsecondaryschoolsinsinglelgas($lga){
        $lgaModel = Lga::where('lga', $lga)->first();

       
        $viewSchoolsInSingleLgas = School::where('lga', $lga)
            // ->where('section', 'Secondary')
            ->latest()
            ->get();
        return new SchoolCollection($viewSchoolsInSingleLgas);

        // return response()->json([
        //     'lga' => $lgaModel,
        //     // 'primary_schools' => SchoolCollection::collection($viewPrimarySchoolsInSingleLgas),
        //     'secondary_schools' => SchoolCollection::collection($viewSchoolsInSingleLgas),
        // ]);
    }
    
    
}  
