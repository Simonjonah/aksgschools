<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Classactivity;
use App\Models\Classname;
use App\Models\Domain;
use App\Models\Result;
use App\Models\Guardian;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Student;
// use App\Models\Query;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Transaction;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    

    public function home(){
        $countstudent = Student::count();
        $countsubjects = Subject::count();
        $countsubjecthigh = Subject::where('section', 'Secondary')->count();
        $countsubjectprim = Subject::where('section', 'Primary')->count();
        $countteacher = Teacher::count();
        $countsunapprveteacher = Teacher::where('section', 'Primary')
       ->where('status', null)->count();

        $countschool = User::count();
        $countstudenttsuspend = Student::where('status', 'suspend')->count();
        $countstudentapprove = Student::where('status', 'suspend')->count();
        $countstudentreject = Student::where('status', 'reject')->count();
        $countschoolunpproved = User::where('status', null)->count();
        $countschoolapproved = User::where('status', 'approved')->count();
        $countschoolsuspend = User::where('status', 'suspend')->count();
        $countschoolrejected = User::where('status', 'reject')->count();
      

        $countteacherunpproved = Teacher::where('status', null)->count();
        $countteacherapproved = Teacher::where('status', 'approved')->count();
        $countteachersuspend = Teacher::where('status', 'suspend')->count();
        $countteacherrejected = Teacher::where('status', 'reject')->count();
      
        $countsclasses = Classname::count();
        $countcount = Domain::count();
        $countsnotification = Notification::count();
        
        $view_lecturers = Teacher::orderby('created_at', 'DESC')->where('status', null)->take(4)->get();
        $view_students = Student::orderby('created_at', 'DESC')->where('status', null)->take(5)->get();
        $view_schools = User::orderby('created_at', 'DESC')->where('status', null)->take(5)->get();
        $view_blogs = Blog::orderby('created_at', 'DESC')->take(5)->get();
        // $view_payments = Transaction::orderby('created_at', 'DESC')->take(5)->get();
        $view_results = Result::orderBy('created_at', 'DESC')->take(5)->get();
        $count_results = Result::count();
        
        return view('dashboard.admin.home', compact('view_blogs', 'countsnotification', 'view_schools', 'countcount', 'count_results', 'view_results',  'countteacherrejected', 'countteachersuspend', 'countteacherapproved', 'countteacherunpproved', 'countschoolunpproved', 'countschoolapproved', 'countschoolsuspend', 'countschoolrejected', 'countschool', 'countsunapprveteacher', 'countteacher', 'view_lecturers', 'countsclasses', 'view_students', 'countstudentreject', 'countstudentapprove', 'countstudenttsuspend', 'countsubjectprim', 'countsubjecthigh', 'countsubjects', 'countstudent'));
    }

    public function profile() {

        return view('dashboard.admin.profile');
    }

    public function settingsupdate(Request $request, $id){
        $edit_profiles = Admin::find($id);
        $edit_profiles = Admin::where('id', $id)->first();
        $request->validate([
         'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone' => ['required', 'string'],
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
        $edit_profiles->designation = $request->designation;


        $edit_profiles->update();

        return redirect()->back()->with('success', 'you have update successfully');

    }



    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    
    
}
