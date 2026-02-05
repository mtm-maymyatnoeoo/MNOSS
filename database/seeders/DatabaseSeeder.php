<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        info('Database seeding started.');
        $seeders = [
            'userInfo' => ['class' => UserSeeder::class, 'table' => 'user_infos'],
            'division' => ['class' => DivisionSeeder::class, 'table' => 'division'],
            'divisionTownship' => ['class' => DivisionTownshipSeeder::class, 'table' => 'division_township'],
            // 'Feature' => ['class' => FeatureSeeder::class, 'table' => 'feature'],
            'township' => ['class' => TownshipSeeder::class, 'table' => 'township'],
        ];

        Schema::disableForeignKeyConstraints();
        $path = storage_path('app/seeders');

        $files = File::files($path);

        foreach ($files as $file) {
            $name = explode('.',explode('\\',explode('/', $file)[1])[1])[0];
           

            if (!array_key_exists($name, $seeders)) {
                continue;
            }

            $modifiedTime = DB::table('modified_csvs_time')->where('name', $name)->first();
            $time = $file->getMTime();

            if ($modifiedTime && $modifiedTime->time == $time) {
                continue;
            }

            DB::beginTransaction();

            try {
                DB::table('modified_csvs_time')->updateOrInsert(
                    ['name' => $name],
                    ['time' => $time]
                );
                $this->call($seeders[$name]['class']);
                DB::commit();

                // For auto increment update
                // if (isset($seeders[$name]['table'])) {
                //     $tableName = $seeders[$name]['table'];
                //     $maxId = DB::table($tableName)->max('id');
                //     $nextId = ($maxId ?? 0) + 1;

                //     DB::statement("ALTER TABLE $tableName AUTO_INCREMENT = $nextId;");
                // }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
