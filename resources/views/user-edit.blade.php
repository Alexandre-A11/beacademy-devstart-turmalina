@extends("template.default")
@section("title", "Home")
@section("main")

<div class="grid justify-items-center">
    <div class="px-10 w-2/6">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @method("PUT")
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" value="{{ $user->name }}" class="block mt-1 w-full" type="text" name="name" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-label for="last_name" :value="__('Sobrenome')" />

                <x-input id="last_name" value="{{ $user->last_name }}" class="block mt-1 w-full" type="text" name="last_name" />
            </div>

            @if (auth()->user()->is_admin)
            <!-- CPF -->
            <div class="mt-4">
                <x-label for="cpf" :value="__('CPF')" />

                <x-input id="cpf" value="{{ $user->cpf }}" class="block mt-1 w-full" type="text" name="cpf" />
            </div>
            @endif

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Telefone')" />

                <x-input id="phone" value="{{ $user->phone }}" class="block mt-1 w-full" type="text" name="phone" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" value="{{ $user->email }}" class="block mt-1 w-full" type="email" name="email" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
            </div>

            @if (!auth()->user()->is_admin)
            <div class="flex items-center justify-end mt-4">
                @else
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center mr-4">
                        <input id="administrator" type="radio" value="admin" name="type_user" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="administrator" class="ml-2 text-sm font-medium text-gray-700">Aministrador</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input checked id="user" type="radio" value="user" name="type_user" class="w-4 h-4 btn-radio">
                        <label for="user" class="ml-2 text-sm font-medium text-gray-700 ">Usuário comum</label>
                    </div>
                    @endif
                    <x-button class="ml-4">
                        {{ __('Editar Usuário') }}
                    </x-button>
                </div>
        </form>
    </div>
</div>
@endsection