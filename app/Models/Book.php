<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $casts = [
        'genres' => 'array',
        'authors' => 'array',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres');
    }

    public function location()
    {
        return $this->hasOne(BookLocation::class);
    }
}
