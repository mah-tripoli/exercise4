<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publish_year',
        'genre_id',
        'available_quantity',
        'description',
    ];

    protected $appends = ['coverUrl'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function getCoverUrlAttribute()
    {
        $noCover = 'https://dummyimage.com/150x125/cccccc/ffffff.png&text=Book+Cover';

        return $this->file ? asset('storage/' . $this->file) : $noCover;
    }
}
