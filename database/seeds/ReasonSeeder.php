<?php

use App\Reason;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reason::create(['reason' => 'Dúvida']);
        Reason::create(['reason' => 'Elogio']);
        Reason::create(['reason' => 'Contato']);
    }
}
