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
                'descripcion' => "Croquis 1",
                'fecha' => "2023-05-10",
                'archivo' => "64b79e9462008.pdf",
                'id_inmueble' => "1",
            ],
            // [
            //     'descripcion' => "Croquis 2",
            //     'fecha' => "2023-07-08",
            //     'archivo' => "64acbfb586eb8.pdf",
            //     'id_inmueble' => "2",
            // ],
            // [
            //     'descripcion' => "Croquis 3",
            //     'fecha' => "2023-06-10",
            //     'archivo' => "64b05d017c55e.pdf",
            //     'id_inmueble' => "3",
            // ],
        ];

        Documento::insert($data);
    }
}
