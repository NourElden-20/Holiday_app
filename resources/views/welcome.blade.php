<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome</title>

    {{-- ✅ Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- ✅ Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-white min-h-screen flex items-center justify-center">

    <div class="text-center p-10 bg-white shadow-xl rounded-2xl max-w-xl w-full">

        {{-- 🔥 عنوان ترحيبي --}}
        <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-700 mb-4">
            Welcome to Leave Portal 🌿
        </h1>

        <p class="text-gray-600 text-lg mb-8">
            Manage your leave requests with ease. Secure, simple, and efficient.
        </p>

        {{-- ✅ أزرار تسجيل الدخول والتسجيل --}}
        <div class="flex flex-col md:flex-row justify-center gap-4">
            @if (Route::has('login'))
                <a href="{{ route('login') }}"
                   class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition duration-200">
                    🔐 Login
                </a>
            @endif

            
        </div>
        <div class="flex flex-col md:flex-row justify-center gap-4">
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition duration-200">
                    🔐 register
                </a>
            @endif

            
        </div>
    </div>

</body>
</html>
