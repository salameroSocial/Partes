<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    public function index()
    {
        // Obtener todos los campos adicionales
        $fields = Field::all();
        return view('partes.admin', compact('fields'));
    }

    public function store(Request $request)
    {
        // Validar el campo
        $request->validate([
            'name' => 'required|string|max:255|unique:fields',
            'label' => 'required|string|max:255',
            'type' => 'required|string|in:text,number,date',
        ]);

        // Crear el nuevo campo
        Field::create($request->only(['name', 'label', 'type']));

        return redirect()->back()->with('success', 'Campo añadido correctamente.');
    }

    public function destroy($id)
    {
        // Eliminar el campo
        $field = Field::findOrFail($id);
        $field->delete();

        return redirect()->back()->with('success', 'Campo eliminado correctamente.');
    }
}
