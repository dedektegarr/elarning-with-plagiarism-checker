<ul class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    @forelse ($topics as $topic)
        <li>
            <article
                class="bg-gray-50 dark:bg-gray-800 rounded-md py-4 px-5 flex gap-2 flex-wrap items-center justify-between hover:shadow-lg">
                <h6 class="text-gray-900 capitalize dark:text-gray-400 line-clamp-1 font-bold">{{ $topic->name }}</h6>
                <div class="flex items-center">
                    <a href="{{ route('assignment.show', $topic->topic_id) }}"
                        class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Tugas
                    </a>

                    <button type="button" wire:click="deleteTopic({{ $topic->topic_id }})"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </article>
        </li>

    @empty
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
            <p class="text-sm text-gray-500 dark:text-gray-400">Kelas ini belum memiliki topik</p>
        </div>
    @endforelse
</ul>
