<?php

namespace Database\Seeders;

use App\Models\Gerente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GerenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre' => "Jose",
                'foto' => "WhatsApp Image 2023-06-19 at 05.16.52.jpeg",
                'telefono' => 69180490,
                'correo' => "jose@gmail.com",
                'password' => "123456789",
                'carnet' => "11302099"
            ],
        ];

        Gerente::insert($data);
    }
}
