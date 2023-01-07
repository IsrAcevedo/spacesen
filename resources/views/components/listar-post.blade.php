<div>
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ( $posts as $post )

            <div>
                <a href="{{route('posts.show', ['post' => $post,'user' =>$post->user])}}">
                    <img src="{{asset('uploads') . '/' . $post->imagen}}" 
                    alt="imagen del post{{$post->titulo}}" class="rounded-lg">
                </a>
            </div>
            
        @endforeach
    </div>
    <div class="mt-10 text-3xl font-bold ">
        {{$posts->links()}}
    </div>
    @else
    <p>
        no hay publicaciones
    </p>
    @endif
</div>