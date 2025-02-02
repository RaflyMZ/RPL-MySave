<!-- resources/views/layout/partials/sidebar.blade.php -->
<aside class="fixed top-0 left-0 w-64 h-screen bg-gray-800 text-white z-50">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-6">Menu</h2>
        <ul class="space-y-2">
            <li><a href="{{ route('home') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Dashboard</a></li>
            <li><a href="{{ route('profile') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Profile</a></li>
            <li><a href="{{ route('finansial') }}" class="block py-2 px-4 rounded hover:bg-gray-700">Finansial Saya</a></li>
            <li><a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">Settings</a></li>
            <li><a href="#" class="block py-2 px-4 rounded hover:bg-red-600">Logout</a></li>
        </ul>
    </div>
</aside>
