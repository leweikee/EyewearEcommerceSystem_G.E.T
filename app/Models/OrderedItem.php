<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    use HasFactory;

    protected $table = 'ordereditem';
    protected $fillable = [
        'OrderID',
        'ItemID',
        'Quantity',
        'power'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'ItemID', 'itemID');
       
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'ItemID', 'itemID');
        //return $this->belongsTo(Cart::class, 'ItemID', 'itemID');
    }
}

