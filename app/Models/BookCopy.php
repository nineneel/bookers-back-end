<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
