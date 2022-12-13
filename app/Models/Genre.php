<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genres');
    }
}
