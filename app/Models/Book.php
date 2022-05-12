<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    protected $dates = ['deleted_at'];
    use HasFactory,SoftDeletes;
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
