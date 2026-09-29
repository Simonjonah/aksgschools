<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function addnotification(){

        return view('dashboard.admin.addnotification');
    }

    public function viewnotification(){
        $view_notifications = Notification::latest()->get();
        return view('dashboard.admin.viewnotification', compact('view_notifications'));
    }
    public function editnotification($id){
        $edit_notifications = Notification::find($id);
        return view('dashboard.admin.editnotification', compact('edit_notifications'));
    }
    public function deletenoti($id){
        $edit_notifications = Notification::where('id', $id)->delete();
        return redirect()->back()->with('success', 'You have deleted successfully');
    }
    

    public function updatenotification (Request $request, $id){
        $edit_notifications = Notification::find($id);

        $request->validate([
            'messages' => ['required', 'string'],
            
        ]);
        $edit_notifications->messages = $request->messages;
        $edit_notifications->update();
        if ($edit_notifications) {
            return redirect()->back()->with('success', 'you have updated successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }
    
    public function createnotification (Request $request){
        $request->validate([
            'messages' => ['required', 'string'],
            
        ]);
        $add_notification = new Notification();
        $add_notification->messages = $request->messages;
        $add_notification->save();
        if ($add_notification) {
            return redirect()->back()->with('success', 'you have added successfully');
            
        }else{
            return redirect()->back()->with('fail', 'you have not added successfully');
        }

    }

}
