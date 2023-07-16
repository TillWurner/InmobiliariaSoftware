<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AsesorSeeder::class);
        $this->call(PropietarioSeeder::class);
        $this->call(GerenteSeeder::class);
        $this->call(InmuebleSeeder::class);
        $this->call(TransaccionSeeder::class);
        $this->call(ImagenSeeder::class);
        // $this->call(DocumentoSeeder::class);
    }
}
