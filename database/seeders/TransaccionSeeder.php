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
            array('interesado' => "Alberto", 'fecha' => "2023-01-29", 'inmueble_id' => 1),
            // array('interesado' => "Julia", 'fecha' => "2023-02-15", 'inmueble_id' => 2),
            // array('interesado' => "Rodrigo", 'fecha' => "2023-03-07", 'inmueble_id' => 3),
        ];

        Transaccion::insert($data);
    }
}
