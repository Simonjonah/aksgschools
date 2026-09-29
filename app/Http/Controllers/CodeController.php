<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
class CodeController extends Controller
{
    //
    public function addcode() {
        
        return view('dashboard.admin.addcode');
    }
    public function createcde(Request $request){
       $request->validate([
            'codenumber' => 'required|max:225',

        ]);
    $add_code = new Code();
    $add_code->code = substr(rand(0,time()),0, 9);
    $add_code->codenumber = $request->codenumber;

    $add_code->save();


    return redirect()->back()->with('success', 'you have added successfully');
        
    }
    public function viewcode(){
        $view_codes = Code::all();
        return view('dashboard.admin.viewcode', compact('view_codes'));
    }

    public function deletecode($id){
        $view_codes = Code::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have deleted successfully');

    }

    



}
