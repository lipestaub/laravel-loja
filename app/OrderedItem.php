<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    protected $table = 'ordered_items';
    /**
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo('\App\Product', 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('\App\Order', 'order_id', 'id');
    }

    public function getQuantityAttribute($value)
    {
        $arrayValue = explode('.', $value);

        if ((int) $arrayValue[1] == 0) {
            return (int) $value;
        }
        else {
            return $value;
        }
    }

}