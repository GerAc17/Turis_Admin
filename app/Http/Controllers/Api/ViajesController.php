<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Viajes;
use Exception;
Use Symfony\Component\HttpFoundation\Response;

class ViajesController extends Controller
{
    public function index()
    {
        $viajes = Viajes::all();
        return response()->json([
            'result' => $viajes
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $viaje = new Viajes();
        $viaje->nombre = $request->nombre;
        $viaje->descripcion = $request->descripcion;
        $viaje->save();

        return response()->json(['result' => $viaje], Response::HTTP_CREATED);

    }

    public function update(Request $request, $id)
    {
        $viaje = Viajes::findOrFail($id);
        $viaje->nombre = $request->nombre;
        $viaje->descripcion = $request->descripcion;
        $viaje->save();
        return response()->json(['result' => $viaje], Response::HTTP_OK);

    }

    public function destroy($id)
    {
        $viaje = Viajes::findOrFail($id);
        $viaje->delete();
        return response()->json(['result' => 'Viaje eliminado'], Response::HTTP_OK);
    }

    public function create()
    {
        return view('viajes.create');
    }

    public function show_viajes()
    {
        $viajes = Viajes::all();
        return view('viajes.index', compact('viajes'));
    }

    public function edit($id)
    {
        $viaje = Viajes::findOrFail($id);
        return view('viajes.edit', compact('viaje'));
    }

    public function show_update()
    {
        $request = request();
        $id = $request->input('id');
        // Validar los datos del formulario
        $request->validate([
            'destino' => 'required|string|max:255',
            'fecha' => 'required|date_format:Y-m-d\TH:i',
            'alimentos' => 'required|array',
            'alimentos.*.tipo' => 'required|string|max:255',
            'alimentos.*.cantidad' => 'required|integer|min:1',
            'alimentos.*.descripcion' => 'required|string|max:255',
            'viajeros' => 'required|array',
            'viajeros.*.nombre' => 'required|string|max:255',
            'viajeros.*.edad' => 'required|integer|min:0',
            'viajeros.*.nacionalidad' => 'required|string|max:255',
            'viajeros.*.sexo' => 'required|string|in:Masculino,Femenino',
            'viajeros.*.experiencia' => 'required|string|max:255',
        ]);

        try {
            // Encontrar el viaje existente
            $viaje = Viajes::findOrFail($id);

            // Actualizar los datos del viaje
            $viaje->destino = $request->input('destino');
            $viaje->fecha = $request->input('fecha');
            $viaje->alimentos = $request->input('alimentos');
            $viaje->viajeros = $request->input('viajeros');
            $viaje->save();

            // Devolver una vista de notificación de éxito
            return view('viajes.notification', ['status' => 'success', 'message' => 'El viaje se ha actualizado correctamente.']);
        } catch (Exception $e) {
            // Devolver una vista de notificación de error
            return view('viajes.notification', ['status' => 'error', 'message' => 'Hubo un problema al actualizar el viaje.']);
        }
    }

    public function show_create(Request $request)
    {
        // Validar los datos del formulario (solo destino y fecha requeridos)
        $request->validate([
            'destino' => 'required|string|max:255',
            'fecha' => 'required|date_format:Y-m-d\TH:i',
            'alimentos' => 'array',
            'alimentos.*.tipo' => 'string|max:255',
            'alimentos.*.cantidad' => 'integer|min:1',
            'alimentos.*.descripcion' => 'string|max:255',
            'viajeros' => 'array',
            'viajeros.*.nombre' => 'string|max:255',
            'viajeros.*.edad' => 'integer|min:0',
            'viajeros.*.nacionalidad' => 'string|max:255',
            'viajeros.*.sexo' => 'string|in:Masculino,Femenino',
            'viajeros.*.experiencia' => 'string|max:255',
        ]);

        try {
            // Crear un nuevo viaje
            $viaje = new Viajes;
            $viaje->destino = $request->input('destino');
            $viaje->fecha = $request->input('fecha');
            $viaje->alimentos = $request->input('alimentos') ?? [];
            $viaje->viajeros = $request->input('viajeros') ?? [];
            $viaje->save();

            // Devolver una vista de notificación de éxito
            return view('viajes.notification', ['status' => 'success', 'message' => 'El viaje se ha creado correctamente.']);
        } catch (Exception $e) {
            // Devolver una vista de notificación de error
            return view('viajes.notification', ['status' => 'error', 'message' => 'Hubo un problema al crear el viaje.']);
        }
    }

    public function confirm_delete($id)
    {
        $viaje = Viajes::find($id);
        return view('viajes.confirm_delete', compact('viaje'));
    }

    public function destroy_viaje()
    {
        $id = request()->input('id');
        $viaje = Viajes::find($id);
        
        try {
            $viaje->delete();
            return view('viajes.notification', ['status' => 'success', 'message' => 'El viaje se ha eliminado correctamente.']);
        } catch (Exception $e) {
            return view('viajes.notification', ['status' => 'error', 'message' => 'Hubo un problema al eliminar el viaje.']);
        }
    }
}
