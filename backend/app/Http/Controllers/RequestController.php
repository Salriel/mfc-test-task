<?php

namespace App\Http\Controllers;

use App\Models\RequestStatus;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function list(){
        $data = \App\Models\Request::with('text')
            ->orderBy('created_at', 'desc')
            ->with('image')
            ->with('status')
            ->get();
        return response(['data' => $data, 'status' => 'ok']);
    }

    public function create(Request $request){
        $r = new \App\Models\Request();
        $r->save([
            'title' => $request->input('title'),
            'text' => $request->input('text')
        ]);
        $r->addImages($request->file('image'));

        return response(['ok'], 200);
    }
    public function get(int $requestID){
        $request = \App\Models\Request::with('text')
            ->with('image')
            ->with('status')
            ->find($requestID);
        $statuses = RequestStatus::all();
        $data = [
            'request' => $request,
            'statuses' => $statuses
        ];
        return response(['data' => $data, 'status' => 'ok']);
    }

    public function update(int $requestID, Request $request){
        try{
            $requestModel = \App\Models\Request::find($requestID);
            $requestModel->status_id = $request->input('status');
            $requestModel->save();

        }catch (\Exception $exception){
            return response(['status' => false, 'Error' => 'Что-то пошло не так'], 422);
        }
        return response(['status' => true]);
    }
    public function delete(int $requestID){
        try{
            $requestModel = \App\Models\Request::find($requestID)->delete();

        }catch (\Exception $exception){
            return response(['status' => false, 'Error' => 'Что-то пошло не так'], 422);
        }
        return response(['status' => true]);
    }
}
