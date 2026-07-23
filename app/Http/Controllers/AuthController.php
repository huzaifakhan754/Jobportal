<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function fatch()
    {
        $data=User::all();
        return $data;
    }
    function create(Request $req){
        $user=new User();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        if($user->save()){
            return ["success"=>true,"message"=>"User created successfully"];
        }else{
            return ["success"=>false,"message"=>"User not created"];
        }
        
    }
    function delete($id){
        $user=User::findOrFail($id);
        $user->delete();
        if($user){
            return ["success"=>true,"message"=>"User deleted successfully"];
        }else{
            return ["success"=>false,"message"=>"User not deleted"];
        }
    }
        
}
