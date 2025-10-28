<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Stasiun;
class StasiunSeeder extends Seeder
{
    public function run(): void
    {
        $stasiun = [['nama_stasiun' => 'Gambir', 'kota' => 'Jakarta'], ['nama_stasiun' => 'Pasar Senen', 'kota' => 'Jakarta'], ['nama_stasiun' => 'Yogyakarta', 'kota' => 'Yogyakarta'], ['nama_stasiun' => 'Solo Balapan', 'kota' => 'Surakarta'], ['nama_stasiun' => 'Surabaya Gubeng', 'kota' => 'Surabaya'], ['nama_stasiun' => 'Bandung', 'kota' => 'Bandung'], ['nama_stasiun' => 'Semarang Tawang', 'kota' => 'Semarang'], ['nama_stasiun' => 'Malang', 'kota' => 'Malang']];

        foreach ($stasiun as $s) {
            Stasiun::firstOrCreate($s);
        }

        $this->command->info('Data stasiun berhasil ditambahkan!');
    }
}
