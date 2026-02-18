<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Animal;
use App\Models\Especie;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{

    public function volcar(Request $request) {
        $dump = $request->input('dump');
        $nombreFichero = "reporte_" . date("Y-m-d_H-i") . ".csv";
        $contenido = "Especie,Cantidad\n" . str_replace(";", "\n", $dump);

        Storage::disk('local')->put($nombreFichero, $contenido);

        return view('confirmacion', ['archivo' => $nombreFichero]);
    }

 
    public function AbrirNav($nombre) {
        if (Storage::disk('local')->exists($nombre)) {
            $contenido = Storage::disk('local')->get($nombre);
            
            return response($contenido)->header('Content-Type', 'text/plain');
        }
        return abort(404);
    }
}
