<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = [
        'description',
        'price',
        'stock',
        'image_path',
    ];

    public function orderedItem()
    {
        return $this->hasMany('App\OrderedItem', 'product_id', 'id');
    }

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
