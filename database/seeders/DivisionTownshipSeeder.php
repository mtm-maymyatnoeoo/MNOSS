<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DivisionTownship;
use Illuminate\Support\Facades\DB;

class DivisionTownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // PostgreSQL-safe truncate
        DB::statement('TRUNCATE TABLE division_township RESTART IDENTITY CASCADE');

        $filePath = storage_path('app/seeders/'.'divisionTownship.csv');

        if (!file_exists($filePath)) {
            $this->command->error('DivisionTownship.csv not found');
            return;
        }

        $csvData = [];
        $skipFirstRow = true;

        if (($handle = fopen($filePath, 'r')) !== false) {

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {

                if ($skipFirstRow) {
                    $skipFirstRow = false;
                    continue;
                }

                $csvData[] = [
                    // 'id' => $data[0],
                    'division_code' => $data[0],
                    'township_code' => $data[1],
                ];
            }

            fclose($handle);
        }

        foreach (array_chunk($csvData, 1000) as $chunk) {
            DivisionTownship::insert($chunk);
        }
    }
}
