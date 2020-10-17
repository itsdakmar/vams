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
            'name' => 'Administrator',
            'password' => Hash::make('secret'),
            'email' => 'imdakmar@gmail.com',
            'phone' => '0126360644',
            'position_id' => 7,
        ]);

        $user->assignRole('Admin');

        User::create([
            'name' => 'Yazid Bin Mohd Tahir',
            'password' => Hash::make('secret'),
            'email' => 'jeedayu@gmail.com',
            'phone' => '0139671746',
            'position_id' => 5,
            'office_id' => 1,
        ]);

        $user_2 = User::create([
            'name' => 'Mohamad Hamdan Bin Sudin',
            'password' => Hash::make('secret'),
            'email' => 'hamdan.bomba@1govuc.com',
            'phone' => '0166273838',
            'position_id' => 7,

        ]);

        $user_2->assignRole('Admin');

        $user_3 = User::create([
            'name' => 'Norshuhada Binti Amsari',
            'password' => Hash::make('secret'),
            'email' => 'bombashuhada@gmail.com',
            'phone' => '0179743007',
            'position_id' => 7,
        ]);

        $user_3->assignRole('Admin');


    }
}
