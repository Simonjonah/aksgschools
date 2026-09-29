<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
class TeamController extends Controller
{

    public function addteam(){

        return view('dashboard.admin.addteam');
    }

    public function createam(Request $request){
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'facebook' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'messages' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        $add_team = new Team;
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $add_team['images'] = $path;
        $add_team->fname = $request->fname;
        $add_team->lname = $request->lname;
        $add_team->designation = $request->designation;
        $add_team->facebook = $request->facebook;
        $add_team->twitter = $request->twitter;
        $add_team->linkedin = $request->linkedin;
        $add_team->messages = $request->messages;
        $add_team->ref_no = substr(rand(0,time()),0, 9);


        $add_team->save();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function viewteam(){
        $view_teams = Team::all();
        return view('dashboard.admin.viewteam', compact('view_teams'));
    }

    public function viewsingteam($ref_no){
        $viewsingle_teams = Team::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.viewsingteam', compact('viewsingle_teams'));
    }
    public function editteam($ref_no){
        $edit_teams = Team::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.editteam', compact('edit_teams'));
    }
    public function updateteam(Request $request, $id){
        $edit_teams = Team::find($id);

        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string'],
            'facebook' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'messages' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
      
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);

        }
        $edit_teams['images'] = $path;
        $edit_teams->fname = $request->fname;
        $edit_teams->lname = $request->lname;
        $edit_teams->designation = $request->designation;
        $edit_teams->facebook = $request->facebook;
        $edit_teams->twitter = $request->twitter;
        $edit_teams->linkedin = $request->linkedin;
        $edit_teams->messages = $request->messages;
       
        $edit_teams->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function teamapproved($ref_no){
        $approve_team = Team::where('ref_no', $ref_no)->first();
        $approve_team->status = 'approved';
        $approve_team->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function teamsuspend($ref_no){
        $approve_team = Team::where('ref_no', $ref_no)->first();
        $approve_team->status = 'suspend';
        $approve_team->save();
        return redirect()->back()->with('success', 'you have suspended successfully');
    }
    public function teamsacked($ref_no){
        $approve_team = Team::where('ref_no', $ref_no)->first();
        $approve_team->status = 'sacked';
        $approve_team->save();
        return redirect()->back()->with('success', 'you have sacked successfully');
    }

    public function staffdelete($ref_no){
        $approve_team = Team::where('ref_no', $ref_no)->delete();
        
        return redirect()->back()->with('success', 'you have deleted successfully');
    }
    public function viewsinglemember($ref_no){
        $single_teams = Team::where('ref_no', $ref_no)->first();
        $all_teams = Team::where('status', 'approved')->get();
        
        return view('pages.viewsinglemember', compact('single_teams','all_teams'));
    }
     

    
    
}
