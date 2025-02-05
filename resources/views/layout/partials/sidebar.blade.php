<!-- resources/views/layout/partials/sidebar.blade.php -->
<aside class="fixed top-0 left-0 w-64 h-screen bg-gray-800 text-white z-50">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-6">Menu</h2>
        <ul class="space-y-2">
            <!-- Tombol Home -->
            <li>
                <a href="{{ route('home') }}"
                   class="flex items-center py-2 px-4 rounded hover:bg-gray-700 {{ request()->routeIs('home') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-home mr-3"></i> Home
                </a>
            </li>

            <!-- Dropdown Keuangan -->
            <li>
                <!-- Tombol Dropdown -->
                <button id="dropdownKeuangan"
                        class="w-full flex items-center text-left py-2 px-4 rounded hover:bg-gray-700 focus:outline-none {{ request()->is('finansial*') || request()->is('payment*') || request()->is('guide*') ? 'bg-gray-700' : '' }}">
                    <i class="fas fa-wallet mr-3"></i> Keuangan
                </button>

                <!-- Isi Dropdown -->
                <ul id="dropdownMenuKeuangan" class="{{ request()->is('finansial*') || request()->is('payment*') || request()->is('guide*') ? '' : 'hidden' }} space-y-1 mt-1 ml-4">
                    <li>
                        <a href="{{ route('finansial') }}"
                           class="flex items-center py-2 px-4 hover:bg-gray-700 rounded {{ request()->routeIs('finansial') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-money-bill-wave mr-3"></i> Finanance
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('expenditure') }}"
                           class="flex items-center py-2 px-4 hover:bg-gray-700 rounded {{ request()->is('expenditure*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-credit-card mr-3"></i> Expenditure
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('guide') }}"
                           class="flex items-center py-2 px-4 hover:bg-gray-700 rounded {{ request()->is('guide*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-book mr-3"></i> Guide
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<script>
    // JavaScript untuk toggle dropdown sidebar
    document.getElementById('dropdownKeuangan').addEventListener('click', function () {
        const dropdownMenu = document.getElementById('dropdownMenuKeuangan');
        dropdownMenu.classList.toggle('hidden');
    });


</script>
