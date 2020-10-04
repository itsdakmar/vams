<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            JawatanSeeder::class,
            OfficeSeeder::class,
            RoleSeeder::class
        ]);

        $user = User::create([
            'name' => 'Ammar Razaman',
            'password' => Hash::make('secret'),
            'email' => 'imdakmar@gmail.com',
            'phone' => '0126360644',
            'office_id' => 2,
            'position_id' => 1,
        ]);

        $user->assignRole('Admin');
    }
}
