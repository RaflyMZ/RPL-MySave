<!-- resources/views/layout/partials/navbar.blade.php -->
<nav class="bg-white shadow-md z-40 sticky top-0 ml-64">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="flex title-font font-medium items-center text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Tailblocks</span>
        </a>

        <!-- Navigation Links -->
        <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center">
            <a href="#" class="mr-5 hover:text-gray-900">First Link</a>
            <a href="#" class="mr-5 hover:text-gray-900">Second Link</a>
            <a href="#" class="mr-5 hover:text-gray-900">Third Link</a>
            <a href="#" class="mr-5 hover:text-gray-900">Fourth Link</a>
        </nav>

        <!-- User Button -->
        <button class="inline-flex items-center bg-gray-100 border-0 py-2 px-4 focus:outline-none hover:bg-gray-200 rounded-full text-base mt-4 md:mt-0">
            <!-- User Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6 text-gray-600" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            
        </button>
    </div>
</nav>
