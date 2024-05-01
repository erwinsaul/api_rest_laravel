<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function get(){
        try {
            $data = Person::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $data['name'] = $request['name'];
            $data['address'] = $request['address'];
            $data['phone'] = $request['phone'];
            $data['city'] = $request['city'];
            $res = Person::create($data);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}

