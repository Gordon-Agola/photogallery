<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PhotoController extends Controller
{
    private $table = 'photos';

    // show create form
    public function create($gallery_id){
       //Render view
       return view('photo/create',compact('gallery_id'));
    }

    // Store Photo
    public function store(Request $request){
          // Get Request Input
          $gallery_id = $request->input('gallery_id');
          $title = $request->input('title');
          $description = $request->input('description');
          $location = $request->input('location');
          $image = $request->file('image');
          $owner_id = 1;
  
          //Check if Image is Uploaded
          if($image){
               $image_filename = $image->getClientOriginalName();
               $image->move(public_path('images'),$image_filename);
          }else{
              $image_filename = 'noimage.jpg';
          }

          //Insert Photo
          DB::table($this->table)->insert(
              [
                  'title'=> $title,
                  'description' => $description,
                  'location' => $location,
                  'gallery_id' => $gallery_id,
                  'image' => $image_filename,
                  'owner_id' => $owner_id
              ]
          );
  
          //Set Message
          
          $request->session()->flash('status', 'Photo Added!');
          //Redirect
          return redirect('gallery/show/'.$gallery_id);
  
  
      } 
  

    

    //show Photo Details
    public function details($id){
        //Get Photo
        $photo = DB::table($this->table)->where('id',$id)->first();

        //Render Template
        return view('photo/details',compact('photo'));

    }
}
