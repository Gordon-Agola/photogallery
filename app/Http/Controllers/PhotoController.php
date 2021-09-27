<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    

    // show create form
    public function create(){
        die("Photo/Create");
    }

    // Store Photo
    public function store(Request $request){

    } 

    //show Photo Details
    public function details($id){
        die($id);

    }
}
