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
                'fecha' => "2023-05-10",
                'archivo' => "64a9b4e814b6f.pdf",
                'id_inmueble' => "1",
            ],
            [
                'descripcion' => "Mapeo",
                'fecha' => "2023-05-10",
                'archivo' => "64a9b4e814b6f.pdf",
                'id_inmueble' => "1",
            ],
            [
                'descripcion' => "Croquis",
                'fecha' => "2023-05-10",
                'archivo' => "64a9b4e814b6f.pdf",
                'id_inmueble' => "2",
            ]
        ];

        Documento::insert($data);
        
    }
}
