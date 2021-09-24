<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{

  public function __construct()
  {
      $this->middleware('can:admin.posts.index')->only('index');
      $this->middleware('can:admin.posts.create')->only('create','store');
      $this->middleware('can:admin.posts.edit')->only('edit','update');
      $this->middleware('can:admin.posts.destroy')->only('destroy');
  }

 /////////////////// - INDEX DE POSTS - ///////////////////////////////////
    public function index()
    {
        return view('admin.posts.index');
    }


 /////////////////// - CREAR POSTS - ///////////////////////////////////
    public function create()
    {
      $categories = Category::pluck('name','id');
      $tags = Tag::all(); 
      return view('admin.posts.create',compact('categories','tags'));
    }


 /////////////////// -GUARDAR POSTS- ///////////////////////////////////
    public function store(PostRequest $request)
    {
      // return Storage::put('posts', $request->file('file'));

        $post = Post::create($request->all());

        if($request->file('file')){
         $url = Storage::put('posts', $request->file('file'));

         $post->image()->create([
           'url' => $url
         ]);
        }

        //utilizamosta funcion para meter los id de los tags en la tabla post_tag
        if($post->tags){
          $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.edit',$post)->with('info','El posts se creo con exito');;
    }
      
    /////////////////// - MOSTRAR POSTS - ///////////////////////////////////
      public function show(Post $post)
    {
      return view('admin.posts.show',compact('post'));
    }


 /////////////////// - EDITAR UN POST - ///////////////////////////////////
    public function edit(Post $post)
    {
      $this->authorize('author', $post);

      $categories = Category::pluck('name','id');
      $tags = Tag::all(); 
     
      return view('admin.posts.edit',compact('post','categories','tags'));
    }


/////////////////// - ACTUALIZAR UN POST - ///////////////////////////////////
    public function update(PostRequest $request, Post $post)
    {
      $this->authorize('author', $post);

        $post->update($request->all());

        if($request->file('file')){   //Consultamos si viene definida una imagen en el request
          $url = Storage::put('posts',$request->file('file')); //Actualizamos la imagen, registrandola en la ruta indicada

          if($post->image){ //consultamos si el post ya tenia una imagen agregada
            Storage::delete($post->image->url); //Borramos la imagen anterior 

            $post->image->update([ //actualizamos la direccion de imagenes 
              'url' => $url
            ]);

          }else{ //en caso de subir por primera vez una imagen al post

            $post->image()->create([
              'url'=>$url
            ]);

          }
        }

         //utilizamosta funcion para meter los id de los tags en la tabla post_tag
        if($post->tags){
          $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.edit',$post)->with('info','El post se actualizo de forma correcta');

    }


/////////////////// - ELIMINAR UN POST - ///////////////////////////////////
    public function destroy(Post $post)
    {
      $this->authorize('author', $post);

      $post->delete();
      return redirect()->route('admin.posts.index')->with('eliminar','ok');
    }
}
