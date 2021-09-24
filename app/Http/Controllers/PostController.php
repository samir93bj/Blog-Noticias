<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    //MOSTRAR TODOS LOS POST
    public function index(){

        if(request()->page){
            $key = 'posts'.request()->page;
        }else{
            $key = 'posts';
        }

        if (Cache::has($key)) {
            $posts = Cache::get($key);
        } else {
            // $posts = Post::where('status', 2)->get();  =>Obtener y mostrat todos los post

            //=> nos muestra ordenado de forma DES y hasta 8 registro

            $posts = Post::where('status', 2)->latest('id')->paginate(8);
            Cache::put($key, $posts,); //1-nombre 2-variable 3-limite de tiempo
             
        }

        return view('posts.index', compact('posts'));
    }

    //MOSTRAR DETALLE  DE POST
    public function show(Post $post){

        
        $this->authorize('published', $post);

        $similares = Post::where('category_id', $post->category_id)
                                    ->where('status',2)
                                    ->where('id','!=',$post->id)
                                    ->latest('id') // de atras hacia adelante
                                    ->take(4)
                                    ->get(); //solo 4 registros

        return view('posts.show',compact('post','similares'));
    }

    //OBTENER CATEGORIA
    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
                            ->where('status',2)
                            ->latest('id')
                            ->paginate(4);
        
        return view('posts.category', compact('posts','category'));         
    }

    //MOSTRAR POR TAGS
    public function tag(Tag $tag){
        //return $tag->posts()->where('status',2)->get()->latest('id');
        $posts = $tag->posts()->where('status',2)->latest('id')->paginate(4);

        return view('posts.tag', compact('posts','tag'));
    }
}
