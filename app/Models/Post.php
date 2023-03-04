<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'description', 'category_id'];
    protected $fillable = ['title', 'description'];

    // public function category() {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
