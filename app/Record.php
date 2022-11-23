<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'origin',
        'product_id',
        'quantity',
        'type',
    ];
}
