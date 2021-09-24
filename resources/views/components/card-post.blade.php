@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">

    @if ($post->image)
        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    @else
         <img class="w-full h-72 object-cover object-center" src=" https://cdn.pixabay.com/photo/2018/03/27/18/23/programmer-3266860_1280.jpg" alt="">
    @endif



    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>
    </div>
    <div class="text-gray-700 text-base px-4">
        <p>{!!$post->extract!!}</p>
    </div>

    <div class="px-6 py-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{route('posts.tag',$tag)}}" class="inline-block bg-gray-600 rounded-full px-3 py-1 text-sm">{{$tag->name}}</a>
        @endforeach
    </div>

</article> 