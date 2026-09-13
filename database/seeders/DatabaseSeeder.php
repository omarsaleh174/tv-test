<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RolesAndpermissionsSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(PartsAboutSeeder::class);
        $this->call(PartsFeatureSeeder::class);
        $this->call(PartsFeatureSeeder::class);
        $this->call(PartsHomeSeeder::class);
        $this->call(PartStateSeeder::class);
        $this->call(PartAboutSeeder::class);
        $this->call(AboutUsPageSeeder::class);

        // \App\Models\Client::factory(100)->create();
        // \App\Models\Product::factory()->count(50)->create();
    }
}
