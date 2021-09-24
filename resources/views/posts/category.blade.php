<x-app-layout>
    <h1 class="uppercase py-8 text-center text-3xl font-bold">
        CATEGORIA: {{$category->name}}
    </h1>
    <div class=" container grid md:grid-span-2 px-10 lg:grid-cols-2 py-8 gap-10">
        @foreach ($posts as $post)
            <x-card-post :post="$post"/>
        @endforeach
    </div>

    <div class="mt-4 mb-8">
        {{$posts->links()}}
    </div> 
</x-app-layout>