<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class SaleRepository
{
    public static function salesPerSeller($id){
        return DB::table('sales')
            ->join('sellers', 'sellers.id', 'sales.seller_id')
            ->where('seller_id', $id)
            ->get();
    }
}
