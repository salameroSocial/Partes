<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function asignarRol($userId, $rol)
    {
        // Encontramos el usuario
        $user = User::findOrFail($userId);

        // Asignamos el rol al usuario
        $user->assignRole($rol);

        return redirect()->back()->with('success', "El rol {$rol} ha sido asignado al usuario {$user->name}");
    }
}
