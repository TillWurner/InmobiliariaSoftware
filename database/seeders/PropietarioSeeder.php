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
            array('nombre' => "Daniel", 'carnet' => "32024001", 'telefono' => 78946511),
            array('nombre' => "Juan", 'carnet' => "32024002", 'telefono' => 78946512),
            array('nombre' => "Carlos", 'carnet' => "32024003", 'telefono' => 78946513,),
            array('nombre' => "Ezequiel", 'carnet' => "32024004", 'telefono' => 78946514),
            array('nombre' => "Mario", 'carnet' => "32024005", 'telefono' => 78946515),
        ];

        Propietario::insert($data);
    }
}
