<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class JawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create(['name' => 'Timbalan Pengarah']);
        Position::create(['name' => 'Penolong Pengarah Operasi Negeri']);
        Position::create(['name' => 'Ketua Zon 1']);
        Position::create(['name' => 'Ketua Zon 2']);
        Position::create(['name' => 'Ketua Balai']);
        Position::create(['name' => 'Pegawai Kenderaan']);




    }
}
