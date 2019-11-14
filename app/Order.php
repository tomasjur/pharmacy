<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'supplier',
        'product',
        'quantity',
        'price',
    ];
}
