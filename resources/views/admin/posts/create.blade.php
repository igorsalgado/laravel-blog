<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Criar Postagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-5 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf <!--Token crsf-->
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Título</label>
                        <input type="text" class="w-full rounded" name="title">
                        @error('title')
                            <div class="w-full p-2 mt-2 font-bold text-red-600 bg-red-200 border border-red-600 rounded">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Descrição</label>
                        <input type="text" class="w-full rounded" name="description">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Conteúdo</label>
                        <input type="text" class="w-full rounded" name="body">
                        @error('body')
                            <div class="w-full p-2 mt-2 font-bold text-red-600 bg-red-200 border border-red-600 rounded">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block mb-2 text-white">Status</label>
                        <div class="flex justify-start gap-3 text-white">
                            <div>
                                <input type="radio" class="" name="is_active" value="1" checked> Ativo
                            </div>
                            <div>
                                <input type="radio" class="" name="is_active"value="0"> Inativo
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-2 mb-6 bg-white">
                        <label for="" class="block mb-2 text-black">Capa Postagem</label>
                        <input type="file" class="w-full rounded" name="thumb">
                        @error('thumb')
                            <div class="w-full p-2 mt-2 font-bold text-red-600 bg-red-200 border border-red-600 rounded">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="w-full p-2 mb-6 ">
                        <label for="" class="block mb-2 text-white">Autor Postagem</label>
                        <select name="user" class="w-full p-2 rounded">
                            <option value="">Selecione o autor do post</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user')
                            <div class="w-full p-2 mt-2 font-bold text-red-600 bg-red-200 border border-red-600 rounded">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="flex justify-end w-full">
                        <button
                            class="px-4 py-2 mt-5 text-xl text-white transition duration-300 ease-in-out bg-green-700 rounded shadow text-bold hover:bg-green-900">
                            Criar Post
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>
