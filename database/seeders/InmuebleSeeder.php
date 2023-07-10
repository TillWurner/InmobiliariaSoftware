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
                'tamano' => 200,'coordenada' => "-17.80672415862562, -63.20041255375593", 'direccion' => "Barrio Equipetrol", 'precio' => 200000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 1,
                'id_asesor' => 1,
            ),
            array(
                'tamano' => 180,'coordenada' => "-17.756868706798837, -63.22169856414978", 'direccion' => "Barrio El Cambodromo", 'precio' => 180000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 2,
                'id_asesor' => 2,
            ),
            array(
                'tamano' => 150,'coordenada' => "-17.77599522948509, -63.14342097695817", 'direccion' => "Barrio Plan 3000", 'precio' => 15000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 3,
                'id_asesor' => 3,
            ),
            array(
                'tamano' => 120,'coordenada' => "-17.752781577337004, -63.177066606387434", 'direccion' => "Barrio El Palmar", 'precio' => 100000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 4,
                'id_asesor' => null,
            ),
            array(
                'tamano' => 100,'coordenada' => "-17.72743929430809, -63.16693858528513", 'direccion' => "Barrio Urbari", 'precio' => 12000,
                'razon' => "venta", 'descripcion' => "Casa en Venta", 'id_propietario' => 5,
                'id_asesor' => null,
            ),
        ];

        Inmueble::insert($data);
    }
}
