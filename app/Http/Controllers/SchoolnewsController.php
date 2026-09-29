<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Schoolnew;

class SchoolnewsController extends Controller
{
    //

    public function addaverts(){

        $view_sesions = Academicsession::latest()->get();
        return view('dashboard.teacher.addaverts', compact('view_sesions'));
    }


    public function createschoolnews (Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'schoolname' => ['required', 'string'],
            'address' => ['required', 'string'],
            'logo' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'school_id' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());
        $add_schoolnews = new Schoolnew();
        if ($request->hasFile('images')){
    
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
    
        }
        $add_schoolnews['images'] = $path;
        $add_schoolnews->slug1 = SlugService::createSlug(Schoolnew::class, 'slug1', $request->title);
        $add_schoolnews->user_id = $request->user_id;
        $add_schoolnews->school_id = $request->school_id;
        $add_schoolnews->email = $request->email;
        $add_schoolnews->phone = $request->phone;
        $add_schoolnews->address = $request->address;
        $add_schoolnews->logo = $request->logo;
        $add_schoolnews->slug = $request->slug;
        $add_schoolnews->schoolname = $request->schoolname;
        $add_schoolnews->title = $request->title;
        $add_schoolnews->slug = $request->slug;
        $add_schoolnews->messages = $request->messages;
        $add_schoolnews->ref_no1 = substr(rand(0,time()),0, 9);
        $add_schoolnews->save();
    
        // $add_adimission->save();
            return redirect()->route('admin.add2ndimage13', ['ref_no1' =>$add_schoolnews->ref_no1]); 
    
