<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLocation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function location()
    {
        return $this->belongsTo(Book::class);
    }
}
