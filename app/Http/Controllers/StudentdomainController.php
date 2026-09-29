<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Studentdomain;
use App\Models\Domain;
class StudentdomainController extends Controller
{
    

    

public function createpsychomotorom(Request $request){
        // dd($request->all());
        foreach ($request->motors as $motor) {
        $result = Studentdomain::where([
            'term'          => $motor['term'],
            'psycomoto'       => $motor['psycomoto'],
            'classname'     => $motor['classname'],
            'section'       => $motor['section'],
            'regnumber'     => $motor['regnumber'],
            'academic_session'  => $motor['academic_session'],
            'school_id'      => $motor['school_id'],
            
        ])->exists();

        if ($result) {
            return redirect()->back()->with('fail', 'You have already submitted psychomotor for this person');
        }
    }

        // dd($request->all());


    
        $request->validate([
        'motors.*.cogname' => 'nullable|string',
        'motors.*.psycomoto' => 'nullable|string',
        'motors.*.user_id' => 'nullable|string',
        'motors.*.student_id' => 'nullable|string',
        'motors.*.teacher_id' => 'nullable|string',
        'motors.*.punt1' => 'nullable|string',

        'motors.*.classname' => 'nullable|string',
        'motors.*.regnumber' => 'nullable|string',
        'motors.*.section' => 'nullable|string',
        'motors.*.subsection' => 'nullable|string',
        'motors.*.term' => 'nullable|string',

        'motors.*.punt5' => 'nullable|string',
        'motors.*.academic_session' => 'nullable|string',
        'motors.*.school_id' => 'nullable|string',
       
        'motors.*.alms' => 'nullable|string',
        'motors.*.punt5' => 'nullable|string',
        'teacher_comment' => 'nullable|string',
    ]);
        foreach ($request->motors as $motor) {
        Studentdomain::create([
            'school_id' => $motor['school_id'] ?? null,
            'psycomoto' => $motor['psycomoto'] ?? null,
            'cogname' => $motor['cogname'] ?? null,
            
            'term' => $motor['term'] ?? null,
            'alms' => $motor['alms'] ?? null,
            'classname' => $motor['classname'] ?? null,
            'section' => $motor['section'] ?? null,
            'subsection' => $motor['subsection'] ?? null,
            'regnumber' => $motor['regnumber'] ?? null,
            'user_id' => $motor['user_id'] ?? null,
            'student_id' => $motor['student_id'] ?? null,
            'teacher_id' => $motor['teacher_id'] ?? null,
            'school_id' => $motor['school_id'] ?? null,
            'punt1' => $motor['punt1'] ?? null,
            'punt5' => $motor['punt5'] ?? null,
            'academic_session' => $motor['academic_session'] ?? null,
            'regnumber' => $motor['regnumber'] ?? null,
            
            'ref_no' => substr(rand(0,time()),0, 9),
            'connect' => substr(rand(0,time()),0, 9),
           'teacher_comment' => $request->teacher_comment,
           'nextterm' => $request->nextterm,
            'conduct' => $request->conduct,
            'nextermschoolfees' => $request->nextermschoolfees,
            'attendant' => $request->attendant,
            'outoff' => $request->outoff,
        ]);
    }
       
    return redirect()->back()->with('success', 'motor added successfully.');

    }


    public function editcommentteacher($ref_no)
    {
        $edit_psychomotor = Studentdomain::where('ref_no', $ref_no)->first();
        $view_domains = Studentdomain::where('school_id', Auth::guard('web')->user()->school_id)->get();
        $view_pscos = Studentdomain::where('psycomoto', 'Psychomotor Domain')
        ->where('school_id', Auth::guard('web')->user()->school_id)
        ->get();
        return view('dashboard.teacher.editcommentteacher', compact('edit_psychomotor', 'view_domains', 'view_pscos'));
    }


    

    
    public function updatepsychomotorom(Request $request, $ref_no){
    $request->validate([
        'motors' => 'required|array',
        'motors.*.cogname' => 'required|string',
        'motors.*.psycomoto' => 'nullable|string',
        'motors.*.punt1' => 'nullable|string|in:A,B,C,D,E',
        'motors.*.punt5' => 'nullable|string|in:A,B,C,D,E',

        'teacher_comment' => 'nullable|string',
        'nextterm' => 'nullable|string',
        'conduct' => 'nullable|string',
        'nextermschoolfees' => 'nullable|string',
        'attendant' => 'nullable|string',
        'outoff' => 'nullable|string',
    ]);

    foreach ($request->motors as $motor) {

        $data = [
            'psycomoto' => $motor['psycomoto'] ?? null,
            'teacher_comment' => $request->teacher_comment,
            'nextterm' => $request->nextterm,
            'conduct' => $request->conduct,
            'nextermschoolfees' => $request->nextermschoolfees,
            'attendant' => $request->attendant,
            'outoff' => $request->outoff,
        ];

        // Update punt1 only when submitted
        if (isset($motor['punt1'])) {
            $data['punt1'] = $motor['punt1'];
        }

        // Update punt5 only when submitted
        if (isset($motor['punt5'])) {
            $data['punt5'] = $motor['punt5'];
        }

        Studentdomain::where('ref_no', $ref_no)
            ->where('cogname', $motor['cogname'])
            ->update($data);
    }

    return redirect()->back()->with(
        'success',
        'Psychomotor records updated successfully.'
    );
}

     
}
