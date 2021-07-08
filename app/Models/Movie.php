<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Movie extends Model
{
    use HasFactory;

    protected $fillable  = [
        'title','category_id','description','artist','image'
    ];

    
    public function category() {
        return $this->belongTo(Category::class);
    }
}
