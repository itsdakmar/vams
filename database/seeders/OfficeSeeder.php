<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\Zone;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create([
            'name'=>'Z1MK',
            'description'=>'Zon 1 Melaka Tengah'
        ]);

        Zone::create([
            'name'=>'Z2MK',
            'description'=>'Zon 2 Melaka Tengah'
        ]);

        Office::create([
            'name'=>'BBP Jalan Kubu',
            'zone_id'=>'1'
        ]);

        Office::create([
            'name'=>'BBP Ayer Keroh',
            'zone_id'=>'1'
        ]);

        Office::create([
            'name'=>'BBP Bukit Katil',
            'zone_id'=>'1'
        ]);

        Office::create([
            'name'=>'BBP Jasin',
            'zone_id'=>'1'
        ]);

        Office::create([
            'name'=>'BBP Merlimau',
            'zone_id'=>'1'
        ]);

        Office::create([
            'name'=>'BBP Tangga Batu',
            'zone_id'=>'1'
        ]);

        Office::create([
            'name'=>'BBP Jasin Bestari',
            'zone_id'=>'1'
        ]);

        Office::create([
            'name'=>'BBP Alor Gajah',
            'zone_id'=>'2'
        ]);

        Office::create([
            'name'=>'BBP Masjid Tanah',
            'zone_id'=>'2'
        ]);
    }
}
