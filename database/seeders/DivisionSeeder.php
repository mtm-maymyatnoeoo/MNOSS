<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    public function run()
    {
        // PostgreSQL-safe truncate
        DB::statement('TRUNCATE TABLE division RESTART IDENTITY CASCADE');

        $filePath = database_path('seeders/seed_files/division.csv');


        if (!file_exists($filePath)) {
            $this->command->error('Division.csv not found');
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
                    'name' => $data[1],
                    'name_mm' => $data[2] ?: null,
                    'remark' => $data[3] ?: null,
                ];
            }

            fclose($handle);
        }

        foreach (array_chunk($csvData, 1000) as $chunk) {
            Division::insert($chunk);
        }
    }
}
