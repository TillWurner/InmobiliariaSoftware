<?php

namespace Database\Seeders;

use App\Models\Imagen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['imagen' => "inmueble1_principal.jpg", 'descripcion' => "Principal", 'destacado' => true, 'inmueble_id' => 1],
            ['imagen' => "inmueble1_cocina.jpg", 'descripcion' => "Cocina", 'destacado' => false, 'inmueble_id' => 1],
            ['imagen' => "inmueble1_patio.jpg", 'descripcion' => "Patio", 'destacado' => false, 'inmueble_id' => 1],
            ['imagen' => "inmueble1_sala.jpg", 'descripcion' => "Sala", 'destacado' => false, 'inmueble_id' => 1],
            ['imagen' => "inmueble2_principal.jpg", 'descripcion' => "Principal", 'destacado' => true, 'inmueble_id' => 2],
            ['imagen' => "inmueble2_cocina.jpg", 'descripcion' => "Cocina", 'destacado' => false, 'inmueble_id' => 2],
            ['imagen' => "inmueble2_habitacion.jpg", 'descripcion' => "Habitacion", 'destacado' => false, 'inmueble_id' => 2],
            ['imagen' => "inmueble3_principal.jpg", 'descripcion' => "Principal", 'destacado' => true, 'inmueble_id' => 3],
            ['imagen' => "inmueble3_cocina.jpg", 'descripcion' => "Cocina", 'destacado' => false, 'inmueble_id' => 3],
            ['imagen' => "inmueble3_habitacion.jpg", 'descripcion' => "Habitacion", 'destacado' => false, 'inmueble_id' => 3],
            ['imagen' => "inmueble3_bano.jpg", 'descripcion' => "Baño", 'destacado' => false, 'inmueble_id' => 3],

        ];

        Imagen::insert($data);
    }
}
