<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'category_id',
    'title',
    'description',
    'status'
])]
class SupportRequest extends Model
{
    /**
     * Real Need: BelongsTo connects this request back to the specific user 
     * who created it. Essential for tracking ownership and security permissions.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Real Need: Links the request to its classification category 
     * (e.g., matching a ticket to Lab Booking or IT Support).
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}