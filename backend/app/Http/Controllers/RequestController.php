<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function list(){
        return \App\Models\Request::all();
    }

    public function create(Request $request){
        $r = new \App\Models\Request();
        $r->save([
            'title' => $request->input('title'),
            'text' => $request->input('text')
        ]);
        $r->addImages($request->file('image'));

        dump($request);
        return response(['ok'], 200);
    }
    public function get(){

    }
    public function update(){

    }
    public function delete(){

    }
}
