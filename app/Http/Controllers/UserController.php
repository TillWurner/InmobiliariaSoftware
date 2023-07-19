<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function asesores()
    {
        $asesores = User::where('tipo', 'Asesor')->get();
        return view('asesor.index', ['asesores' => $asesores]);
    }

    public function registrarAsesor(Request $request)
    {
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $carnet = $request->input('carnet');
        $codigo = $request->input('codigo');
        $password = $request->input('password');

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-asesores'), $fotoNombre);
        } else {
            $fotoNombre = null;
        }

        $asesor = new User();
        $asesor->nombre = $nombre;
        $asesor->email = $email;
        $asesor->telefono = $telefono;
        $asesor->carnet = $carnet;
        $asesor->codigo = $codigo;
        $asesor->foto = $fotoNombre;
        $asesor->password = bcrypt($password);
        $asesor->tipo = "User";
        $asesor->save();
        $rolAsesor = Role::where('name', 'asesor')->first();
        $asesor->assignRole($rolAsesor);

        return back();
    }

    public function modificarAsesor(Request $request)
    {
        $id = $request->route('id'); // Obtener el ID del asesor de la ruta
        $asesor = User::find($id);

        if ($asesor) {
            $asesor->nombre = $request->input('nombre');
            $asesor->email = $request->input('email');
            $asesor->telefono = $request->input('telefono');
            $asesor->carnet = $request->input('carnet');
            $asesor->codigo = $request->input('codigo');
            $asesor->password = $request->input('password');

            if ($request->hasFile('foto')) {
                // Obtener la foto anterior del asesor
                $fotoAnterior = $asesor->foto;

                // Guardar la nueva foto
                $foto = $request->file('foto');
                $fotoNombre = $foto->getClientOriginalName();
                $foto->move(public_path('fotos/fotos-asesores'), $fotoNombre);

                // Actualizar el campo 'foto' del asesor con el nombre de la nueva foto
                $asesor->foto = $fotoNombre;

                // Eliminar la foto anterior si existe
                if ($fotoAnterior) {
                    Storage::delete('fotos/fotos-asesores/' . $fotoAnterior);
                }
            }

            $asesor->save();
        }

        return back();
    }

    public function eliminarAsesor($id)
    {
        $asesor = User::findOrFail($id);
        Storage::delete('fotos/fotos-asesores/' . $asesor->foto);
        $asesor->delete();
        return back();
    }

    public function buscarAsesores(Request $request)
    {
        $searchTerm = $request->input('search');

        $asesores = User::where('nombre', 'LIKE', '%' . $searchTerm . '%')
            ->where('tipo', 'Asesor')
            ->get();

        return response()->json($asesores);
    }

    public function gerentes()
    {
        $gerentes = User::where('tipo', 'Gerente')->get();
        return view('Gerente.index', ['gerentes' => $gerentes]);
    }

    public function perfil()
    {
        return view('Gerente.profile');
    }

    public function registrarGerente(Request $request)
    {
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $carnet = $request->input('carnet');
        $password = $request->input('contrasena');

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-gerentes'), $fotoNombre);
        } else {
            $fotoNombre = null;
        }

        $gerente = new User();
        $gerente->nombre = $nombre;
        $gerente->telefono = $telefono;
        $gerente->email = $correo;
        $gerente->carnet = $carnet;
        $gerente->password = $password;
        $gerente->foto = $fotoNombre;
        $gerente->tipo = "Gerente";
        $gerente->codigo = Str::random(4);
        $gerente->save();
        $rolGerente = Role::where('name', 'gerente')->first();
        $gerente->assignRole($rolGerente);

        return back();
    }

    public function modificarGerente(Request $request)
    {

        $id = $request->route('id'); // Obtener el ID del asesor de la ruta
        $gerente = User::find($id);

        $gerente->nombre = $request->input('nombre');
        $gerente->telefono = $request->input('telefono');
        $gerente->correo = $request->input('correo');
        $gerente->carnet = $request->input('carnet');

        if ($request->hasFile('foto')) {
            // Obtener la foto anterior del gerente
            $fotoAnterior = $gerente->foto;

            // Guardar la nueva foto
            $foto = $request->file('foto');
            $fotoNombre = $foto->getClientOriginalName();
            $foto->move(public_path('fotos/fotos-gerentes'), $fotoNombre);
            // Actualizar el campo 'foto' del gerente con el nombre de la nueva foto
            $gerente->foto = $fotoNombre;

            // Eliminar la foto anterior si existe
            if ($fotoAnterior) {
                Storage::delete('public/fotos-gerentes/' . $fotoAnterior);
            }
        }

        $gerente->save();

        return back();
    }

    public function eliminarGerente($id)
    {
        $gerente = User::findOrFail($id);
        Storage::delete('fotos/fotos-gerentes/' . $gerente->foto);
        $gerente->delete();
        return back();
    }

    public function json()
    {
        $gerentes = User::where('tipo', 'Gerente')->get();
        return response()->json($gerentes);
    }

    public function buscar($id)
    {
        $asesor = User::find($id);

        if ($asesor) {
            return response()->json($asesor);
        } else {
            return response()->json(['error' => 'Propietario no encontrado'], 404);
        }
    }
}
