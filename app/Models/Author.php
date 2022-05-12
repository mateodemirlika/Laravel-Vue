<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['first_name','last_name','email','phone'];
    protected $dates = ['deleted_at'];
    public function books()
    {
        return $this->hasMany(Book::class)->withTrashed();
    }
}
