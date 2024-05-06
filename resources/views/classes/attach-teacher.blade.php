<x-guest-layout>
    <form method="POST" action="{{ route('classes.attach-teachers', $id) }}" class="flex flex-col items-center gap-3">
        @csrf

        <div class="w-full">
            <x-input-label for="subjects" :value="__('Anexar a disciplina:')" />
            <select {{ $errors->has('subjects_id') ? 'is-invalid' : '' }}
                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1"
                name="subjects_id" id="subjects">
                <option disabled select>Selecione a disciplina</option>
                @foreach ($subjects as $subject)
                    @if ($user->subjectAsParticipant->count() > 0 && $user->subjectAsParticipant->first()->id == $subject->id)
                        <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
                    @else
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="w-full">
            <x-input-label for="class" :value="__('Anexar a turma:')" />
            <select {{ $errors->has('classes_id') ? 'is-invalid' : '' }}
                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1"
                name="classes_id" id="class">
                <option disabled select>Selecione a turma</option>
                @foreach ($classes as $class)
                    @if ($user->classeAsParticipant->count() > 0 && $user->classeAsParticipant->first()->id == $class->id)
                        <option value="{{ $class->id }}" selected>{{ $class->name }}</option>
                    @else
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="flex justify-center  w-full">
            <x-primary-button class="w-[30%] grid place-items-center mt-3">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
