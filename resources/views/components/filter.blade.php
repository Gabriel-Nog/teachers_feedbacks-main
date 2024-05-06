<div
    {{ $attributes->merge(['class' => 'filters h-15 w-0 text-lg flex items-center gap-2 cursor-pointer duration-500 text-white bg-white dark:bg-gray-800 overflow-hidden whitespace-nowrap shadow-sm sm:rounded-lg px-0 mb-4 py-[2px]']) }}>
    <select name="" id=""
        class="bg-transparent border-2 border-solid border-white border-opacity-40  focus:border-indigo-600 rounded-md h-[80%] py-0">
        <option disabled selected class="bg-white dark:bg-gray-800 font-semibold">Tipo de busca
        </option>
        <option value="name" class="bg-white dark:bg-gray-800">
            Nome
        </option>
        <option value="class" class="bg-white dark:bg-gray-800">
            Turma
        </option>
        <option value="status" class="bg-white dark:bg-gray-800">
            Status
        </option>
    </select>
    <input type="search"
        class="bg-transparent border-2 w-full border-solid border-white border-opacity-40 focus:border-indigo-600 rounded-md h-[80%] py-0"
        placeholder="Buscar por registro">
</div>
