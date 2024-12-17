<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! File::exists(storage_path('/app/public/images/profile-pic'))) {
            File::makeDirectory(storage_path('/app/public/images/profile-pic'), 0755, true);
        }

        if (File::exists(storage_path('/app/public/images/profile-pic'))) {
            $asset = storage_path('/app/public/images/profile-pic');
            foreach (File::files($asset) as $file) {
                File::delete($file);
            }
        }

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            ReportSeeder::class,
            UserCategorySeeder::class,
        ]);
    }
}
