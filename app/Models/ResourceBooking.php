<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resource_item_id',
        'start_time',
        'end_time',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resourceItem()
    {
        return $this->belongsTo(ResourceItem::class);
    }
}