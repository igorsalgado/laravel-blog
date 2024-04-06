    @forelse ($posts as $post)
        <div>
            <h2> {{ $post->title }} / Criado em {{ $post->created_at->diffForHumans }} </h2>
            {{ $post->description }}
            <hr>
        </div>
    @else
        <h3>Nenhum post encontrado!</h3>
    @endforelse
