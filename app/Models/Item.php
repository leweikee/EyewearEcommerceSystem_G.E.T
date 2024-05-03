<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $primaryKey = 'itemID';
    public $timestamps = false;
    protected $table = 'item'; 
    protected $fillable = ['name', 'description','colour', 'quantity', 'price','disPrice', 'category', 'brandID','image'];

    public function brand() {
        return $this->belongsTo(Brand::class, 'brandID');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'itemID');
    }
}
