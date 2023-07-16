<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['foto' => null, 'nombre' => 'Administrador', 'telefono' => 66666666, 'tipo' => 'Administrador', 'carnet' => '8888888', 'codigo' => '001Adm', 'email' => 'admin@gmail.com', 'password' => bcrypt('adminadmin')],
            ['foto' => "Kevin.jpeg", 'nombre' => 'Kevin Paz', 'telefono' => 68796463, 'tipo' => 'Gerente', 'carnet' => '8883471', 'codigo' => '001G', 'email' => 'kevin@gmail.com', 'password' => bcrypt('123123123')],
            ['foto' => "Jose.jpeg", 'nombre' => 'Jose Gonzales', 'telefono' => 72023117, 'tipo' => 'Asesor', 'carnet' => '3840711', 'codigo' => '001A', 'email' => 'jose@gmail.com', 'password' => bcrypt('123123123')],
            ['foto' => "asesor1.jpg", 'nombre' => 'Pedro Montiel',  'telefono' => 78946512, 'tipo' => 'Asesor', 'carnet' => '32024002', 'codigo' => '002A', 'email' => 'pedro@gmail.com', 'password' => bcrypt('123123123')],
            ['foto' => "asesora1.jpg", 'nombre' => 'Juana Perez', 'telefono' => 78946513, 'tipo' => 'Asesor', 'carnet' => '32024003', 'codigo' => '003A', 'email' => 'joaquin@gmail.com', 'password' => bcrypt('123123123')]
        ];

        User::insert($data);

        $admin = User::where('tipo', 'Administrador')->first();
        $gerente = User::where('tipo', 'Gerente')->first();
        $asesores = User::where('tipo', 'Asesor')->get();

        $rolAdmin = Role::findByName('admin');
        $rolGerente = Role::findByName('gerente');
        $rolAsesor = Role::findByName('asesor');

        $admin->assignRole($rolAdmin);
        $gerente->assignRole($rolGerente);
        foreach ($asesores as $asesor) {
            $asesor->assignRole($rolAsesor);
        }
    }
}
