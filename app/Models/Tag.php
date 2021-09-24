<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'slug',
        'color'
     ];

     public function getRouteKeyName(){
        return "slug";
    }  

     //relacion de muchos a muchos reversa
     public function posts(){
        return $this->BelongsToMany(Post::class);
    }
}
