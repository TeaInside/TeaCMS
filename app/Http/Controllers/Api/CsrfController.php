<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CsrfController extends Controller
{
    public function getCsrf(): JsonResponse
    {
        $csrf_token= base64_encode(openssl_random_pseudo_bytes(32));
        $_SESSION['csrf_token']=$csrf_token;
        return $csrf_token;
    }

    protected function unsetToken()
    {
        unset($_SESSION['csrf_token']);
    }

    public function validation()
    {		
        $csrfvalue = isset($_SESSION['csrf_token']) ? mysql_real_escape_string($_SESSION['csrf_token']) : '';		

        if(isset($_POST['csrf_name']))
        {				
            $value_input=$_POST['csrf_name'];
            if($value_input==$csrfvalue)
            {
                $this->unsetToken();
                return true;					
            }else{
                $this->unsetToken();
                return false;
            }
        }else{
            $this->unsetToken();
            return false;
        }
    }
}