        // return redirect()->route('add2ndimage', ['ref_no1' =>$add_adverts->ref_no1]); 
    }
    
    public function add2ndimage13($ref_no1){
        $edit_news = Schoolnew::where('ref_no1', $ref_no1)->first();
        return view('dashboard.teacher.add2ndimage13', compact('edit_news'));
    }
    
    
    public function updateeadverts (Request $request, $ref_no1){
        // dd($request->all());
        $edit_myblogs = Schoolnew::where('ref_no1', $ref_no1)->first();
    
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string'],
          
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());
        
        if ($request->hasFile('images')){
    
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $edit_myblogs['images'] = $path;
    
        }else{
            $path = 'noimage.jpg';
        }
        
        $edit_myblogs->title = $request->title;
        $edit_myblogs->messages = $request->messages;
        $edit_myblogs->update();
    
        return redirect()->route('admin.add2ndimage13', ['ref_no1' =>$edit_myblogs->ref_no1]); 
    
    }
    public function viewyouradverts(){
        $view_myblogs = Schoolnew::latest()->get();
        return view('dashboard.teacher.viewyouradverts', compact('view_myblogs'));
    }
    
    public function viewadverts($slug1){
        $viewsingle_myblogs = Schoolnew::where('slug1', $slug1)->first();
        return view('dashboard.teacher.viewadverts', compact('viewsingle_myblogs'));
    }
    
 


    public function editadvert($ref_no1){
        $edit_myblogs = Schoolnew::where('ref_no1', $ref_no1)->first();
        return view('dashboard.teacher.editadvert', compact('edit_myblogs'));
    }
    
  
    
    public function add3images24($ref_no1){
        $edit_news = Schoolnew::where('ref_no1', $ref_no1)->first();
        return view('dashboard.teacher.add3images24', compact('edit_news'));
    }
    
   
    
    public function add3images23($ref_no1){
        $edit_news = Schoolnew::where('ref_no1', $ref_no1)->first();
        return view('dashboard.teacher.add3images23', compact('edit_news'));
    }

    public function add4images25($ref_no1){
        $edit_news = Schoolnew::where('ref_no1', $ref_no1)->first();
        return view('dashboard.teacher.add4images25', compact('edit_news'));
    }
    
    
    
    public function update2ndeschools1(Request $request, $ref_no1){
        $addthiedimages = Schoolnew::where('ref_no1', $ref_no1)->first();
    
        $request->validate([
            'images1' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images1')){
    
            $file = $request['images1'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images1')->storeAs('resourceimages', $filename);
            $addthiedimages['images1'] = $path;

        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages->update();
    
        return redirect()->route('admin.add3images23', ['ref_no1' =>$addthiedimages->ref_no1]); 
    }
    
    
    
    public function update2ndeschools2rd(Request $request, $ref_no1){
        $addthiedimages = Schoolnew::where('ref_no1', $ref_no1)->first();
        $request->validate([
            'images2' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images2')){
    
            $file = $request['images2'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images2')->storeAs('resourceimages', $filename);
        $addthiedimages['images2'] = $path;

        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages->update();
    
        return redirect()->route('admin.add3images24', ['ref_no1' =>$addthiedimages->ref_no1]); 
    }
    
    public function update2ndeschools3rd1(Request $request, $ref_no1){
        $addthiedimages = Schoolnew::where('ref_no1', $ref_no1)->first();
        $request->validate([
            'images3' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images3')){
    
            $file = $request['images3'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images3')->storeAs('resourceimages', $filename);
            $addthiedimages['images3'] = $path;

        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages->update();
        //return redirect()->back()->with('success', 'you have added successfully');
    
        return redirect()->route('admin.add4images25', ['ref_no1' =>$addthiedimages->ref_no1]); 
    }
    
    
    
    public function update2ndeschools5th(Request $request, $ref_no1){
        $addthiedimages = Schoolnew::where('ref_no1', $ref_no1)->first();
        $request->validate([
            'images5' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images5')){
    
            $file = $request['images5'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images5')->storeAs('resourceimages', $filename);
            $addthiedimages['images5'] = $path;

        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages->update();
    
        return redirect()->route('add4images', ['ref_no1' =>$addthiedimages->ref_no1]); 
    }
    
    public function update2ndeschools5the(Request $request, $ref_no1){
        $addthiedimages = Schoolnew::where('ref_no1', $ref_no1)->first();
        $request->validate([
            'images5' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images5')){
    
            $file = $request['images5'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images5')->storeAs('resourceimages', $filename);
        $addthiedimages['images5'] = $path;

        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages->update();
        return redirect()->back()->with('success', 'you have added successfully');
    
        //return redirect()->back()->with('success', 'you have added successfully');
    
    }
    
    
    
    
    public function approveadvert($slug1){
        $approved_teacher = Schoolnew::where('slug1', $slug1)->first();
        $approved_teacher->status = 'approved';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function schoolapproveinfo($ref_no1){
        $approved_teacher = Schoolnew::where('ref_no1', $ref_no1)->first();
        $approved_teacher->status = 'approved';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    
    public function schoolrejectinfo($ref_no1){
        $approved_teacher = Schoolnew::where('ref_no1', $ref_no1)->first();
        $approved_teacher->status = 'reject';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have reject successfully');
    }
    
    
    public function approveschinfo(){
        $approved_schools = Schoolnew::where('status', 'approved')->get();
        return view('dashboard.admin.approveschinfo', compact('approved_schools'));
    }

    public function rejectschinfo(){
        $approved_schools = Schoolnew::where('status', 'reject')->get();
        return view('dashboard.admin.rejectschinfo', compact('approved_schools'));
    }

    public function schoolsuspendinfo(){
        $approved_schools = Schoolnew::where('status', 'suspend')->get();
        return view('dashboard.admin.schoolsuspendinfo', compact('approved_schools'));
    }
    public function suspendschinfo(){
        $approved_schools = Schoolnew::where('status', 'suspend')->get();
        return view('dashboard.admin.suspendschinfo', compact('approved_schools'));
    }

    public function viewschoolnews(){
        $approved_schools = Schoolnew::latest()->get();
        return view('dashboard.admin.viewschoolnews', compact('approved_schools'));
    }
    
    
    public function deletesadvert($ref_no1){
        $approved_teacher = Schoolnew::where('ref_no1', $ref_no1)->delete();
        return redirect()->back()->with('success', 'you have deleted successfully');
    }

    public function suspendadvert($slug1){
        $approved_teacher = Schoolnew::where('slug1', $slug1)->first();
        $approved_teacher->status = 'suspend';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    
    public function rejectadvert($slug1){
        $approved_teacher = Schoolnew::where('slug1', $slug1)->first();
        $approved_teacher->status = 'reject';
        $approved_teacher->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    

    public function search1(Request $request)
    {
        $query = $request->input('query');
        $results = Schoolnew::where('title', 'LIKE', '%' . $query . '%')->get();
        // $results = Schoolnew::where('schoolname', 'LIKE', '%' . $query1 . '%')->get();
    
        return view('pages.searchresultsnews', ['results' => $results]);
    }
    

    public function viewschoolinforeview(){
        $school_inforeviews = Schoolnew::latest()->get();
        return view('dashboard.admin.viewschoolinforeview', compact('school_inforeviews'));
    }
    public function viewschoolinfo($ref_no1){
        $school_info = Schoolnew::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.viewschoolinfo', compact('school_info'));
    }

    public function editschoolinfo($ref_no1){
        $edit_school = Schoolnew::where('ref_no1', $ref_no1)->first();
        return view('dashboard.admin.editschoolinfo', compact('edit_school'));
    }

    public function editschoolnews (Request $request, $ref_no1){
        $edit_myblogs = Schoolnew::where('ref_no1', $ref_no1)->first();
    
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            // 'user_id' => ['required', 'string'],
            'schoolname' => ['required', 'string'],
            'address' => ['required', 'string'],
            'logo' => ['required', 'string'],
            // 'slug' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        //dd($request->all());
        
        if ($request->hasFile('images')){
    
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
    
        }
        $edit_myblogs['images'] = $path;
        // $edit_myblogs->user_id = $request->user_id;
        $edit_myblogs->email = $request->email;
        $edit_myblogs->phone = $request->phone;
        $edit_myblogs->address = $request->address;
        $edit_myblogs->logo = $request->logo;
        $edit_myblogs->schoolname = $request->schoolname;
        $edit_myblogs->title = $request->title;
        $edit_myblogs->messages = $request->messages;
        // $edit_myblogs->ref_no1 = substr(rand(0,time()),0, 9);
        $edit_myblogs->update();
    
        return redirect()->back()->with('success', 'you have approved successfully');

    
    }
     
    
}
