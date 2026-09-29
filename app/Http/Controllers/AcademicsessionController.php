<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academicsession;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AcademicsessionCollection;
use Cviebrock\EloquentSluggable\Services\SlugService;
class AcademicsessionController extends Controller
{
    //
    public function addsession(){

        return view('dashboard.admin.addsession');
    }

    public function createsession(Request $request){
        $request->validate([
            'academic_session' => ['required', 'string', 'max:255'],
            
        ]);
        $addclasses = new Academicsession();
        $addclasses->academic_session = $request->academic_session;
        $addclasses->academic_session = SlugService::createSlug(Academicsession::class, 'slug', $request->academic_session);
        $addclasses->save();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function viewsession(){
        $view_sessions = Academicsession::orderBy('created_at', 'DESC')->get();
        return view('dashboard.admin.viewsession', compact('view_sessions'));
    }

    public function academedit($id){
        $edit_sessions = Academicsession::find($id);
        return view('dashboard.admin.academedit', compact('edit_sessions'));
    }
    
    public function updatesession (Request $request, $id){
        $edit_clesses = Academicsession::find($id);
        $request->validate([
            'academic_session' => ['required', 'string', 'max:255'],
            
        ]);

        $edit_clesses->academic_session = SlugService::createSlug(Academicsession::class, 'slug', $request->academic_session);

        $edit_clesses->update();

        return redirect()->back()->with('success', 'you have added successfully');
    }

    public function academedelete($id){
        $edit_clesses = Academicsession::where('id', $id)->delete();
        return redirect()->back()->with('success', 'you have deleted successfully');
    }

     public function viewmainsessions(){
        $view_sessions = Academicsession::latest()->get();
        return new AcademicsessionCollection($view_sessions);
    }

}
