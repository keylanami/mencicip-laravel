<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 via-cyan-500 to-indigo-500 font-sans">
    <div class="w-full max-w-md bg-white/90 backdrop-blur-lg rounded-2xl shadow-2xl p-8">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Register</h1>

        <form action="/action" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-semibold">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name"
                       class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-purple-500 focus:ring-2 focus:ring-purple-300 outline-none transition">
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email"
                       class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-pink-500 focus:ring-2 focus:ring-pink-300 outline-none transition">
            </div>

            <div>
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password"
                       class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-red-500 focus:ring-2 focus:ring-red-300 outline-none transition">
            </div>

            <button type="submit"
                    class="w-full py-3 rounded-lg bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold shadow-md hover:from-pink-600 hover:to-purple-600 transition duration-300 transform hover:scale-105">
                Submit
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Already have an account?
            <a href="/login" class="text-purple-600 font-semibold hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
