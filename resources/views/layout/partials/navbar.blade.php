<!-- resources/views/layout/partials/navbar.blade.php -->
<nav class="bg-white shadow-md z-50 sticky top-0 ml-64">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Welcome Message -->
        <div class="flex items-center text-gray-700">
            <span class="text-lg font-medium">Welcome, <span class="font-semibold text-indigo-600">{{ Auth::user()->name ?? 'Guest' }}</span></span>
        </div>
        <!-- User Button -->
        <div class="relative inline-block">
            <!-- Tombol User (Redirect ke Profile) -->
            <a href="{{ route('profile') }}" class="inline-flex items-center bg-gray-100 border border-transparent rounded-full p-2 focus:outline-none hover:bg-gray-200 transition duration-300 ease-in-out">
                <!-- User Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 text-gray-600" viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
        </div>
    </div>
</nav>
