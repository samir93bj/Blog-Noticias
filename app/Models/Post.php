<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

     //relacion uno a mucho inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

     //relacion uno a uno a muchos inversa
     public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion de muchos a muchos
    public function tags(){
        return $this->BelongsToMany(Tag::class);
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

}  
  