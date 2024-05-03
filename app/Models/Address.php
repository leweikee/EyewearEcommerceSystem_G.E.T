<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    protected $table = 'address';

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    protected $primaryKey = 'addressID';

    protected $fillable = [
        'userID', 'recipientName', 'recipientPhoneNum', 
        'address', 'postcode', 'city', 'state', 'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($address) {
            if ($address->is_default) {
                $address->user->address()->where('addressID', '!=', $address->id)->update(['is_default' => false]);
            }
        });
    }


}
