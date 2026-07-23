<?php

namespace App\Http\Controllers;
use App\Models\jobtype;
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
        $data=new jobtype;
        $data->name=$req->name;
        $data->desc=$req->desc;
        $result=$data->save();
        if($result)
        {
            return ["Result"=>"Data has been saved"];
        }
        else
        {
            return ["Result"=>"Operation Failed"];
        }
    }
}
