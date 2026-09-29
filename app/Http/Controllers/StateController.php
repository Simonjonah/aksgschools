<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class StateController extends Controller
{
    //

    public function addlga(){

        return view('dashboard.admin.addlga');
    }

    public function createlga(Request $request){
        $request->validate([
            'lga' =>['required', 'string', 'max:255', 'unique:states'],
        ]);
        $addlga = new State();
        $addlga->lga = $request->lga;
        $addlga->save();
        if($addlga){
            return redirect()->back()->with('success', 'You have registered successfully');
        }
        return redirect()->back()->with('error', 'You have not registered successfully');

    }

    public function updatelga(Request $request, $id){

        $editlga = State::find($id);

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
        $editlga = State::find($id);
        return view('dashboard.admin.editlga', compact('editlga'));
    }
    public function viewlga(){
        $viewlgas = State::all();
        return view('dashboard.admin.viewlga', compact('viewlgas'));
    }

    public function viewperlgaschools(){
        $viewlgaschools = State::all();
        return view('dashboard.admin.viewperlgaschools', compact('viewlgaschools'));
    }

    public function viewsinglelgasschool($lga){
         
        $viewlgas = State::where('lga', $lga)->first();
        $viewlgas = User::where('role', 'school')->where('lga', $lga)->take(1)->get();
        $viewlgasecondaries = User::where('role', 'school')->where('lga', $lga)->take(1)->get();
        return view('dashboard.admin.viewsinglelgasschool', compact('viewlgasecondaries', 'viewlgas'));
    }

    public function viewprimariesschools($lga){
         
        $viewprimaries = State::where('lga', $lga)->first();
        $viewprimaries = User::where('role', 'school')
        ->where('lga', $lga)->where('schooltype', 'Primary')->latest()->get();
        return view('dashboard.admin.viewprimariesschools', compact('viewprimaries'));
    }

    public function viewsecondariesschools($lga){
         
        $viewsecondaries = State::where('lga', $lga)->first();
        $viewsecondaries = User::where('role', 'school')
        ->where('lga', $lga)->where('schooltype', 'Secondary')->latest()->get();
        return view('dashboard.admin.viewsecondariesschools', compact('viewsecondaries'));
    }

    

    

    
    public function deletelga($id){
        $viewlgas = State::where('id', $id)->delete();
        return redirect()->back()->with('success', 'deleted successfully');
    }
    
    
}
