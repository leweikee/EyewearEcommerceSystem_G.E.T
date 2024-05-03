<?php

// app/Models/Cart.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['powers', 'subtotal'];

    public $timestamps = true; // Add this line

    protected $orderBy = ['updated_at' => 'desc']; // Add this line

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemID');
    }
}

?>




