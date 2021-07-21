<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['start_date','end_date'];
    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
