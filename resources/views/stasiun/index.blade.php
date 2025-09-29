<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>List Gerbong dengan Tailwind CSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="container mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Daftar Gerbong Kereta</h1>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Gerbong</th>
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
</body>
</html>