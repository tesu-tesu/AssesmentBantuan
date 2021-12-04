<?php

namespace Database\Seeders;

use App\Models\Lembaga;
use App\Models\Users;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Lembaga::create([
            'name' => 'Dompet Dhuafa'
        ]);
        Lembaga::create([
            'name' => 'Rumah Zakat'
        ]);
        Lembaga::create([
            'name' => 'Nurul Hayar'
        ]);

        Users::create([
            'name' => 'Budi',
            'nik' => '2110',
            'alamat' => 'Jl Keputih Surabaya',
            'no_telp' => '082121212',
            'status' => 1
        ]);
        Users::create([
            'name' => 'Andi',
            'nik' => '2111',
            'alamat' => 'Jl Gebang Surabaya',
            'no_telp' => '081212341234',
            'status' => 1
        ]);
        Users::create([
            'name' => 'Yudi',
            'nik' => '2112',
            'alamat' => 'Jl Arif Rahman Hakim Surabaya',
            'no_telp' => '082121312',
            'status' => 1
        ]);
    }
}
