<?php

namespace App\Http\Controllers;
use App\Helper\Helper;

use Illuminate\Http\Request;
 
class Usercontroller extends Controller
{
    

    public function login() {
 
        return view("login");
 
    }


    public function loginprocess(Request $request){
     
      
        $username = "";
        $username = "";
        if(!empty(trim($request->post('username')))){
            $username = $request->post('username');
        }
       
        if(!empty(trim($request->post('password')))){
            $password = $request->post('password');
        }
         
        
         
        
        $payload['email'] = $username;
        $payload['password'] = $password;

       
        $APIURL = env('REMOTE_API_URL').'/login';
        $response = Helper::CurlCall($APIURL,'POST',$payload);
        return response()->json($response);

    }
    


}
