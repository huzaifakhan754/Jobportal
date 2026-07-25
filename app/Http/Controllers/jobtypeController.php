<?php

namespace App\Http\Controllers;
use App\Models\jobtype;
use Exception;
use Illuminate\Http\Request;

class jobtypeController extends Controller
{
    function jobtype()
    {
        $data=jobtype::all();
        return $data;
    }

    function create(Request $req)
    {
       try {
        $data = jobtype::create($req->all());
        return response()->json([
            "Status"=>true,
            "Massege"=>"Data is inserted",
            "Data"=>$data
         ]);
       } catch (Exception $e) {
         return response()->json([
            "Status"=>false,
            "Massege"=>"Data is not inserted",
            "Erroe"=>$e->getMessage()
         ]);
       }
    }
}
