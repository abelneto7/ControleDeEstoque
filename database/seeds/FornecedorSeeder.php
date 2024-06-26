<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //3 formas

        //Instanciando um objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'Fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor1.com.br';
        $fornecedor->save();

        //metodo create (nao esqueça do fillable)
        Fornecedor::create([
            'nome' => 'Fornecedor 2',
            'site' => 'Fornecedor2.com.br',
            'uf' => 'SE',
            'email' => 'contato@Fornecedor200.com.br'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 3',
            'site' => 'Fornecedor3.com.br',
            'uf' => 'RS',
            'email' => 'contato@Fornecedor3.com.br'
        ]);

        /*
         * Configurar database seeder
         *
         * $this->call(FornecedorSeeder::class);
         *
         * php artisan db:seed
         * */
    }
}
