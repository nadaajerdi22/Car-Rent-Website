<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'car_id',
        'amount',
        'payment_method',
        'created_at',
        'updated_at'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'rental_id');
    }
}