<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Consultas;

class ConsultaController extends Controller
{ public function showForm()
    {
        return view('consulta.form');
    }

    public function sendConsulta(Request $request)
    {
        // Obtener todos los datos del formulario excepto el nombre del paciente y la cédula
        $data = $request->except(['nombre_paciente', 'cedula_identidad']);

        // Separar los datos para la API y los datos para la vista
        $consultaData = [
            'tos' => isset($data['tos']) ? 1 : 0,
            'cefalea' => isset($data['cefalea']) ? 1 : 0,
            'congestion_nasal' => isset($data['congestion_nasal']) ? 1 : 0,
            'dificultad_respiratoria' => isset($data['dificultad_respiratoria']) ? 1 : 0,
            'dolor_garganta' => isset($data['dolor_garganta']) ? 1 : 0,
            'fiebre' => isset($data['fiebre']) ? 1 : 0,
            'diarrea' => isset($data['diarrea']) ? 1 : 0,
            'nauseas' => isset($data['nauseas']) ? 1 : 0,
            'anosmia_hiposmia' => isset($data['anosmia_hiposmia']) ? 1 : 0,
            'dolor_abdominal' => isset($data['dolor_abdominal']) ? 1 : 0,
            'dolor_articulaciones' => isset($data['dolor_articulaciones']) ? 1 : 0,
            'dolor_muscular' => isset($data['dolor_muscular']) ? 1 : 0,
            'dolor_pecho' => isset($data['dolor_pecho']) ? 1 : 0,
        ];

        // Datos para la vista
        $resultadoVista = [
            'nombre' => $request->input('nombre_paciente'),
            'cedula' => $request->input('cedula_identidad'),
        ];

        try {
            // Log de los datos a enviar a la API
            Log::info('Datos a enviar a la API:', $consultaData);

            // Realizar la solicitud a la API Flask con los datos de consulta
            $response = Http::post('http://localhost:8080/predict', $consultaData);

            // Log para depuración
            Log::info('Respuesta de la API:', $response->json());

            // Verificar si la solicitud fue exitosa
            if ($response->successful()) {
                $resultado = $response->json();
                $probabilidad = $resultado['probabilidad'] ?? 0;
                $recomendacion = $resultado['recomendaciones'];

                // Crear una nueva consulta en la base de datos
                $consulta = new Consultas();
                $consulta->nombre_paciente = $request->input('nombre_paciente');
                $consulta->cedula_identidad = $request->input('cedula_identidad');
                $consulta->probabilidad_covid = $probabilidad;
                $consulta->save();

                $resultado['recomendaciones'] = $recomendacion; // Agregar la recomendación al array $resultado
                 //maximo  200 caracteres de acuerdo al porcetnage resuelto % 

                return view('consulta.resultado', compact('resultadoVista', 'resultado', 'probabilidad'));
            } else {
                // Obtener el mensaje de error de la respuesta JSON
                $error = $response->json('error');

                // Redirigir de vuelta al formulario con el mensaje de error
                return redirect()->back()->withErrors(['error' => $error]);
            }
        } catch (\Exception $e) {
            // Capturar y manejar errores de excepción
            return redirect()->back()->withErrors(['error' => 'Error al comunicarse con la API: ' . $e->getMessage()]);
        }
    }
}