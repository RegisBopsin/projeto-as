<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'biography',
        'birth_year',
    ];

    public function artwork()
    {
        return $this->hasMany(Artwork::class);
    }
}


