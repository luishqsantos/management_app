<?php

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
        $this->call(ProviderSeeder::class);
        $this->call(SiteContactSeeder::class);
        $this->call(SiteReasonSeeder::class);
    }
}
