<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    const CREATED_AT = 'created_at';

    public $fillable = [
        'seller_id',
        'seller_name',
        'seller_email',
        'seller_comission',
        'sale_value'
    ];

    protected $casts = [
        'id' => 'integer',
        'seller_id' => 'integer',
        'seller_name' => 'string',
        'seller_email' => 'string',
        'seller_comission' => 'decimal',
        'sale_value' => 'float'
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
