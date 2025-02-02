<!-- resources/views/layout/homelayout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 relative">

    <!-- Sidebar (Layer Paling Depan) -->
    @include('layout.partials.sidebar')

    <!-- Navbar -->
    @include('layout.partials.navbar')

    <!-- Content Wrapper -->
    <div class="flex-1 flex flex-col ml-64">
        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layout.partials.footer')
    </div>

</body>
</html>
