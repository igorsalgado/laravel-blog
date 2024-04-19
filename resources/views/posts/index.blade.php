@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="container p-5 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2">
            @forelse ($posts as $post)
                <div class="p-4 bg-white rounded-lg shadow-md">
                    @if ($post->thumb)
                        <img src="{{ asset('storage/' . $post->thumb) }}" class="object-cover w-full h-40 mb-4 rounded-md"
                            alt="Capa Postagem: {{ $post->title }}">
                    @endif
                    <h2 class="mb-2 text-lg font-semibold text-gray-800">{{ $post->title }}</h2>
                    <p class="mb-4 text-gray-600">{{ $post->description }}</p>
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-500">Criado por {{ $post->user->name }} em
                            {{ $post->created_at->diffForHumans() }}</p>
                        <a href="/posts/{{ $post->slug }}" class="text-blue-600 hover:underline">Ver post..</a>
                    </div>
                </div>
            @empty
                <h3 class="text-xl text-gray-800">Nenhum post encontrado</h3>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
