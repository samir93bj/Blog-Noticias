<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(300)->create();

        foreach($posts as $post){
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);

/*Para realacionar las tablas de muchos a muchos utilizamos el metodo attach lo que haria es tomar el de manera 
automatica el id del post en este caso y 
va a introducir el id de la otra que en este caso seria la de tags, que le ingrasemos entre los parentesis*/   

            //$post->tags()->attach();
            //$post->tags()->attach([1,2]);

            //Agragamos 2 etoquetas a cada post, con un valor random seleccionado entre la terna ingresada
            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
} 
     