<div x-data="state()">
    <div x-show="!file" class="flex items-center justify-center w-full">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Silakan upload tugas
                    untuk topik <span class="font-bold capitalize">{{ $topic->name }}</span></p>
                <p class="text-xs text-gray-500 dark:text-gray-400"><span
                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">PDF</span>
                </p>
            </div>
            <input wire:model="file" x-on:change="getFileInfo" id="dropzone-file" type="file" class="hidden" />
        </label>
    </div>

    <div x-show="file"
        class="mt-6 block max-w-md mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a :href="previewUrl" target="_blank" class="group">
            <div class="flex items-center gap-3 bg-gray-700 text-gray-700 dark:text-gray-200 p-4 rounded-md">
                <div>
                    <svg class="w-8 h-8 text-gray-800 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="line-clamp-1 group-hover:underline" x-text="fileName"></p>
                    <p class="text-xs text-gray-400" x-text="fileSize"></p>
                </div>
            </div>
        </a>

        <form action="" wire:submit.prevent="uploadAssignment">
            <div class="mt-6">
                <button type="button" x-on:click="resetUpload"
                    class="block w-full py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 
            dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Ubah</button>

                <button type="submit"
                    class="block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
                dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</div>
</div>

<script>
    function state() {
        return {
            fileName: '',
            fileSize: '',
            previewUrl: '',
            file: @entangle('file'),

            getFileInfo(e) {
                const file = e.target.files[0];

                this.fileName = file.name;

                const size = file.size / 1048576;
                this.fileSize = `${size.toFixed(2)} MB`;

                this.previewUrl = URL.createObjectURL(file);
            },

            resetUpload() {
                this.file = null
            }
        }
    }
</script>
