@vite(['resources/css/app.css', 'resources/js/app.js'])
@forelse ($posts as $post)
    <div class="block p-4 mb-4">
        <h2 class="mb-2 text-xl"> {{ $post->title }} / Criado em {{ $post->created_at->diffForHumans() }} </h2>
        <p>
            {{ $post->description }}
        </p>
        <a href="/posts/{{ $post->slug }}" class="mt-4 text-blue-600 hover:underline"> Ver post.. </a>
        <hr>
    </div>
@empty
    <h3> Nenhum post encontrado</h3>
@endforelse

{{ $posts->links() }}
