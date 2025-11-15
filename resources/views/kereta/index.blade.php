<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between mb-2 items-center">
            <h2 class="font-semibold text-gray-900 text-xl">Daftar Kereta</h2>
            <div class="flex gap-6 items-center justify-center">
                <a href="{{ route('kereta.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-2 py-2 rounded-lg transition flex">
                    Tambah Kereta
                </a>
                <a href="{{ route('kereta.export') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-2 py-2 rounded-lg transition flex btn btn-success">
                    <button>
                        Export Kereta
                    </button> 
                </a>
                <form href="{{ route('kereta.import') }} id="importForm"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-2 py-2 rounded-lg transition flex btn btn-success"
                    method="post" enctype="multipart/form-data">
            
                    @csrf
                    <input type="file" name="file">
                    <button type="submit">
                        Import Kereta
                    </button> 

                </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const importForm = document.getElementById('importForm');
                            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            
                            importForm.addEventListener('submit', async function(event) {
                                event.preventDefault();
                                const formData = new FormData(importForm);
                                const response = await fetch(importForm.getAttribute('action'),{
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken,
                                        'Accept': 'application/json'
                                    },
                                    body: formData
                                });
                                const result = await.response.json();
                                alert(result.message);
                                importForm.reset();
                            })
                        })
                    </script>
            </div>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 p-6">
        <div class="max-w-6xl mx-auto">


        </div>
        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
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
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <!-- Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            @if ($kereta->count() > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Kereta</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kode Kereta</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($kereta as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->nama_kereta }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->no_kereta }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('kereta.edit', $item->id_kereta) }}"
                                        class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                    <form class="inline delete-form" data-id="{{ $item->id_kereta }}"
                                        data-nama="{{ $item->nama_kereta }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="text-red-600 hover:text-red-900 delete-btn">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 0122" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada kereta</h3>
                    <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan kereta baru.</p>
                    <div class="mt-6">
                        <a href="{{ route('kereta.create') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Kereta
                        </a>
                    </div>

                </div>
            @endif
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.delete-form');
                    const id = form.dataset.id;
                    const nama = form.dataset.nama;

                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: `Apakah kamu yakin ingin menghapus kereta "${nama}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yeah, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim request delete via AJAX
                            fetch(`/kereta/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content'),
                                        'Accept': 'application/json',
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Terhapus!', data.message, 'success')
                                            .then(() => location.reload());
                                    }
                                })
                                .catch(error => {
                                    Swal.fire('Error!',
                                        'Terjadi kesalahan saat menghapus data.',
                                        'error');
                                });
                        }
                    });
                });
            });
        });
    </script>

</x-app-layout>
