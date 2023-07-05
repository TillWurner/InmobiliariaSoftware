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
            array('nombre' => "Carmen", 'carnet' => "32024001", 'telefono' => 78946511),
            array('nombre' => "Pedro", 'carnet' => "32024002", 'telefono' => 78946512),
            array('nombre' => "Joaquin", 'carnet' => "32024003", 'telefono' => 78946513,),
            array('nombre' => "Jesus", 'carnet' => "32024004", 'telefono' => 78946514),
            array('nombre' => "Maria", 'carnet' => "32024005", 'telefono' => 78946515),
        ];

        Propietario::insert($data);
    }
}
