<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //gallery list
    public function index(){
        die("GALLERY/INDEX");
    }

    // show create form
    public function create(){
        die("Gallery/Create");
    }

    // gallery store
    public function store(Request $request){

    } 

    //show gallery photos
    public function show($id){
        die($id);

    }
}
