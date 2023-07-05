<?php

namespace Database\Seeders;

use App\Models\Asesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('nombre' => "Carmen", 'correo' => "carmen@gmail.com", 'telefono' => 78946511, 'carnet' => "32024001", 'codigo' => "001"),
            array('nombre' => "Pedro", 'correo' => "pedro@gmail.com", 'telefono' => 78946512, 'carnet' => "32024002", 'codigo' => "002"),
            array('nombre' => "Joaquin", 'correo' => "joaquin@gmail.com", 'telefono' => 78946513, 'carnet' => "32024003", 'codigo' => "003"),
            array('nombre' => "Jesus", 'correo' => "jesus@gmail.com", 'telefono' => 78946514, 'carnet' => "32024004", 'codigo' => "004"),
            array('nombre' => "Maria", 'correo' => "maria@gmail.com", 'telefono' => 78946515, 'carnet' => "32024005", 'codigo' => "005"),
            array('nombre' => "Luisa", 'correo' => "luisa@gmail.com", 'telefono' => 78946516, 'carnet' => "32024006", 'codigo' => "006"),
        ];

        Asesor::insert($data);
    }
}
