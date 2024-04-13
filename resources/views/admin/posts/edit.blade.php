<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Editar Postagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-5 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                    @csrf <!--Token crsf-->
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Título</label>
                        <input type="text" class="w-full rounded" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Descrição</label>
                        <input type="text" class="w-full rounded" name="description"
                            value="{{ $post->description }}">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Conteúdo</label>
                        <input type="text" class="w-full rounded" name="body" value="{{ $post->body }}">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Status</label>
                        <div class="flex justify-start gap-3 text-white">
                            <div>
                                <input type="radio" class="" name="is_active" value="1"
                                    @if ($post->is_active) checked @endif> Ativo
                            </div>
                            <div>
                                <input type="radio" class="" name="is_active"value="0"
                                    @if (!$post->is_active) checked @endif> Inativo
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end w-full">
                        <button
                            class="px-4 py-2 mt-5 text-xl text-white transition duration-300 ease-in-out bg-green-700 rounded shadow text-bold hover:bg-green-900">
                            Editar Post
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>
