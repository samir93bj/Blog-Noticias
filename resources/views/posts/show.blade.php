<x-app-layout>  
    <div class="container py-8 ">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {!!$post->extract!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3">

            {{--Contenido principal--}}
            <div class="lg:col-span-2 ">
                <figure class="px-5">
                    @if ($post->image)
                        <img class"w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                        <img class"w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2018/03/27/18/23/programmer-3266860_1280.jpg" alt="">
                    @endif
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>
            </div>

            {{--Contenido relacionado--}}
            <aside class="mt-20 lg:mt-0">

                <h1 class="text-2x1 font-bold text-gray-600 mb-4">MAS LEIDAS EN: {{$post->category->name}}</h1>
                <ul>
                     @foreach ($similares as $similar)
                         <li class="mb-4">
                             <a class="flex" href="{{route('posts.show', $similar)}}">
                                <img class="w-11rem h-20 object-cover object-center" 
                                 @if($similar->image)
                                    src="{{ Storage::url($similar->image->url) }}"
                                 @else()
                                   src="https://cdn.pixabay.com/photo/2018/03/27/18/23/programmer-3266860_1280.jpg"
                                 @endif;
                                     alt="">
                                <span class="ml-2 text-gray-600 ">{{$similar->name}}</span>
                             </a>   
                             
                         </li>
                     @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>