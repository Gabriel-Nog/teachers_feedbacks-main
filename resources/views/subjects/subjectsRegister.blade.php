<x-guest-layout>
    <form method="POST" action="{{ route('subjects.subjectsRegister.store') }}" class="flex flex-col gap-3">
        @csrf

        <!-- Name -->

        <x-input-label for="name" :value="__('Disciplina para adicionar:')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" />
        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <x-input-label for="teachers" :value="__('Atribuição')" />
        <select {{ $errors->has('role_id') ? 'is-invalid' : '' }}
            class="max-w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1"
            name="user_id" id="teachers">
            <option disabled select>Selecione a atribuição</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('user_id')" class="mt-2" /> --}}
        <x-primary-button class="mt-2 w-fit">
            {{ __('Registrar') }}
        </x-primary-button>

        </div>
    </form>
</x-guest-layout>
