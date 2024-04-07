<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Criar Postagem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form action="" method="POST">
                    <div class="w-full mb-6">
                        <label for="" class="block">Título</label>
                        <input type="text" class="w-full" name="title">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block">Descrição</label>
                        <input type="text" class="w-full" name="description">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block">Conteúdo</label>
                        <input type="text" class="w-full" name="body">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block">Status</label>
                        <input type="radio" class="w-full" name="is_active" value="0"> Ativo
                        <input type="radio" class="w-full" name="is_active"value="1"> Inativo
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>
