<x-app-layout>
   <x-slot name="header">
        <div class="flex justify-between mb-2 items-center">
            <h2 class="font-semibold text-gray-900 text-xl">Daftar Stasiun</h2>
            {{-- <a href="{{ route('stasiun.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-2 py-2 rounded-lg transition">
                Tambah Stasiun
            </a> --}}
        </div>
    </x-slot>

  <div class="container mx-auto">

    
    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Stasiun</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Stasiun</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kota</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($allstasiun as $item)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->id_stasiun }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nama_stasiun }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->kota }}</td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
</x-app-layout>