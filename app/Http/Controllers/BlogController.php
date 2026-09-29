<?php

namespace App\Http\Controllers;

use App\Models\Academicsession;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\ResourceBlog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use PDF;

class BlogController extends Controller
{
    //
    public function addblog(){

        return view('dashboard.admin.addblog');
    }



    public function createblog (Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string'],
            
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        //  dd($request->all());
        $add_adverts = new Blog;
        if ($request->hasFile('images')){
    
            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
    
        }
        $add_adverts['images'] = $path;
        $add_adverts->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        $add_adverts->user_id = Auth::guard('web')->user()->id;
       
        $add_adverts->title = $request->title;
        $add_adverts->messages = $request->messages;
        $add_adverts->ref_no = substr(rand(0,time()),0, 9);
        $add_adverts->save();
        return redirect()->back()->with('success', 'Blog added successfully');
    
        // $add_adimission->save();
            // return redirect()->route('admin.add2ndimage1', ['ref_no' =>$add_adverts->ref_no]); 
    
        //return redirect()->route('add2ndimage', ['ref_no' =>$add_adverts->ref_no]); 
    }
    
    

    public function viewblog(){
        $view_blogs = Blog::latest()->paginate(10);
        return view('dashboard.admin.viewblog', compact('view_blogs'));
    }

    public function blogview($ref_no){
        $viewsingle_blogs = Blog::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.blogview', compact('viewsingle_blogs'));
    }

    public function blogedit($ref_no){
        $edit_blogs = Blog::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.blogedit', compact('edit_blogs'));
    }
    public function updateblog(Request $request, $ref_no){
        $edit_blogs = Blog::where('ref_no', $ref_no)->first();

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'messages' => ['required', 'string'],
            'images' => 'nullable|mimes:jpg,png,jpeg'
        ]);
      
        if ($request->hasFile('images')){

            $file = $request['images'];
            $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('images')->storeAs('resourceimages', $filename);
            $edit_blogs['images'] = $path;
        }
        $edit_blogs->title = $request->title;
        $edit_blogs->messages = $request->messages;
        $edit_blogs->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
        $edit_blogs->update();

        return redirect()->back()->with('success', 'you have added successfully');

    }

    public function blogeapproved($ref_no){
        $approve_blog = Blog::where('ref_no', $ref_no)->first();
        $approve_blog->status = 'approved';
        $approve_blog->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function blogesuspend($ref_no){
        $approve_blog = Blog::where('ref_no', $ref_no)->first();
        $approve_blog->status = 'suspend';
        $approve_blog->save();
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function blogedelete($ref_no){
        $delete_blog = Blog::where('ref_no', $ref_no)->delete();
       
        return redirect()->back()->with('success', 'you have approved successfully');
    }

    public function singleblog($slug){
        $sigle_blogs = Blog::where('slug', $slug)->first();
        $all_blogs = Blog::latest()->where('status', 'approved')->get();

        return view('pages.singleblog', compact('sigle_blogs', 'all_blogs'));
    }
    

public function search(Request $request){
    $searchQuery = $request->input('title');

    $posts = Blog::where('title', 'like', '%' . $searchQuery . '%')
                 ->orWhere('messages', 'like', '%' . $searchQuery . '%')
                 ->get();
                 
              
    return view('pages.results', ['posts' => $posts]);
}
//SCHOOL SECTION



public function createadverts (Request $request){
    $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'messages' => ['required', 'string'],
        'email' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'user_id' => ['required', 'string'],
        'schoolname' => ['required', 'string'],
        'address' => ['required', 'string'],
        'logo' => ['required', 'string'],
        'images' => 'nullable|mimes:jpg,png,jpeg'
    ]);
    // dd($request->all());
    $add_adverts = new Blog;
    if ($request->hasFile('images')){

        $file = $request['images'];
        $filename = 'SimonJonah-' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('images')->storeAs('resourceimages', $filename);

    }
    $add_adverts['images'] = $path;
    $add_adverts->slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
    $add_adverts->user_id = $request->user_id;
    $add_adverts->email = $request->email;
    $add_adverts->phone = $request->phone;
    $add_adverts->address = $request->address;
    $add_adverts->logo = $request->logo;
    $add_adverts->schoolname = $request->schoolname;
    $add_adverts->title = $request->title;
    $add_adverts->messages = $request->messages;
    $add_adverts->ref_no = substr(rand(0,time()),0, 9);
    $add_adverts->save();

    // $add_adimission->save();
        return redirect()->route('add2ndimage', ['ref_no' =>$add_adverts->ref_no]); 

    // return redirect()->route('add2ndimage', ['ref_no' =>$add_adverts->ref_no]); 
}

