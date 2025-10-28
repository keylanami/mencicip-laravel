<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            Pesan Tiket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tiket.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Pilih Kereta -->
                        <div>
                            <label for="id_kereta" class="block text-sm font-medium text-gray-700">Pilih Kereta</label>
                            <select id="id_kereta" name="id_kereta" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm ">
                                <option value="">-- Pilih Kereta --</option>
                                @foreach ($keretas as $kereta)
                                    <option value="{{ $kereta->id_kereta }}" {{ old('id_kereta') == $kereta->id_kereta ? 'selected' : '' }}>{{ $kereta->nama_kereta }}</option>
                                @endforeach
                            </select>
                            @error('id_kereta')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    

                        <!-- Stasiun Asal -->
                        <div>
                            <label for="id_stasiun_asal" class="block text-sm font-medium text-gray-700">Stasiun Asal</label>
                            <select id="id_stasiun_asal" name="id_stasiun_asal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm ">
                                <option value="">-- Pilih Stasiun Asal --</option>
                                @foreach ($stasiuns as $stasiun)
                                    <option value="{{ $stasiun->id_stasiun }}" {{ old('id_stasiun_asal') == $stasiun->id_stasiun ? 'selected' : '' }}>{{ $stasiun->nama_stasiun }}</option>
                                @endforeach
                            </select>
                            @error('id_stasiun_asal')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stasiun Tujuan -->
                        <div>
                            <label for="id_stasiun_tujuan" class="block text-sm font-medium text-gray-700">Stasiun Tujuan</label>
                            <select id="id_stasiun_tujuan" name="id_stasiun_tujuan" class="mt-1 block w-full rounded-md border-gray-300 ">
                                <option value="">-- Pilih Stasiun Tujuan --</option>
                                @foreach ($stasiuns as $stasiun)
                                    <option value="{{ $stasiun->id_stasiun }}" {{ old('id_stasiun_tujuan') == $stasiun->id_stasiun ? 'selected' : '' }}>{{ $stasiun->nama_stasiun }}</option>
                                @endforeach
                            </select>
                            @error('id_stasiun_tujuan')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Keberangkatan -->
                        <div>
                            <label for="tanggal_keberangkatan" class="block text-sm font-medium text-gray-700">Tanggal Keberangkatan</label>
                            <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan" value="{{ old('tanggal_keberangkatan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('tanggal_keberangkatan')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md ">
                                Pesan Tiket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>