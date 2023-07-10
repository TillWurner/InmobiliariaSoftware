<?php

namespace Database\Seeders;

use App\Models\Propietario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => "Daniel",'foto' => "propietario1.jpg", 'carnet' => "32024001", 'telefono' => 78946511],
            ['nombre' => "Juan",'foto' => null, 'carnet' => "32024002", 'telefono' => 78946512],
            ['nombre' => "Carlos",'foto' => null, 'carnet' => "32024003", 'telefono' => 78946513,],
            ['nombre' => "Ezequiel",'foto' => null, 'carnet' => "32024004", 'telefono' => 78946514],
            ['nombre' => "Mario",'foto' => null, 'carnet' => "32024005", 'telefono' => 78946515],
        ];

        Propietario::insert($data);
    }
}
