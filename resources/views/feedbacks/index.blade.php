<x-app-layout>
    <div class="pt-8">
        <h2 class="text-white font-semibold text-4xl w-full text-center">Feedbacks</h2>
    </div>
    <div class="bg-white dark:bg-gray-800 w-full max-w-6xl h-fit rounded-md mt-8 mx-auto p-3 flex justify-between gap-5">
        <div class="text-white font-semibold bg-white dark:bg-gray-700 p-2 rounded-md">Prof. {{ $user->name }}</div>
        <div class="flex gap-4 text-white font-semibold">
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
        </div>
    </div>
    <div
        class="bg-white dark:bg-gray-800 w-full max-w-6xl h-full min-h-[200px] rounded-md mt-8 mx-auto p-3 flex flex-col gap-5 justify-between">
        @foreach ($user->professorAsFeedback as $feedback)
            <div class="w-full">
                <div class="w-fit rounded-md flex items-center font-bold gap-2"
                    style="{{ $feedback->like > 0 ? 'color: #0f8;' : 'color: #f03;' }} margin-bottom: 12px;">
                    <iconify-icon icon="mdi:like-outline" width="28" height="28"
                        style="{{ $feedback->like > 0 ? 'color: #0f8' : 'color: #f03; tranform: rotate(.5turn);' }}"
                        title="like"></iconify-icon>

                    {{ $feedback->like > 0 ? 'Liked!' : 'Desliked!' }}
                </div>

                <p class="text-gray-400 mb-4">{{ $feedback->comment }}</p>
            </div>
        @endforeach

    </div>
</x-app-layout>
