<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = [
        'title',
        'creation_year',
        'category',
        'image',
        'artist_id'
    ];


    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
