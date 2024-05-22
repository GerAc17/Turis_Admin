<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Viajes;
use Illuminate\Support\Carbon;


class ViajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Viajes::insert([
            [
                'destino' => 'Chablekal - Valladolid',
                'fecha' => Carbon::parse('2023-06-15 00:00:00')->toDateTimeString(),
                'alimentos' => [
                    ['tipo' => 'Refresco', 'cantidad' => 20, 'descripcion' => 'Coca Cola, 355ml'],
                    ['tipo' => 'Comida', 'cantidad' => 15, 'descripcion' => 'Torta de cochinita pibil'],
                    ['tipo' => 'Botana', 'cantidad' => 30, 'descripcion' => 'Papas fritas, 50g'],
                ],
                'viajeros' => [
                    ['nombre' => 'Juan Pérez', 'edad' => 30, 'nacionalidad' => 'Mexicana', 'sexo' => 'Masculino', 'experiencia' => 'Muy buena'],
                    ['nombre' => 'María Gómez', 'edad' => 25, 'nacionalidad' => 'Mexicana', 'sexo' => 'Femenino', 'experiencia' => 'Excelente'],
                ],
            ],
            [
                'destino' => 'Chablekal - Izamal',
                'fecha' => Carbon::parse('2023-07-20 00:00:00')->toDateTimeString(),
                'alimentos' => [
                    ['tipo' => 'Refresco', 'cantidad' => 25, 'descripcion' => 'Pepsi, 355ml'],
                    ['tipo' => 'Comida', 'cantidad' => 20, 'descripcion' => 'Sandwich de jamón y queso'],
                    ['tipo' => 'Botana', 'cantidad' => 40, 'descripcion' => 'Galletas saladas, 50g'],
                ],
                'viajeros' => [
                    ['nombre' => 'Ana López', 'edad' => 22, 'nacionalidad' => 'Mexicana', 'sexo' => 'Femenino', 'experiencia' => 'Buena'],
                    ['nombre' => 'Carlos Sánchez', 'edad' => 28, 'nacionalidad' => 'Mexicana', 'sexo' => 'Masculino', 'experiencia' => 'Satisfactoria'],
                ],
            ],
            [
                'destino' => 'Chablekal - Ruta Costera',
                'fecha' => Carbon::parse('2023-08-10 00:00:00')->toDateTimeString(),
                'alimentos' => [
                    ['tipo' => 'Refresco', 'cantidad' => 30, 'descripcion' => 'Sprite, 355ml'],
                    ['tipo' => 'Comida', 'cantidad' => 25, 'descripcion' => 'Tacos de asada'],
                    ['tipo' => 'Botana', 'cantidad' => 50, 'descripcion' => 'Cacahuates, 50g'],
                ],
                'viajeros' => [
                    ['nombre' => 'Luis Martínez', 'edad' => 35, 'nacionalidad' => 'Mexicana', 'sexo' => 'Masculino', 'experiencia' => 'Excelente'],
                    ['nombre' => 'Elena Rodríguez', 'edad' => 27, 'nacionalidad' => 'Mexicana', 'sexo' => 'Femenino', 'experiencia' => 'Muy buena'],
                ],
            ],
            [
                'destino' => 'Chablekal - Valladolid',
                'fecha' => Carbon::parse('2023-09-05 00:00:00')->toDateTimeString(),
                'alimentos' => [
                    ['tipo' => 'Refresco', 'cantidad' => 20, 'descripcion' => 'Fanta, 355ml'],
                    ['tipo' => 'Comida', 'cantidad' => 18, 'descripcion' => 'Tamal de pollo'],
                    ['tipo' => 'Botana', 'cantidad' => 35, 'descripcion' => 'Chips de maíz, 50g'],
                ],
                'viajeros' => [
                    ['nombre' => 'Marta Jiménez', 'edad' => 29, 'nacionalidad' => 'Mexicana', 'sexo' => 'Femenino', 'experiencia' => 'Satisfactoria'],
                    ['nombre' => 'Pedro Hernández', 'edad' => 33, 'nacionalidad' => 'Mexicana', 'sexo' => 'Masculino', 'experiencia' => 'Buena'],
                ],
            ],
        ]);
    }
}
