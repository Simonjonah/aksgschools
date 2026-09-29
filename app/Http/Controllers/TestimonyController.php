<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    //
    public function addtestimony(){
        
        return view('dashboard.admin.addtestimony');
    }

    public function createtestimony (Request $request){
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());
        $add_testimony = new Testimony();
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $add_testimony['images'] = $path;
        $add_testimony->fname = $request->fname;
        $add_testimony->surname = $request->surname;
        $add_testimony->designation = $request->designation;
        $add_testimony->message = $request->message;
        $add_testimony->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    public function viewtestimony(){
        $view_testimonies = Testimony::latest()->paginate(10);
        return view('dashboard.admin.viewtestimony', compact('view_testimonies'));
    }

    
    public function testimonyview($id){
        $view_singletestimonies = Testimony::where('id', $id)->first();
        return view('dashboard.admin.testimonyview', compact('view_singletestimonies'));
    }

    public function testimonyedit($id){
        $edit_singletestimonies = Testimony::where('id', $id)->first();
        return view('dashboard.admin.testimonyedit', compact('edit_singletestimonies'));
    }
    public function updatetestimony(Request $request, $id){
        $edit_testimonies = Testimony::where('id', $id)->first();

        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
      
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_testimonies['images'] = $path;
        $edit_testimonies->fname = $request->fname;
        $edit_testimonies->surname = $request->surname;
        $edit_testimonies->designation = $request->designation;
        $edit_testimonies->message = $request->message;
        $edit_testimonies->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function testimonyeapproved($id){
        $approve_testimony = Testimony::where('id', $id)->first();
        $approve_testimony->status = 'approved';
        $approve_testimony->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function testimonyesuspend($id){
        $approve_testimony = Testimony::where('id', $id)->first();
        $approve_testimony->status = 'suspend';
        $approve_testimony->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function testimonyedelete($id){
        $approve_testimony = Testimony::where('id', $id)->delete();
       
        return redirect()->back()->with('success', 'you have deleted successfully');
    }
    
}
