<?php

use Illuminate\Database\Seeder;
use App\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidade = new Unidade();
        $unidade->unidade = 'Kg';
        $unidade->descricao = 'KiloGramas';
        $unidade->save();
    }
}
