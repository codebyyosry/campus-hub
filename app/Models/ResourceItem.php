<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_available',
    ];

    public function bookings()
    {
        return $this->hasMany(ResourceBooking::class);
    }
}