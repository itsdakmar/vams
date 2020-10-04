<?php

namespace App\Imports;

use App\Models\Office;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class VehicleInformationImport implements ToModel, WithStartRow
{

    /**
     * @param Collection $collection
     */
    public function model(array $collection)
    {
        if (!isset($collection[0])) {
            return null;
        }

        Vehicle::firstOrCreate(
            ['no_kenderaan' => $collection[7]],
            [
                'no_siri_b' => $collection[0],
                'no_enjin' => $collection[1],
                'no_casis' => $collection[2],
                'tarikh_pendaftaran' => Carbon::parse(Date::excelToDateTimeObject($collection[3])),
                'tarikh_perolehan' => Carbon::parse(Date::excelToDateTimeObject($collection[4])),
                'model' => $collection[5],
                'jenis' => $collection[6],
                'no_kenderaan' => $collection[7],
                'office_id' => Office::where('name', "like", "%" . $collection[8] . "%")->pluck('id')->first(),
                'no_fail' => $collection[9],
            ]
        );
    }

    public function startRow(): int
    {
        return 3;
    }
}
