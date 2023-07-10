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
            ['nombre' => "Carmen",'foto' => "asesora1.jpg", 'correo' => "carmen@gmail.com", 'telefono' => 78946511, 'carnet' => "32024001", 'codigo' => "001"],
            ['nombre' => "Pedro",'foto' => null, 'correo' => "pedro@gmail.com", 'telefono' => 78946512, 'carnet' => "32024002", 'codigo' => "002"],
            ['nombre' => "Joaquin",'foto' => null, 'correo' => "joaquin@gmail.com", 'telefono' => 78946513, 'carnet' => "32024003", 'codigo' => "003"],
            ['nombre' => "Jesus",'foto' => null, 'correo' => "jesus@gmail.com", 'telefono' => 78946514, 'carnet' => "32024004", 'codigo' => "004"],
            ['nombre' => "Maria",'foto' => null, 'correo' => "maria@gmail.com", 'telefono' => 78946515, 'carnet' => "32024005", 'codigo' => "005"],
            ['nombre' => "Luisa",'foto' => null, 'correo' => "luisa@gmail.com", 'telefono' => 78946516, 'carnet' => "32024006", 'codigo' => "006"],
        ];

        Asesor::insert($data);
    }
}
