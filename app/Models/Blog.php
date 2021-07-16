<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $casts = ['category' => 'array'];
    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function tags() {
        return $this->belongsToMany(Tag::class, 'blog_tags');
    }
}
