<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Parte;
use App\Models\Trabajador;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function createRol()
    {
        $roles = Role::all();
        $permissions = ModelsPermission::all();
        return view('admin.roles.nuevo', compact('roles', 'permissions'));
    }

    public function prueba()
    {
        // return  view('admin.prueba');
        return "Funciona we";
    }

    public function dashboard()
    {
        $totalUsuarios = User::count();
        $partesPendientes = Parte::count();
        $ingresosMensuales = Trabajador::count();
        $clientes = Cliente::count();
        $usuarios = User::all();

        return view('admin.dashboard', compact('totalUsuarios', 'partesPendientes', 'ingresosMensuales', 'clientes', 'usuarios'));
    }

    public function calendarioEventos()
    {
        $eventos = Parte::all()->map(function ($parte) {
            return [
                'title' => 'Parte #' . $parte->id,
                'start' => $parte->fecha_inicio,
                'end' => $parte->fecha_fin
            ];
        });

        return response()->json($eventos);
    }
    public function createUsuario()
    {
        return view('admin.usuarios.nuevo');
    }

    public function storeUsuario(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Aquí podrías asignar el rol al usuario si tienes un sistema de roles
        // Ejemplo: $user->assignRole($request->role);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function indexUsuarios()
    {
        $usuarios = User::with('roles')->get();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function updateUsuarios(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function editUsuarios($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function destroyUsuarios($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }




    public function indexRoles()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }
}
