@extends('layouts.main')

@section('authentication')
    <div class="w-full max-w-sm mx-auto dark:bg-gray-800 bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-gray-900 dark:text-white text-xl sm:text-2xl font-bold mb-8 text-center">Login</h2>

        <form>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="email" id="email"
                    class="uppercase shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="NPM / NIP" autocomplete="off" />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" placeholder="Password"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    autocomplete="off" />
            </div>

            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>

            <p class="text-gray-400 text-sm font-medium my-4">Belum terdaftar? <a href="{{ route('auth.register') }}"
                    class="text-blue-600 hover:underline">Buat
                    akun</a></p>
        </form>
    </div>
@endsection
