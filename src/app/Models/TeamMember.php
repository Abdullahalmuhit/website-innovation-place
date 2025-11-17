<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'image',
        'bio',
        'email',
        'linkedin',
        'order'
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
