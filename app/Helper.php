<?php 


namespace App\Helper;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illiminate\Support\Arr;



class Helper{

    public static function nullToString($data) {
        array_walk_recursive($data, function ($i, $j) use (&$data) {
            if (is_null($i) && !is_array($i)) {
                $data[$j] = '';
            }
        });
        return $data;
    }

    public static function CurlCall($url,$method,$payload){

            if(!empty($payload) && isset($payload['q'])){
                unset($payload['q']);
            }
            
            $payload = Helper::nullToString($payload);
            $string = "{}";
            if(!empty($payload)){
                $string = json_encode($payload);
            }
          
            $ch = curl_init($url);
             curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch,CURLOPT_HTTPHEADER,[
                'Content-Type:application/json',
                'X-access-token:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiMzZmZDdjMDExYjAxNmUyZGYzZGVhZWVkMDE4MmJiYmJjMzA2OWYzZDIyODA5MmI4N2FiNGViMzc5ODhiMTI1NTBmMjdhMjYxYjIyY2IzNTciLCJpYXQiOiIxNjExNjQyNTcxLjk4NTUyNCIsIm5iZiI6IjE2MTE2NDI1NzEuOTg1NTI4IiwiZXhwIjoiMTY0MzE3ODU3MS45ODM3NDQiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.GFmV8iSY40dE5O4rs-aygl_tlFnodFiQF31kfkgXw7dmlx98CcPOKVjwPRqQKMWGlupjPhIjJGIPZdyWijnfim3UDsvqnmtpB70W-oL-55huwd1rAMIMw1IHFq-JyMhW-QnQH6ZLv8T5pcxX2WkcugmnJ6KV-SGrsQ3sogaKo9XGsGcrk35U_0vuidJC4Xs6rkb5LxMbuDLMCqc_r6VsNXZrF95T-xK6D6Z5staMRR87sLteO3mcgGy2Cv0b0ERlht48kndhq924sY-tqQ1s8iRdkTD16UKbOdA-n7sOmoqH0sVHPpkHHTzOhDhOKHRydjlvkfauxg5tnYJRspnllOZQYp1-2F4_0ASxibq-HB1yc-M_d4PlLeitrGX89CW9DO0jj6SZpXKwX3m8XLzGK5klTJZ00IA6hJgzjI4x3REd48koD3sca1FOPnq5R0XC36CG_8eg7PihdO3DTCf3a-cTExNAdw6I6AG4-12OcP4i3jZHXsvB0sLEzfs5WjqZRrUk_x6CBmC6T3Op4xWgB5JhxilYL4U0h-XIhVA7YF5HLj4z1Jze7CEQTZXfe9zyvJxrIZIDJx3JzoMuVyg1wI3StU_HPdYn7eqyf31uFTJrYTG78DgTfS-7QDHZEq5yiYpwQDZwGzfdk2092mXL26l93gSdWBIi9jcrhb8fTjI'
            ] );
            $result =curl_exec($ch);
                
            
      
          //  $response = ['status' => 'success', 'data' => json_decode($result, true)];
             
           
    
            curl_close($ch);
            return $result;

    }

}






?>