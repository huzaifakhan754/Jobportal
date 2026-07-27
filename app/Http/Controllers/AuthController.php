<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    function insert(Request $req)
    {
        try {
            $data= User::create($req->all());    
            return response()->json([
                "status" => true,
                "Massege" => "user is resgister",
                "Data" => $data
            ]);        
        } catch (Exception $e) {
            return response()->json([
                "status"=> false,
                "Masssege"=>"User is not register",
                "Error"=> $e->getMessage()
            ]);
        }
    }

    function login(Request $req){
         try {
           $check=Auth::attempt($req->only('email','password'));
           if($check){
              return response()->json([
                "status" => true,
                "Massege" => "user is login"
            ]);   
           }else{
             return response()->json([
                "status"=> false,
                "Masssege"=>"you are not login please check your Email or password"
            ]);
           }                 
        } catch (Exception $e) {
            return response()->json([
                "status"=> false,
                "Masssege"=>"you are not login please check your internet or server",
                "Error"=> $e->getMessage()
            ]);
        }
    }
   
   
        
}
