<x-app-layout>
    <div class="pt-8">
        <h2 class="text-white font-semibold text-4xl w-full text-center">Turmas</h2>
    </div>
    <div class="bg-white dark:bg-gray-800 w-full max-w-6xl h-fit rounded-md mt-8 mx-auto p-3 flex justify-between gap-5">
        <div class="text-white font-semibold bg-white dark:bg-gray-700 p-2 rounded-md">Prof {{ $user->name }}</div>
        {{-- <div class="flex gap-4 text-white font-semibold">
            <div class="flex items-center gap-2">
                <iconify-icon icon="mdi:like-outline" width="28" height="28" style="color: #0f8"
                    title="like"></iconify-icon>
                {{ $likes }}
            </div>
            <div class="flex items-center gap-2">
                <iconify-icon icon="mdi:like-outline" width="28" height="28"
                    style="color: #f03; transform: rotate(.5turn);" title="unlike"></iconify-icon>
                {{ $unlikes }}
            </div>
        </div> --}}
    </div>
    <div
        class="bg-white dark:bg-gray-800 w-full max-w-6xl h-full rounded-md mt-8 mx-auto p-3 flex flex-col gap-5 justify-between">
        @foreach ($classesUser as $class)
            {{-- @dd($class) --}}
            <div class="w-full flex justify-between items-center">
                <p class="text-gray-400 mb-4 font-semibold text-xl">
                    {{ $user->classeAsParticipant->where('id', $class->classes_id)->first()->name }}
                </p>
                <p class="text-white mb-4 font-semibold text-base">{{ $class->subject }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
