<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class GalleryController extends Controller
{
    //gallery list
    public function index(){
        //Get All gallery
        $galleries =  DB::table('galleries')->get();
        //Render view
        return view('gallery/index',compact('galleries'));
    }

    // show create form
    public function create(){
        return view('gallery/create');
    }

    // gallery store
    public function store(Request $request){
        // Get Request Input
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        //Check if Image is Uploaded
        if($cover_image){
             $cover_image_filename = $cover_image->getClientOriginalName();
             $cover_image->move(public_path('images'),$cover_image_filename);
        }else{
            $cover_image_filename = 'noimage.jpg';
        }
        DB::table('galleries')->insert(
            [
                'name'=> $name,
                'description' => $description,
                'cover_image' => $cover_image_filename,
                'owner_id' => $owner_id
            ]
        );

        //Set Message
        $request->session()->flash('status', 'Task was successful!');
        //Redirect
        return redirect('gallery/index');


    } 

    //show gallery photos
    public function show($id){
        
        //Get Gallery
        $gallery = DB::table('galleries')->where('id',$id)->first();

        //Get Photos
        $photos = DB::table('photos')->where('gallery_id',$id)->get();

        return view('gallery/show',compact('gallery','photos'));

    }
}
