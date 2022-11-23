<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status',
    ];

    public function orderedItem()
    {
        return $this->hasMany('\App\OrderedItem', 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
}
