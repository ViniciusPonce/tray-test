<?php


    namespace App\API;


    class ErrorsApi
    {
        public static function erroMsg($msg, $code){
            return [
                'data' => [
                    'msg' => $msg,
                    'code' => $code
                ]
            ];
        }
    }
