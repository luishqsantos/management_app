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
        //É extremamente importante manter a ordem e os IDs para que não quebre a aplicação
        Reason::create([
            ['id' => 1, 'reason' => 'Dúvida'],
            ['id' => 2, 'reason' => 'Elogio'],
            ['id' => 3, 'reason' => 'Contato']
        ]);
    }
}
