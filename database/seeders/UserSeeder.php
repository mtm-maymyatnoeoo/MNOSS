<?php

namespace Database\Seeders;

use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PostgreSQL-safe truncate
        DB::statement('TRUNCATE TABLE user_infos RESTART IDENTITY CASCADE');

        $filePath = database_path('seeders/seed_files/user.csv');


        if (!file_exists($filePath)) {
            $this->command->error('UserInfo.csv not found');
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
                    'user_code' => $data[0],
                    'name' => $data[1],
                    'user_name' => $data[2] ?: null,
                    'password' => $data[3] ?: null,
                    'delete_flg' => $data[4] ?: null,
                    'is_active' => $data[5] ?: null,
                    'role' => $data[6] ?: null,
                ];
            }

            fclose($handle);
        }

        foreach (array_chunk($csvData, 1000) as $chunk) {
            UserInfo::insert($chunk);
        }
    }
}