public function add2ndimage1($ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
    return view('dashboard.admin.add2ndimage1', compact('edit_myblogs'));
}


// public function editadvert($ref_no){
//     $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
//     return view('dashboard.editadvert', compact('edit_myblogs'));
// }

public function add2ndimage($ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
    return view('dashboard.add2ndimage', compact('edit_myblogs'));
}

public function add3images($ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
    return view('dashboard.add3images', compact('edit_myblogs'));
}

public function add4images($ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
    return view('dashboard.add4images', compact('edit_myblogs'));
}

public function add3images1($ref_no){
    $edit_myblogs = Blog::where('ref_no', $ref_no)->first();
    return view('dashboard.admin.add3images1', compact('edit_myblogs'));
}



public function update2ndeadverts1(Request $request, $ref_no){
    $addthiedimages = Blog::where('ref_no', $ref_no)->first();

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

    return redirect()->route('add3images1', ['ref_no' =>$addthiedimages->ref_no]); 
}



public function update2ndeadverts(Request $request, $ref_no){
    $addthiedimages = Blog::where('ref_no', $ref_no)->first();
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

    return redirect()->route('add3images', ['ref_no' =>$addthiedimages->ref_no]); 
}

public function update3rddeadverts1(Request $request, $ref_no){
    $addthiedimages = Blog::where('ref_no', $ref_no)->first();
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
    return redirect()->back()->with('success', 'you have added successfully');

    //return redirect()->route('add4images', ['ref_no' =>$addthiedimages->ref_no]); 
}



public function update3rddeadverts(Request $request, $ref_no){
    $addthiedimages = Blog::where('ref_no', $ref_no)->first();
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

    return redirect()->route('add4images', ['ref_no' =>$addthiedimages->ref_no]); 
}

public function update4rddeadverts(Request $request, $ref_no){
    $addthiedimages = Blog::where('ref_no', $ref_no)->first();
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

    return redirect()->back()->with('success', 'you have added successfully');

}




// public function approveadvert($slug){
//     $approved_teacher = Blog::where('slug', $slug)->first();
//     $approved_teacher->status = 'approved';
//     $approved_teacher->save();
//     return redirect()->back()->with('success', 'you have approved successfully');
// }

// public function suspendadvert($slug){
//     $approved_teacher = Blog::where('slug', $slug)->first();
//     $approved_teacher->status = 'suspend';
//     $approved_teacher->save();
//     return redirect()->back()->with('success', 'you have approved successfully');
// }

// public function rejectadvert($slug){
//     $approved_teacher = Blog::where('slug', $slug)->first();
//     $approved_teacher->status = 'reject';
//     $approved_teacher->save();
//     return redirect()->back()->with('success', 'you have approved successfully');
// }




    public function viewsingleblogs($slug)
{
    $viewsingleBlogs = Blog::where('slug', $slug)->first();

    if (!$viewsingleBlogs) {
        return response()->json([
            'status' => false,
            'message' => 'Blog not found'
        ], 404);
    }

    return new ResourceBlog($viewsingleBlogs);
}


    public function viewblogs(){
        $viewnews = Blog::latest()->get();
        return new BlogCollection($viewnews);
    }

    
}
