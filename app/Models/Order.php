<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'orders';
    protected $primaryKey = 'orderID';

    protected $fillable = [
        'userID',
        'order_date',
        'shipping_fee',
        'total_price',
        'status',
        'trackingID',
        'shipped_date',
        'addressID',
        'recipientName',
        'recipientAddress',
        'recipientPhoneNum'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }

    // public function orderItems(): HasMany
    // {
    //     return $this->hasMany(OrderedItem::class, 'OrderID', 'orderID');
    // }
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderedItem::class, 'OrderID', 'orderID');
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(Address::class, 'addressID', 'addressID');
    }
    

}
