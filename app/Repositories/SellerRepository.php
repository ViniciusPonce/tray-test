<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class SellerRepository
{
    public static function findSeller($seller_id){
        return DB::table('sellers')
            ->where('id', $seller_id)
            ->first();
    }
}
