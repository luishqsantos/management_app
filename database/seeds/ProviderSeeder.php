<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'name'  => 'Fornecedor Z',
            'site'  => 'www.fornecedorz.com',
            'uf'    => 'AM',
            'email' => 'fornecedorz@hotmail.com'
        ]);
    }
}
