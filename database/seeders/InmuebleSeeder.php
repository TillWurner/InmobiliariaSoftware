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
                'tamano' => 200, 'direccion' => "Barrio Equipetrol", 'precio' => 200000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 1
            ),
            array(
                'tamano' => 180, 'direccion' => "Barrio El Cambodromo", 'precio' => 180000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 2
            ),
            array(
                'tamano' => 150, 'direccion' => "Barrio Plan 3000", 'precio' => 15000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 3
            ),
            array(
                'tamano' => 120, 'direccion' => "Barrio El Palmar", 'precio' => 100000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 4
            ),
            array(
                'tamano' => 100, 'direccion' => "Barrio Urbari", 'precio' => 12000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 5
            ),
        ];

        Inmueble::insert($data);
    }
}
