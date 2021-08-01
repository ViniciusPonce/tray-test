<?php

namespace App\Repositories;

use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SaleRepository
{
    public static function salesPerSeller($id){
        return DB::table('sales')
            ->join('sellers', 'sellers.id', 'sales.seller_id')
            ->where('seller_id', $id)
            ->get();
    }
    public static function convertSaleValue($sale_value){
        $value = floatval($sale_value);

        return $value;
    }

    public static function calculateComission($sale_value, $comission){
        $value = floatval($sale_value);
        return $calc = ($value * ($comission / 100));
    }

    public static function findSeller($seller_id){
        return DB::table('sellers')
            ->where('id', $seller_id)
            ->first();
    }

}

