<x-guest-layout>
    <form method="POST" action="{{ route('classes.classesRegister.store') }}" class="grid grid-cols-2 gap-3">
        @csrf

        <!-- Name -->
        <div class="col-span-2">
            <x-input-label for="name" :value="__('Turma para adicionar:')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
        </div>
        <div class="col-span-2">
            <x-input-label for="shift" :value="__('Turno da turma:')" />
            <x-text-input id="shift" class="block mt-1 w-full" type="text" name="shift" :value="old('shift')"
                required autofocus autocomplete="shift" />
        </div>

        <div>
            <x-input-label for="year" :value="__('Ano:')" />
            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')"
                required autofocus autocomplete="year" />
        </div>
        <div>
            <x-input-label for="subjects" :value="__('Disciplina para adicionar:')" />
            <select {{ $errors->has('subjects_id') ? 'is-invalid' : '' }}
                class="max-w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1"
                name="subjects_id" id="subjects">
                <option disabled select>Selecione a disciplina</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-center col-span-2">
            <x-primary-button class="w-[30%] grid place-items-center mt-3">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
