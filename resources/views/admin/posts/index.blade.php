<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Gerenciamento de Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end w-full mb-10">
                <a href="{{ route('admin.posts.create') }}"
                    class="px-4 py-2 text-white transition duration-300 ease-in-out bg-green-700 rounded shadow text-bold hover:bg-green-900">
                    Criar Posts</a>
            </div>
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <table class="w-full p-4 bg-white rounded shadow">
                    <thead>
                        <tr>
                            <th class="px-2 py-4 text-left">#</th>
                            <th class="px-2 py-4 text-left">Titulo</th>
                            <th class="px-2 py-4 text-left">Criado em</th>
                            <th class="px-2 py-4 text-left">Status</th>
                            <th class="px-2 py-4 text-left">Ações</th>
                        <tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            </tr>
                            <td class="px-2 py-4 text-left">{{ $post->id }}</td>
                            <td class="px-2 py-4 text-left">{{ $post->title }}</td>
                            <td class="px-2 py-4 text-left">{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                            <td class="px-2 py-4 text-left">
                                <span class="font-bold {{ $post->is_active ? 'text-green-800' : 'text-red-800' }}">
                                    {{ $post->is_active ? 'Ativo' : 'Inativo' }}
                                </span>
                            </td>
                            <td class="px-2 py-4 text-left flex gap-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                    class="px-4 py-2 text-white transition duration-300 ease-in-out bg-blue-700 rounded shadow text-bold hover:bg-blue-900">Editar</a>

                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="px-4 py-2 text-white transition duration-300 ease-in-out bg-red-700 rounded shadow text-bold hover:bg-red-900">Deletar</button>
                                </form>
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhum post encontrado!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>


</x-app-layout>
