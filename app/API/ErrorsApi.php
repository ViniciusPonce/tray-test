<?php


    namespace App\API;


    class ErrorsApi
    {
        public static function erroMsg($msg, $code){
            return [
                    'success' => false,
                    'msg' => $msg,
                    'code' => $code
            ];
        }
    }
