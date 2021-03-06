<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function blogs() {
        return $this->belongsTo(Blog::class, 'id', 'category_id');
    }
    public function home_blogs() {
        return $this->hasMany(Blog::class, 'category_id', 'id')->where('video','=',null)->limit(4);
    }
}
