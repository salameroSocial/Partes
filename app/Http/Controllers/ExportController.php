<?php

namespace App\Http\Controllers;

use App\Exports\partesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportParts()
    {
        // return Excel::download(new partesExport, 'partes.xlsx');
    }
    
}