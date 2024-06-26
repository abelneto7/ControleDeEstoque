<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Teste Marata';
        $user->email = 'teste@marata.com.br';
        $user->password = '1234';
        $user->save();
    }
}
