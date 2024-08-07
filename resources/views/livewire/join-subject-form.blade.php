<form class="p-4 md:p-5" wire:submit.prevent="joinSubject">
    @if ($errors->any())
        <x-validation-error :errors="$errors->all()" />
    @endif

    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select id="countries" wire:model="subject_id"
                class="bg-gray-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih kelas</option>
                @foreach ($subjects as $subject)
                    <option class="uppercase" value="{{ $subject->subject_id }}">{{ $subject->code }} -
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" wire:loading.attr="disabled"
        class="text-white inline-flex disabled:opacity-50 disabled:cursor-default items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="hidden" wire:loading.class="!block">Tunggu...</span>
        <span wire:loading.class="hidden">Gabung kelas</span>

    </button>
</form>
