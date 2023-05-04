<?php

use App\SiteContact;
use Illuminate\Database\Seeder;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SiteContact::class, 100)->create();
    }
}
