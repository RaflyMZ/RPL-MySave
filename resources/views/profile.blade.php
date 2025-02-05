<!-- resources/views/profile.blade.php -->
@extends('layout.homelayout')
@section('content')
<section class="p-6">
    <div class="container mx-auto max-w-md bg-white rounded-lg shadow-md p-6">
        <!-- Profile Picture and Edit Button -->
        <div class="flex justify-center mb-4">
            <div class="relative">
                <img src="{{ $profil->profilpic ? asset('storage/' . $profil->profilpic) : 'https://via.placeholder.com/150' }}"
                    alt="Profile Picture" class="w-32 h-32 rounded-full object-cover">
            </div>
        </div>
        <!-- Upload & Delete Buttons -->
        <div class="flex justify-center mb-4">
            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="profilpic" id="profilpic" class="hidden" onchange="this.form.submit()">
                <label for="profilpic" class="bg-blue-500 text-white px-5 py-1 rounded cursor-pointer">
                    {{ $profil->profilpic ? 'Ganti Foto' : 'Upload Foto' }}
                </label>
            </form>
            @if($profil->profilpic)
                <form action="{{ route('profile.deletePhoto') }}" method="POST" class="ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-5 py-1 rounded">Hapus Foto</button>
                </form>
            @endif
        </div>
        <!-- Form -->
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <!-- First Name and Last Name -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first_name">
                        First Name
                    </label>
                    <input name="first_name" value="{{ $profil->first_name ?? '' }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="first_name" type="text" placeholder="First Name">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last_name">
                        Last Name
                    </label>
                    <input name="last_name" value="{{ $profil->last_name ?? '' }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="last_name" type="text" placeholder="Last Name">
                </div>
            </div>
            <!-- Email -->
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Email
                </label>
                <input name="email" value="{{ $profil->email ?? '' }}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="email" type="email" placeholder="Email">
            </div>
            <!-- Alamat -->
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                    Alamat
                </label>
                <input name="alamat" value="{{ $profil->alamat ?? '' }}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="address" type="text" placeholder="Alamat">
            </div>
            <!-- Nomor Kontak -->
            <div class="mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                    Nomor Kontak
                </label>
                <input name="phoneNumber" value="{{ $profil->phoneNumber ?? '' }}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="phone" type="text" placeholder="Nomor Kontak">
            </div>
            <!-- Pekerjaan and Kota -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="job">
                        Pekerjaan
                    </label>
                    <input name="jobStatus" value="{{ $profil->jobStatus ?? '' }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="job" type="text" placeholder="Pekerjaan">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                        Kota
                    </label>
                    <input name="kota" value="{{ $profil->kota ?? '' }}"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="city" type="text" placeholder="Kota">
                </div>
            </div>
            <div class="flex flex-col items-center">
                <button type="submit" class="bg-green-500 text-white px-5 py-1 rounded">Simpan Profil</button>
            </div>
        </form>
    </div>
</section>
@endsection