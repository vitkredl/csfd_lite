<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'rating',
        'image',
        'bio',
    ];

    public function movies()
{
    return $this->hasMany(Movie::class, 'actor', 'name');
}
}
