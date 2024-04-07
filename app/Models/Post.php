<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'body', 'is_active', 'thumb', 'slug']; //chaves listadas no fillable poderão usar o mass assignment way
}
