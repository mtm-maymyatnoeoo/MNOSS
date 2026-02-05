<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // PostgreSQL-safe truncate
        DB::statement('TRUNCATE TABLE feature RESTART IDENTITY CASCADE');

        $filePath = database_path('seeders/seed_files/feature.csv');


        if (!file_exists($filePath)) {
            $this->command->error('Feature.csv not found');
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
                    'feature_name' => $data[0],
                    'description' => $data[1] ?: null,
                ];
            }

            fclose($handle);
        }

        foreach (array_chunk($csvData, 1000) as $chunk) {
            Feature::insert($chunk);
        }
    }
}
