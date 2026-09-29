<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mainslider;
use App\Http\Resources\MainsliderCollection;
use App\Http\Resources\MainsliderResource;
class MainsliderController extends Controller
{
    //
    public function addmainslider(){
        return view('dashboard.admin.addmainslider');
    }

    public function createteslider (Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'facts' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        //  dd($request->all());
        $add_slider = new Mainslider;
        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('sliders', $filename);
        }
        $add_slider['images'] = $path;
       
        $add_slider->title = $request->title;
        $add_slider->facts = $request->facts;
        // $add_slider->facts = $request->facts;
        $add_slider->ref_no = substr(rand(0,time()),0, 9);
        $add_slider->save();
        return redirect()->back()->with('success', 'Blog added successfully');
    
    }

    public function viewmainslider(){
        $mainsliders = Mainslider::all();
        return view('dashboard.admin.viewmainslider', compact('mainsliders'));
    }

     public function slideredit($ref_no){
        $edit_slider = Mainslider::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.slideredit', compact('edit_slider'));
    }

    public function updateslider(Request $request, $ref_no){
        $edit_slider = Mainslider::where('ref_no', $ref_no)->first();

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'facts' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        //  dd($request->all());
       
        if ($request->hasFile('images')){
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('sliders', $filename);
            $edit_slider['images'] = $path;
        }
       
        $edit_slider->title = $request->title;
        $edit_slider->facts = $request->facts;
        $edit_slider->update();
        return redirect()->back()->with('success', 'Blog added successfully');

    }

     public function slideredelete($ref_no){
        $delete = Mainslider::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'you have added successfully');
    }
    


    public function viewmainsliders(){
        $viewSliders = Mainslider::latest()->get();
        return new MainsliderCollection($viewSliders);
    }
    
}
