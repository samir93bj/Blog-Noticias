<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    /////////////////// - INDEX DE TAGS - ///////////////////////////////////
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }


      /////////////////// - CREAR TAGS  - ///////////////////////////////////
    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'blue' => 'Color azul',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'pink' => 'color rosado',
            'indigo' => 'color indigo'
        ];

        return view('admin.tags.create',compact('colors'));
    }


    /////////////////// - GUARDAR TAGS  - ///////////////////////////////////
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.edit',$tag)->with('info','El Tag se creo con exito');
  
    }


    /////////////////// - MOSTRAR TAGS  - ///////////////////////////////////
    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }


    /////////////////// - EDITA TAGS  - ///////////////////////////////////
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color rojo',
            'blue' => 'Color azul',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'pink' => 'color rosado',
            'indigo' => 'color indigo'
        ];

        return view('admin.tags.edit',compact('tag','colors'));
    }


    /////////////////// - UPDATE TAGS  - ///////////////////////////////////
    public function update(Request $request, Tag $tag)
    {
        $request->validate([ 
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info','El Tag se actualizo con exito');
    }


    /////////////////// - BORRAR TAGS  - ///////////////////////////////////
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('eliminar','ok');
    }
}
