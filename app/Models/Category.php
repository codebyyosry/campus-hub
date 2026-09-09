<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description'])]
class Category extends Model
{
    /**
     * Real Need: A category has many support requests (e.g., "IT Hardware Support" 
     * can be tied to hundreds of different user requests). This method defines that 
     * one-to-many relationship.
     */
    public function supportRequests(): HasMany
    {
        return $this->hasMany(SupportRequest::class);
    }
}