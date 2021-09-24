{{--NOMBRE DEL POST --}}
<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Ingrese el nombre del post']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{--SLUG DEL POST--}}
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control','placeholder' => 'Ingrese el slug del post','readonly']) !!}

    @error('slug')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{--CATEGORIA DEL POST --}}
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- TAGS DEL POST --}}
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
        @foreach ($tags as $tag)
            <label class="mr-2">
                {!! Form::checkbox('tags[]', $tag->id, null) !!}
                {{$tag->name}}
            </label>
        @endforeach

        @error('tags')
            <span class="text-danger">{{$message}}</span>
        @enderror
</div>

{{-- STATUS DEL POST --}}
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>

    <label class="mr-2">
        {!! Form::radio('status', 1, true) !!}
        Borrardor
    </label>

    <label class="mr-2">
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>

    @error('status')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- IMAGE DEL POST --}}
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2018/04/03/23/29/wordpress-3288414_1280.png" alt="">
            @endif

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en el post') !!}
            {!! Form::file('file', ['class' => 'form-control-file','accept'=>'image/*']) !!}
        </div>

        @error('file')
            <span class="text-danger">{{$message}}</span>
        @enderror

       <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus optio dignissimos nisi voluptates, labore veniam quibusdam accusamus ipsa laborum fuga alias, nam deserunt? Doloremque dicta voluptates obcaecati unde, eum quas.</p>
    </div>
</div>

{{-- EXTRACTO DEL POST --}}
<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    
    @error('extract')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>


{{-- BODY DEL POST --}}
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>  