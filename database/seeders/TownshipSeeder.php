<?php

namespace Database\Seeders;

use App\Models\Township;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PostgreSQL-safe truncate
        DB::statement('TRUNCATE TABLE township RESTART IDENTITY CASCADE');

        $filePath = database_path('seeders/seed_files/township.csv');


        if (!file_exists($filePath)) {
            $this->command->error('Township.csv not found');
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
                    'township_code' => $data[0],
                    'short_name' => $data[1],
                    'long_name' => $data[2] ?: null,
                    'name_mm' => $data[3] ?: null,
                    'remark' => $data[4] ?: null,
                ];
            }

            fclose($handle);
        }

        foreach (array_chunk($csvData, 1000) as $chunk) {
            Township::insert($chunk);
        }
    }
}
