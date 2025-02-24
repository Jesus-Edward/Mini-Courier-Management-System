<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parcel_image',
        'tracking_number',
        'size',
        'qty',
        'price',
        'receiver_name',
        'receiver_location',
        'user_id',
        'status',
        'estimated_delivery_date',
        'courier_id'
    ];

    public function generateTrackingNumber()
    {
        $prefix = 'NG';
        $name = substr(strtoupper($this->name), 0, 4);
        $uniqueId = Str::upper(Str::random(3));
        $suffix = date('ymd');

        return $prefix . $name . $uniqueId . $suffix;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
