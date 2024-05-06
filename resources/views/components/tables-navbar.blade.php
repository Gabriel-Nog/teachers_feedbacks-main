<div {{ $attributes->merge(['class' => 'w-fit h-fit flex gap-3 m-4']) }}>
    {{-- <button onclick="openFilters()"
        class="h-18 min-w-fit w-fit text-lg flex items-center cursor-pointer hover:bg-gray-700 duration-300 text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-3 mb-4 py-[2px]">
        <iconify-icon icon="mage:filter-fill" class="text-white" width="20" height="20"></iconify-icon>
        <span class="font-semibold ml-1">Filtros</span> --}}
    {{-- </button> --}}
    {{-- <x-filter></x-filter> --}}
    <div
        class="h-15 min-w-fit text-lg flex items-center cursor-pointer text-white bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-[2px]">
        @php
            $baseClass =
                'w-full font-light hover:text-indigo-600 border-b-2 border-solid border-transparent hover:border-b-indigo-600 hover:bg-indigo-600/10 duration-200 p-1 px-2';
            $activedClass =
                'w-full font-light font-semibold text-indigo-600 border-b-2 border-solid border-b-indigo-600 hover:bg-indigo-600/10 duration-200 p-1 px-2';
            $isEmpty =
                request('type') != 'students' && request('type') != 'teachers' && request('type') != 'classes'
                    ? true
                    : false;
        @endphp

        <a class="{{ request('type') == 'teachers' ? $activedClass : $baseClass }}"
            href="/dashboard?type=teachers">Professores</a>
        <a class="{{ request('type') == 'students' || $isEmpty ? $activedClass : $baseClass }}"
            href="/dashboard?type=students">Alunos</a>
        <a class="{{ request('type') == 'classes' ? $activedClass : $baseClass }}"
            href="/dashboard?type=classes">Turmas</a>
    </div>
</div>
