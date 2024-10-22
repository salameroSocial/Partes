<?php

namespace App\Exports;

use App\Models\Parte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PartesExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Parte::query();

        // Aplicar filtros dinámicos
        if (!empty($this->filters)) {
            foreach ($this->filters as $field => $value) {
                if ($field == 'date_from' && !empty($value)) {
                    $query->whereDate('fecha', '>=', $value);
                } elseif ($field == 'date_to' && !empty($value)) {
                    $query->whereDate('fecha', '<=', $value);
                } elseif (!empty($value)) {
                    $query->where($field, 'LIKE', "%$value%");
                }
            }
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Cliente',
            'Cliente ID',
            'Fecha',
            'Departamento',
            'Hora de Llegada',
            'Hora de Salida',
            'Horas Totales',
            'Trabajos Realizados',
            'Realizado por',
            'Trabajador',
            'Revisado por',
            'Desplazamiento',
            'Kilometraje',
            'Días',
            'Maquinaria',
            'Nombre de la Maquinaria',
            'Horas de Maquinaria',
            'Observaciones de Maquinaria',
            'Estado del Trabajador',
            'Detalles Otros',
            'Fecha parte introducido',
            'Fecha parte editado',
        ];
    }
}
