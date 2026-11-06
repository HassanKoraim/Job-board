<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Board {{ isset($title) ? " - " . $title : '' }}</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Flowbite CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">

    <!-- Fixed Navbar -->
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
            
            <!-- Left: Logo -->
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-7" alt="Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Job Board</span>
            </a>
            
            <!-- Center: Navigation Links -->
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <a href="/about" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-white">About</a>
                <a href="/contact" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-white">Contact</a>
                <a href="/blogs" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-white">Blog</a>
            </div>

            <!-- Right: Session-Based Buttons -->
            <div class="flex items-center space-x-2 sm:space-x-3">
                @guest
                    <!-- Shown when user is NOT logged in -->
                    <a href="/login" class="text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:focus:ring-gray-800">
                        Log In
                    </a>
                    <a href="/signup" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Sign Up
                    </a>
                @endguest

                @auth
                    <!-- Shown when user IS logged in -->
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 mr-2">
                        Hi, {{ auth()->user()->name }}
                    </span>
                    
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Log Out
                        </button>
                    </form>
                @endauth
            </div>

        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="pt-24 pb-12 px-4 max-w-screen-xl mx-auto">
        {{ $slot }}
    </main>

    <!-- Flowbite JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>