<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use Illuminate\Database\Seeder;

class RedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(public_path(). '\data\redes.json');
        $social = json_decode($json);

        foreach ($social->social_networks as $key => $value)
        {
            SocialNetwork::create([
                "name" => $value->nome
            ]);
        }
    }
}
