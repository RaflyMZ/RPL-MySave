<!-- resources/views/profile.blade.php -->
@extends('layout.homelayout')

@section('content')
<section class=" p-6">
    <div class="container mx-auto max-w-md bg-white rounded-lg shadow-md p-6">
        <!-- Profile Picture and Edit Button -->
        <div class="flex justify-center mb-4">
            <div class="relative">
                <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
            </div>
        </div>
        <!-- Form -->
        <form action="{{ route('editProfile') }}">
            <!-- First Name and Last Name -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first_name">
                        First Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="first_name" type="text" placeholder="Mehrab">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last_name">
                        Last Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last_name" type="text" placeholder="Bozorgi">
                </div>
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Email
                </label>
                <div class="flex items-center border-b border-b-2 border-teal-500 py-2">
                    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="email" type="email" placeholder="mehrabbozorgi.business@gmail.com">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4 ml-2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Alamat -->
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                    Alamat
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" type="text" placeholder="33062 Zboncak isle">
            </div>

            <!-- Nomor Kontak -->
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                    Nomor Kontak
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone" type="text" placeholder="+6282074418956">
            </div>

            <!-- Pekerjaan and Kota -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="job">
                        Pekerjaan
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="job" type="text" placeholder="Mehrab">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                        Kota
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="city" type="text" placeholder="Mehrab">
                </div>
            </div>
        <div class="flex flex-col items-center">
            <button class="bg-green-500 text-white px-5 py-1 rounded">Edit Profile</button>
        </div>

        </form>
    </div>
</section>
@endsection

