<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function list(){
        return \App\Models\Request::all();
    }

    public function create(){

    }
    public function get(){

    }
    public function update(){

    }
    public function delete(){

    }
}
