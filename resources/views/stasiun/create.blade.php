<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>List Gerbong dengan Tailwind CSS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Tambahkan ini di dalam <body> tag di create.blade.php -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 p-6">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8 border border-gray-100">

            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Tambah Kereta</h1>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <!-- Error Message -->
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-
1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <form action="{{ route('kereta.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nama Kereta -->
                <div>
                    <label for="nama_stasiun" class="block text-sm font-medium text-gray-700 mb-1">Nama Stasiun</label>
                    <input type="text" id="nama_stasiun" name="nama_stasiun" value="{{ old('nama_stasiun') }}"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition">
                    @error('nama_stasiun')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Kode Kereta -->
                <div>
                    <label for="no_kereta" class="block text-sm font-medium text-gray-700 mb-1">Kode Kereta</label>
                    <input type="text" id="no_kereta" name="no_kereta" value="{{ old('no_kereta') }}"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition">
                    @error('no_kereta')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Tombol Simpan -->
                <button type="submit"
                    class="w-full py-2 px-4 rounded-lg text-white font-medium bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</body>

</html>
