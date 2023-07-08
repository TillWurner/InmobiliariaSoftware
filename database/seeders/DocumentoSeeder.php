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
                'fecha' => "2023-05-10",
            ],
            [
                'descripcion' => "Mapeo",
                'id_inmueble' => "1",
                'fecha' => "2023-07-08",
            ],
            [
                'descripcion' => "Croquis",
                'id_inmueble' => "2",
                'fecha' => "2023-06-10"
            ],
        ];

        Documento::insert($data);
        
    }
}
