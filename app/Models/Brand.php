<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model {
    public $timestamps = false;
    protected $table = 'brand';
    protected $fillable = ['brandName'];
    protected $primaryKey = 'brandID';

    public function items() {
        return $this->hasMany(Item::class, 'brandID');
    }
}
