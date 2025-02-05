<!-- resources/views/layout/homelayout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Reset margin dan padding default */
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 relative m-0 p-0">
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
