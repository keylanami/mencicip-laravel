<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Kereta;
class KeretaSeeder extends Seeder
{
 public function run(): void
 {
 $kereta = [
 ['nama_kereta' => 'Argo Bromo Anggrek', 'no_kereta' => 'AB123'],
 ['nama_kereta' => 'Taksaka', 'no_kereta' => 'TK456'],
 ['nama_kereta' => 'Bima', 'no_kereta' => 'BM789'],
 ['nama_kereta' => 'Gajayana', 'no_kereta' => 'GJ012'],
 ['nama_kereta' => 'Argo Lawu', 'no_kereta' => 'AL345'],
 ['nama_kereta' => 'Sancaka', 'no_kereta' => 'SC678'],
 ['nama_kereta' => 'Matarmaja', 'no_kereta' => 'MM901'],
 ];

 foreach ($kereta as $k) {
 Kereta::firstOrCreate($k);
 }

 $this->command->info('Data kereta berhasil ditambahkan!');
 }
}