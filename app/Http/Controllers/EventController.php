<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
// use Cviebrock\EloquentSluggable\Services\SlugService;

use PDF;

class EventController extends Controller
{
    //
    public function addevent(){

        return view('dashboard.admin.addevent');
    }

    public function createteevent (Request $request){
        $request->validate([
            'title' => ['required', 'string'],
            'message' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'message' => ['required', 'string'],
            'facebook' => ['required', 'string'],
            'whatsapp' => ['required', 'string'],
            'instagram' => ['required', 'string'],
            'twitter' => ['required', 'string'],
            'linkin' => ['required', 'string'],
            
            'logo' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        // dd($request->all());

        $add_event = new Event;
        if ($request->hasFile('logo')){

            $file = $request['logo'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('resourcelogo', $filename);

        }
        $add_event['logo'] = $path;
        $add_event->slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        $add_event->title = $request->title;
        $add_event->message = $request->message;
        $add_event->email = $request->email;
        $add_event->phone = $request->phone;
        $add_event->address = $request->address;
        $add_event->facebook = $request->facebook;
        $add_event->whatsapp = $request->whatsapp;
        $add_event->instagram = $request->instagram;
        $add_event->twitter = $request->twitter;
        $add_event->linkin = $request->linkin;
        $add_event->user_id = Auth::guard('web')->user()->id;
        
        $add_event->ref_no = substr(rand(0,time()),0, 9);
        $add_event->save();

        return redirect()->route('admin.add1stimage', ['ref_no' =>$add_event->ref_no]); 

       // return redirect()->back()->with('success', 'you have added successfully');

    }

    

    public function add1stimage($ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.add1stimage', compact('edit_events'));
    }

    public function viewevents(){
        $view_events = Event::latest()->paginate(10);
        return view('dashboard.admin.viewevents', compact('view_events'));
    }
    public function eventview($ref_no){
        $view_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.eventview', compact('view_events'));
    }

    public function eventedit($ref_no){
        $edit_event = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.eventedit', compact('edit_event'));
    }

    public function add2imagesw($ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.add2imagesw', compact('edit_events'));
    }

    public function add3imagesw12($ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.add3imagesw12', compact('edit_events'));
    }
    public function add2images4543($ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.add2images4543', compact('edit_events'));
    }
    
    public function add2images4543tr($ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.add2images4543tr', compact('edit_events'));
    }
     
    
    public function updateevent(Request $request, $ref_no){
        $edit_events = Event::where('ref_no', $ref_no)->first();

        $request->validate([
            'title' => ['required', 'string'],
            'message' => ['required', 'string'],
            'logo' => 'nullable|mimes:jpg,png,jpeg'
        ]);
      
        if ($request->hasFile('logo')){

            $file = $request['logo'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs('resourcelogo', $filename);
            $edit_events['logo'] = $path;

        }
        $edit_events->title = $request->title;
        $edit_events->message = $request->message;
        $edit_events->email = $request->email;
        $edit_events->phone = $request->phone;
        $edit_events->address = $request->address;
        $edit_events->facebook = $request->facebook;
        $edit_events->whatsapp = $request->whatsapp;
        $edit_events->instagram = $request->instagram;
        $edit_events->twitter = $request->twitter;
        $edit_events->linkin = $request->linkin;
        $edit_events->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }
    

    public function eventeapproved($ref_no){
        $approve_event = Event::where('ref_no', $ref_no)->first();
        $approve_event->status = 'approved';
        $approve_event->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }
    public function eventesuspend($ref_no){
        $approve_event = Event::where('ref_no', $ref_no)->first();
        $approve_event->status = 'suspend';
        $approve_event->save();
        return redirect()->back()->with('success', 'you have suspend successfully');
    }

    public function eventedelete($ref_no){
        $approve_event = Event::where('ref_no', $ref_no)->delete();
       
        return redirect()->back()->with('success', 'you have deleted successfully');
    }
    
    public function viewsingleevent($ref_no){
        $viewsingle_events = Event::where('ref_no', $ref_no)->first();
        $all_events = Event::latest()->where('status', 'approved')->get();
       
        return view('pages.viewsingleevent', compact('viewsingle_events','all_events'));
    }


    
    
    
    public function updateaddeventsrew(Request $request, $ref_no){
        $addthiedimages = Event::where('ref_no', $ref_no)->first();
        $request->validate([
            'images5' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images5')){
    
            $file = $request['images5'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images5')->storeAs('resourceimages', $filename);
        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages['images5'] = $path;
        $addthiedimages->update();
    
        return redirect()->back()->with('success', 'you have suspend successfully');

    }


    public function updateaddeventjfhf(Request $request, $ref_no){
        $addthiedimages = Event::where('ref_no', $ref_no)->first();
        $request->validate([
            'images3' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images3')){
    
            $file = $request['images3'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images3')->storeAs('resourceimages', $filename);
        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages['images3'] = $path;
        $addthiedimages->update();
    
        return redirect()->route('add2images4543tr', ['ref_no' =>$addthiedimages->ref_no]); 
    }

    public function updateaddevent51magjk(Request $request, $ref_no){
        $addthiedimages = Event::where('ref_no', $ref_no)->first();
        $request->validate([
            'images2' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images2')){
    
            $file = $request['images2'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images2')->storeAs('resourceimages', $filename);
        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages['images2'] = $path;
        $addthiedimages->update();
    
        return redirect()->route('add2images4543', ['ref_no' =>$addthiedimages->ref_no]); 
    }



    public function updateaddevent1mag(Request $request, $ref_no){
        $addthiedimages = Event::where('ref_no', $ref_no)->first();
        $request->validate([
            'images' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images')){
    
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages['images'] = $path;
        $addthiedimages->update();
        return back()->with('success', 'you have added successfully');
        // return redirect()->route('admin.add2imagesw', ['ref_no' =>$addthiedimages->ref_no]); 
    }

    public function updateaddevent1mag454(Request $request, $ref_no){
        $addthiedimages = Event::where('ref_no', $ref_no)->first();
        $request->validate([
            'images1' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        if ($request->hasFile('images1')){
    
            $file = $request['images1'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images1')->storeAs('resourceimages', $filename);
        }else{
    
            $path = 'noimage.jpg';
        }
        $addthiedimages['images1'] = $path;
        $addthiedimages->update();
    
        return redirect()->route('add3imagesw12', ['ref_no' =>$addthiedimages->ref_no]); 
    }
    
}
