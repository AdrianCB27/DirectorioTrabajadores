<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrabajadorController extends Controller
{

    public function index()
    {
        $trabajadores=Trabajador::all();
        return view('trabajadores.index',compact('trabajadores'));
    }
    public function buscar(string $parametro){
        if($parametro == ''){
            $trabajadores = Trabajador::all();
            return view('trabajadores.index',compact('trabajadores'));
        }elseif(str_contains($parametro, 'mayor')){
            $trabajadores = Trabajador::where('mayor55',true)->get();
            return view('trabajadores.index',compact('trabajadores','parametro'));

        }
        elseif(str_contains($parametro, 'sustituto')){
            $trabajadores = Trabajador::where('sustituto',true)->get();
            return view('trabajadores.index',compact('trabajadores','parametro'));

        }
        else{
        
            $trabajadores = Trabajador::where('nombre', 'LIKE', "%{$parametro}%")->
            orWhere('apellidos', 'LIKE', "%{$parametro}%")->
            orWhere('departamento', 'LIKE', "%{$parametro}%")->
            orWhere('cargos', 'LIKE', "%{$parametro}%")->get();
            return view('trabajadores.index',compact('trabajadores','parametro'));
        }
    }


    public function create()
    {
        return view('trabajadores.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:trabajadores,email',  
            'telefono' => 'required|regex:/^\d{9}$/',
            'fecha_nacimiento' => 'required|date',
            'departamento' => 'required|string',
            'cargos' => 'nullable|array',  
            'cargos.*' => 'in:reclutar,desarrollo,administracion,limpieza',  
            'mayor' => 'nullable|boolean',
            'sustituto' => 'nullable|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        if ($request->hasFile('foto')) {
            $path = Storage::disk('public')->put('', $request->file('foto'));
            $validated['foto'] = $path; 
        }
    
        $trabajador = Trabajador::create([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'departamento' => $validated['departamento'],
            'cargos' => $validated['cargos'] ?? [],
            'mayor55' => $validated['mayor'] ?? false,
            'sustituto' => $validated['sustituto'] ?? false,
            'foto' => $validated['foto'] ?? null,  
        ]);
    
        return redirect()->route('trabajadores.index');
    }
    


    public function show(int $id)
    {
        $trabajador=Trabajador::findOrFail($id);
        return view('trabajadores.show',compact('trabajador'));
    }

 
    public function edit(int $id)
    {
        $trabajador=Trabajador::findOrFail($id);
        return view('trabajadores.edit',compact('trabajador'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required',
            'telefono' => 'required|regex:/^\d{9}$/', 
            'fecha_nacimiento' => 'required|date',
            'departamento' => 'required|string',
            'cargos' => 'nullable|array',  
            'cargos.*' => 'in:reclutar,desarrollo,administracion,limpieza',  
            'mayor' => 'nullable|boolean',
            'sustituto' => 'nullable|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $trabajador = Trabajador::findOrFail($id);
    
        if ($request->hasFile('foto')) {
            if ($trabajador->foto) {
                Storage::disk('public')->delete($trabajador->foto);
            }
    
            $path = Storage::disk('public')->put('', $request->file('foto'));
            $validated['foto'] = $path; 
        } else {
            $validated['foto'] = $trabajador->foto;
        }
    
        $trabajador->update([
            'nombre' => $validated['nombre'],
            'apellidos' => $validated['apellidos'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'departamento' => $validated['departamento'],
            'cargos' => $validated['cargos'] ?? [],
            'mayor55' => $validated['mayor'] ?? false,
            'sustituto' => $validated['sustituto'] ?? false,
            'foto' => $validated['foto'],  
        ]);
    
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador actualizado correctamente.');
    }
    


    public function destroy(int $id)
    {
        $trabajador=Trabajador::findOrFail($id);
        Storage::disk('public')->delete($trabajador->foto);
        $trabajador->delete();
        return redirect()->route('trabajadores.index');
    }
}
