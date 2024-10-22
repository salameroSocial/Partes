<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Trabajador;
use App\Models\Parte;
use Illuminate\Http\Request;
use App\Exports\PartesExport;
use App\Models\Field;
use App\Models\ParteField;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PartesTrabajo extends Controller
{
    public function index()
    {
        $partes = Parte::with('trabajador')->get(); // 'trabajador' es el nombre de la relación definida en el modelo Parte
        return view('partes.index', compact('partes'));
    }
    public function mostrarVista()
    {
        $clientes = Cliente::all();
        $departamentos = Departamento::all();
        $trabajadores = Trabajador::all();

        return view('partes.sacarHoja', compact('clientes', 'departamentos', 'trabajadores'));
    }




    public function create()
    {

        $empleados = Trabajador::all();

        $clientes = Cliente::all(); // Obtener todos los clientes desde la base de datos
        $departamentos = Departamento::all(); // Obtener todos los clientes desde la base de datos

        $fields = Field::all(); // Obtener todos los campos desde la base de datos

        $clientes = Cliente::all(); // Obtener todos los clientes desde la base de datos
        $departamentos = Departamento::all(); // Obtener todos los clientes desde la base de datos

        return view('partes.nuevo', ['clientes' => $clientes, 'departamentos' => $departamentos, 'empleados' => $empleados, 'fields' => $fields]);
    }

    public function store(Request $request)
    {
        // Ver todos los datos recibidos del formulario
        // dd($request->all());

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'cliente' => 'required|string',
            'fecha' => 'required|date',
            'departamento' => 'nullable|string',
            'hora_llegada' => 'nullable|date_format:H:i',
            'hora_salida' => 'nullable|date_format:H:i',
            'horas_totales' => 'nullable|numeric',
            'trabajos_realizados' => 'nullable|string',
            'realizado_por' => 'nullable|string',
            'revisado_por' => 'nullable|string',
            'desplazamiento' => 'nullable|boolean',
            'kilometraje' => 'nullable|integer',
            'dias' => 'nullable|integer',
            'maquinaria' => 'nullable|boolean',
            'nombre_maquinaria' => 'nullable|string',
            'horas_maquinaria' => 'nullable|integer',
            'observaciones_maquinaria' => 'nullable|string',
            'estado_trabajador' => 'nullable|string',
            'detalles_otros' => 'nullable|string',
        ]);

        // Codigo para si esta mandado el nuevo cliente en el parte se guarde en bd 
        if ($request->cliente === 'clienteNuevo' && $request->has('cliente_nombre')) {
            $nuevoCliente = new Cliente();
            $nuevoCliente->nombre = $request->cliente_nombre;
            $nuevoCliente->save();

            // Ahora puedes usar $nuevoCliente->id como el ID del cliente para la nueva entrada en la tabla Parte.
            $validatedData['cliente'] = $nuevoCliente->id;
        }


        // Crear un nuevo Parte con los datos validados
        $parte = Parte::create($validatedData);

        $cliente = Cliente::where('nombre', $request->cliente)->first();

        // Verifica si se encontró el cliente
        if ($cliente) {
            $parte->cliente_id = $cliente->id;
        } else {
            $parte->cliente_id = "0";
        }

        $correoUsuario = Auth::user()->email;

        $parte->subido_por = $correoUsuario;

        // Guardar campos dinámicos
        $fields = Field::all();
        foreach ($fields as $field) {
            if ($request->has($field->name)) {
                ParteField::create([
                    'parte_id' => $parte->id,
                    'field_name' => $field->name,
                    'field_value' => $request->input($field->name),
                ]);
            }
        }

        // Buscar el trabajador por ID y concatenar nombre y apellido
        $empleado = Trabajador::where('id', $request->realizado_por)->first();

        if ($empleado) {
            $parte->trabajador_id = $empleado->nombre . ' ' . $empleado->apellidos;
        } else {
            echo "No se ha encontrado el trabajador";
        }

        $parte->save();

        // Redireccionar a la vista correspondiente o mostrar un mensaje
        return redirect()->route('partes.index')->with('success', 'Parte creado correctamente.');
    }


    public function show($id)
    {
        $parte = Parte::with('fields')->findOrFail($id);

        return view('partes.show', compact('parte'));
    }


    public function edit($id)
    {

        $empleados = Trabajador::all();

        $clientes = Cliente::all(); // Obtener todos los clientes desde la base de datos
        $departamentos = Departamento::all(); // Obtener todos los clientes desde la base de datos

        $parte = Parte::with('trabajador')->findOrFail($id);
        return view('partes.edit', ['clientes' => $clientes, 'departamentos' => $departamentos, 'parte' => $parte, 'empleados' => $empleados]);
        // return view('partes.edit', compact('parte'));
    }

    public function borrar(Parte $parte)
    {
        // Aquí debes eliminar la parte específica de la base de datos
        $parte->delete();

        // Redirigir a alguna página después de la eliminación
        return redirect()->route('partes.index')->with('success', 'Parte eliminada exitosamente');
    }

    public function update(Request $request, Parte $parte)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'cliente' => 'nullable|string',
            'fecha' => 'nullable|date',
            'departamento' => 'nullable|string',
            'hora_llegada' => 'nullable',
            'hora_salida' => 'nullable',
            'horas_totales' => 'nullable|numeric',


            'trabajos_realizados' => 'nullable|string',
            'realizado_por' => 'nullable|string',
            'revisado_por' => 'nullable|string',
            'desplazamiento' => 'nullable|boolean',
            'kilometraje' => 'nullable|integer',
            'dias' => 'nullable|integer',
            // 
            'maquinaria' => 'nullable|boolean',
            'nombre_maquinaria' => 'nullable|string',
            'horas_maquinaria' => 'nullable|integer',
            'observaciones_maquinaria' => 'nullable|string',
            'estado_trabajador' => 'nullable|string',
            'detalles_otros' => 'nullable|string',
        ]);
        // dd($request->all());
        // Buscar el parte a actualizar
        $empleado = Trabajador::find($request->realizado_por);
        // dd($empleado->all());
        if ($empleado) {
            // $parte->trabajador_id = $empleado->nombre . ' ' . $empleado->apellidos;
            $parte->trabajador_id = $empleado->id;
        } else {
            $parte->trabajador_id = null; // o cualquier valor por defecto
        }

        // Actualizar el parte de trabajo con los datos recibidos del formulario
        $parte->update($validatedData);


        // Redirigir a una ruta específica después de la actualización
        return redirect()->route('partes.index')->with('success', 'Parte de trabajo actualizado correctamente');
    }

    public function destroy($id)
    {
        $parte = Parte::findOrFail($id);
        $parte->delete();
        return redirect()->route('partes.index');
    }

    // public function exportar(Request $request)
    // {
    //     $query = Parte::query();

    //     // Nombre del archivo base
    //     $nombreArchivo = 'Partes_' . date('Ymd') . '.xlsx';

    //     // Filtrar por cliente
    //     if ($request->filled('cliente_id')) {
    //         $query->where('cliente_id', $request->cliente_id);
    //         $cliente = Cliente::find($request->cliente_id);
    //         if ($cliente) {
    //             $nombreArchivo = 'Partes_' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $cliente->nombre) . '_' . date('Ymd') . '.xlsx';
    //         }
    //     }

    //     // Filtrar por trabajador
    //     if ($request->filled('empleado_id')) {
    //         $query->where('realizado_por', $request->empleado_id);
    //         $trabajador = Trabajador::find($request->empleado_id);
    //         if ($trabajador) {
    //             echo "Tira";
    //             $nombreArchivo = 'Partes_' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $trabajador->nombre) . '_' . date('Ymd') . '.xlsx';
    //         }
    //         echo "NO TIRA";
    //     }

    //     // Filtrar por rango de fechas
    //     if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
    //         $query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
    //         $nombreArchivo = 'Partes_' . date('Ymd') . '_de_' . $request->fecha_inicio . '_a_' . $request->fecha_fin . '.xlsx';
    //     }

    //     $partes = $query->get();

    //     return Excel::download(new PartesExport($partes), $nombreArchivo);

    //     // $request->validate(['id' => 'nullable']);

    //     // // Inicia la consulta
    //     // $query = Parte::query();

    //     // // Obtén los registros filtrados
    //     // if ($request->filled('id')) {
    //     //     $query->whereHas('cliente', function ($query) use ($request) {
    //     //         $query->where('id', $request->id);
    //     //     });
    //     // }

    //     // $partes = $query->get();

    //     // // Si no hay partes, posiblemente quieres manejar esto de otra manera
    //     // if ($partes->isEmpty()) {
    //     //     return redirect()->back()->with('error', 'No se encontraron partes para el cliente especificado.');
    //     // }

    //     // // Obtener el nombre del cliente para incluir en el nombre del archivo
    //     // $cliente = Cliente::find($request->id);
    //     // if (!$cliente) {
    //     //     return redirect()->back()->with('error', 'No se encontró el cliente especificado.');
    //     // }

    //     // // Crear un nombre de archivo que incluya el nombre del cliente
    //     // $nombreCliente = preg_replace('/[^A-Za-z0-9_\-]/', '_', $cliente->nombre); // Sanitiza el nombre del cliente para el nombre del archivo
    //     // $nombreArchivo = 'Partes_' . $nombreCliente . '_' . date('Ymd') . '.xlsx';

    //     // // Exporta los datos a un archivo Excel
    //     // return Excel::download(new PartesExport($partes), $nombreArchivo);
    // }

    public function showForm()
    {
        $clientes = Cliente::all();
        $departamentos = Departamento::all();
        $trabajadores = Trabajador::all();

        return view('export.form', compact('clientes', 'departamentos', 'trabajadores'));
    }

    public function export(Request $request)
    {
        $filters = $request->all();

        // Construir el nombre del archivo basado en los filtros
        $filename = 'partes_export';

        if ($request->filled('cliente')) {
            $filename .= '_cliente_' . str_replace(' ', '_', $request->cliente);
        }

        if ($request->filled('departamento')) {
            $filename .= '_departamento_' . str_replace(' ', '_', $request->departamento);
        }

        if ($request->filled('date_from')) {
            $filename .= '_desde_' . $request->date_from;
        }

        if ($request->filled('date_to')) {
            $filename .= '_hasta_' . $request->date_to;
        }

        // Agregar la fecha actual al nombre del archivo
        $filename .= '_' . now()->format('d_m_Y') . '.xlsx';

        return Excel::download(new PartesExport($filters), $filename);
    }

    public function preview(Request $request)
    {
        $query = Parte::query();

        // Aplicar filtros
        if ($request->filled('cliente')) {
            $query->where('cliente', 'LIKE', "%{$request->cliente}%");
        }
        if ($request->filled('departamento')) {
            $query->where('departamento', 'LIKE', "%{$request->departamento}%");
        }
        if ($request->filled('date_from')) {
            $query->whereDate('fecha', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('fecha', '<=', $request->date_to);
        }
        if ($request->filled('horas')) {
            $query->where('horas_totales', 'LIKE', "%{$request->horas}%");
        }
        if ($request->filled('realizado_por')) {
            $query->where('realizado_por', 'LIKE', "%{$request->realizado_por}%");
        }
        if ($request->filled('nombre_maquinaria')) {
            $query->where('nombre_maquinaria', 'LIKE', "%{$request->nombre_maquinaria}%");
        }
        if ($request->filled('estado_trabajador')) {
            $query->where('estado_trabajador', 'LIKE', "%{$request->estado_trabajador}%");
        }

        // dd($query->toSql(), $query->getBindings());

        $partes = $query->get();

        if ($partes->isEmpty()) {
            return response()->json(['message' => 'No se encontraron partes con los filtros seleccionados.'], 200);
        }

        return response()->json($partes);
    }
}
