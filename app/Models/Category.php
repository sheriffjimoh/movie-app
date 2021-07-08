<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
class Category extends Model
{
    use HasFactory;


    protected $fillable = [ 'name' ];

    public function  movies()
    {
        return $this->hasOne(Movie::class,'category_id','id');
    }

}
