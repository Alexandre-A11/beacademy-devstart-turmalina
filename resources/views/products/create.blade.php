@extends("template.default")
@section("title", "Home")
@section("main")

<div class="grid justify-items-center">
    <div class="pt-6 p-10 w-2/6">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-label for="quantity" :value="__('Quantidade')" />

                <x-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" />
            </div>

            <!-- CPF -->
            <div class="mt-4">
                <x-label for="description" :value="__('Descrição')" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="price" :value="__('Valor')" />

                <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" />
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="photo">Upload file</label>
                <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-700 focus:outline-none dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400" id="photo" type="file" name="photo">
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Cadastrar Produto') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection