<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //gallery list
    public function index(){
        $test = 'TESTING';
        //Render view
        return view('gallery/index',compact('test'));
    }

    // show create form
    public function create(){
        return view('gallery/create');
    }

    // gallery store
    public function store(Request $request){

    } 

    //show gallery photos
    public function show($id){
        die($id);

    }
}
