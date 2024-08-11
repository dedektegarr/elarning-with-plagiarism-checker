<div class="mt-6">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="mb-6 max-w-lg">
            <h2 class="text-gray-900 dark:text-gray-200 text-xl font-bold mb-2">Hasil Pemeriksaan Plagiarisme</h2>
            <p class="text-gray-700 dark:text-gray-500 text-sm leading-normal">Ringkasan tingkat kesamaan dokumen tugas
                mahasiswa dengan
                seluruh
                dokumen lain pada kelas
                <span class="uppercase font-semibold">{{ $topic }}</span>
            </p>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-4">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Mahasiswa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tingkat Plagiasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $result->comparedSubmission->user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ number_format($result->cosim_result * 100, 2) }}%
                            </td>
                            <td class="px-6 py-4">
                                <button type="button"
                                    data-modal-target="compare-modal-{{ $result->similarity_result_id }}"
                                    data-modal-toggle="compare-modal-{{ $result->similarity_result_id }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Perbandingan</button>
                            </td>
                        </tr>

                        <x-modal id="compare-modal-{{ $result->similarity_result_id }}" :title="'Perbandingan dengan tugas ' . $result->comparedSubmission->user->name"
                            size="max-w-[98%]">
                            <div class="grid grid-cols-2">
                                <div>
                                    <iframe class="w-full h-screen"
                                        src="{{ asset('storage/' . $result->submission->file) }}"
                                        frameborder="0"></iframe>
                                </div>
                                <div>
                                    <iframe class="w-full h-screen"
                                        src="{{ asset('storage/' . $result->comparedSubmission->file) }}"
                                        frameborder="0"></iframe>
                                </div>
                        </x-modal>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
