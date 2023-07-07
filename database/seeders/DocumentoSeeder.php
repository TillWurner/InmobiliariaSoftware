<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'descripcion' => "Croquis",
                'id_inmueble' => "1",
            ],
            [
                'descripcion' => "Mapeo",
                'id_inmueble' => "1",
            ],
            [
                'descripcion' => "Croquis",
                'id_inmueble' => "2",
            ],
        ];

        Documento::insert($data);
    }
}
