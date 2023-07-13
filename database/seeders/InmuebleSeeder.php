<?php

namespace Database\Seeders;

use App\Models\Inmueble;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'tamano' => 120,
                'coordenada' => "-17.752781577337004, -63.177066606387434",
                'direccion' => "Barrio El Palmar",
                'precio' => 100000,
                'razon' => "venta",
                'descripcion' => "Casa en Venta",
                'id_propietario' => 4,
                'id_asesor' => 4,
            ),
            array(
                'tamano' => 100,
                'coordenada' => "-17.72743929430809, -63.16693858528513",
                'direccion' => "Barrio Urbari",
                'precio' => 12000,
                'razon' => "venta",
                'descripcion' => "Casa en Venta",
                'id_propietario' => 5,
                'id_asesor' => null,
            ),
            array(
                'tamano' => 200,
                'coordenada' => "-17.72743929430809, -63.16693858528513",
                'direccion' => "Barrio ZA",
                'precio' => 22000,
                'razon' => "venta",
                'descripcion' => "Casita en Venta",
                'id_propietario' => 4,
                'id_asesor' => null,
            ),
        ];

        foreach ($data as $item) {
            Inmueble::create($item);
        }
    }
}
