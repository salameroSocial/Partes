<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chartsController extends Controller
{
    public function index()
    {
        $labels = ['Enero', 'Febrero', 'Marzo', 'Abril'];
        $data = [10, 20, 30, 40];

        return view('charts.index', compact('labels', 'data'));
    }
}
