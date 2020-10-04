<?php

namespace App\Imports;

use App\Models\Office;
use App\Models\ServiceHistory;
use App\Models\Vehicle;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ServiceHistoriesImport implements ToModel, WithEvents, WithStartRow
{
    public $no_kenderaan;

    public function model(array $collection)
    {
        $vehicle_id = Vehicle::where('no_kenderaan',trim($this->no_kenderaan))->pluck('id')->first();

        if (!isset($collection[0]) || $vehicle_id == NULL) {
            return null;
        }

        ServiceHistory::firstOrCreate(
            ['tarikh' => Carbon::parse(Date::excelToDateTimeObject($collection[0]))],
            [
                'vehicle_id' => $vehicle_id,
                'tarikh' => Carbon::parse(Date::excelToDateTimeObject($collection[0])),
                'status' => 'Resolved',
                'servis' => ($collection[1] == '/') ? 1 : NULL,
                'enjin' => ($collection[2] == '/') ? 1 : NULL,
                'brek' => ($collection[3] == '/') ? 1 : NULL,
                'transmisi' => ($collection[4] == '/') ? 1 : NULL,
                'steering' => ($collection[5] == '/') ? 1 : NULL,
                'suspension' => ($collection[6] == '/') ? 1 : NULL,
                'casis' => ($collection[7] == '/') ? 1 : NULL,
                'pam_jentera' => ($collection[8] == '/') ? 1 : NULL,
                'kos' => $collection[9],
            ]
        );
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
                $this->no_kenderaan = $event->getSheet()->getTitle();
            }
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
