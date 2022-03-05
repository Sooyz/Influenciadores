<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(public_path() . '\data\users.json');
        $users = json_decode($json);

        foreach ($users->users as $key => $value){
            User::create([
                "name" => $value->nome,
                "cpf"=> $value->cpf,
                "user" => $value->usuario,
                "dt_born" => $value->data_nasc,
                "social_id" => "1",
                "profile" => $value->perfil,
                "password" => bcrypt('12345')
            ]);
        }
    }
}
