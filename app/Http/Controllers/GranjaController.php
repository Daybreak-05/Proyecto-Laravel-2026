<?php 
namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Especie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class GranjaController extends Controller 
{
    public function index() {
        $animales = Animal::all();
        $popular = Animal::orderBy('cantidad', 'desc')->first();
        $reciente = Cookie::get('ultimo_animal'); // Leer cookie

        return view('listado', compact('animales', 'popular', 'reciente'));
    }

    public function sumar(Request $request) {
        $animal = Animal::findOrFail($request->id); //Find or Fail -> si no encuentra tira error
        $animal->increment('cantidad', $request->add);
        
        return redirect()->route('animal.index')->cookie('ultimo_animal', $animal->especie, 4*(7*24*60*60));
    }

    public function create() {
        $especies = Especie::orderBy('nombre')->get();
        $reciente = Cookie::get('ultimo_animal');
        return view('añadir', compact('especies', 'reciente'));
    }

    public function store(Request $request) {

        //Para no duplicar busca por nombre de especie
        $animal = Animal::where('especie', $request->especie)->first();

        if ($animal) {
            $animal->increment('cantidad', $request->cantidad);
            $animal->update(['comida' => $request->comida]);
        } else {
            Animal::create($request->all());
        }

        return redirect()->route('animal.index')
            ->cookie('ultimo_animal', $request->especie, 1440);
    }

    public function buscar(Request $request) {
        $filter = $request->query('filter', '');
        $animales = Animal::where('especie', 'like', "%$filter%")->get();
        $dump = $animales->map(fn($a) => "{$a->especie},{$a->cantidad}")->implode(';');

        return view('consultar', compact('animales', 'filter', 'dump'));
    }

    public function volcar(Request $request) {
        $nombre = date("Y-m-d-H-i") . ".csv";
        $contenido = "Especie,Cantidad\n" . str_replace(';', "\n", $request->dump);
        
        Storage::disk('local')->put($nombre, $contenido);   //app / storage / app / private

        return view('confirmacion', ['fichero' => $nombre]);
    }

    public function AbrirNav($fichero) {
        if (!Storage::disk('local')->exists($fichero)) abort(404);
        return response(Storage::disk('local')->get($fichero))->header('Content-Type', 'text/plain');
    }
}
?>