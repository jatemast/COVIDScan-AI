<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Consultas;
 

class HistoriasController extends Controller




{      public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_paciente' => 'required|string|max:255',
            'cedula_identidad' => 'required|string|max:255',
            'probabilidad_covid' => 'required|string|max:255', // Cambio en la validación
            'recomendaciones' => 'nullable|string',
            // Validar otros campos según tus necesidades
        ]);

        // Convertir la probabilidad de formato porcentual a decimal
        $probabilidadCovid = floatval(str_replace('%', '', $validatedData['probabilidad_covid'])) / 100;

        // Asignar el valor convertido al array validado
        $validatedData['probabilidad_covid'] = $probabilidadCovid;

        // Crear la nueva consulta
        Consultas::create($validatedData);

        // Redireccionar a la ruta de historias clínicas
        return redirect()->route('historias.medicas');
    }



    public function showHistorial()
    {
        // Obtener todas las consultas
        $consultas = Consultas::all();
        
        // Retornar la vista con los datos del historial de consultas
        return view('historias', compact('consultas'));
    }
    public function buscarPorCedula($cedula)
{
    // Buscar consultas por cédula
    $consultas = Consultas::where('cedula_identidad', $cedula)->get();
    
    // Retornar la vista con los datos del historial de consultas filtrado por cédula
    return view('historias', compact('consultas'));

}
    

}
