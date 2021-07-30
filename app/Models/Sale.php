<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    const CREATED_AT = 'created_at';

    public $fillable = [
        'seller_id',
        'comission',
        'sale_value'
    ];

    protected $casts = [
        'id' => 'integer',
        'seller_id' => 'integer',
        'comission' => 'float',
        'sale_value' => 'float'
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
