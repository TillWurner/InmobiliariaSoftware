<?php

namespace Database\Seeders;

use App\Models\Transaccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array('interesado' => "Alberto", 'fecha' => "2023-01-29", 'id_inmueble' => 1),
            array('interesado' => "Julia", 'fecha' => "2023-02-15", 'id_inmueble' => 2),
            array('interesado' => "Rodrigo", 'fecha' => "2023-03-07", 'id_inmueble' => 3),
        ];

        Transaccion::insert($data);
    }
}
