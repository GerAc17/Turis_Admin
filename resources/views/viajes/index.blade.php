
<div class=" mx-auto mt-5 mb-5 px-4 min-w-full">
    <h1 class="text-3xl font-bold mb-6 text-center">Lista de Viajes</h1>
    <div class="bg-white shadow-md rounded-lg min-w-full grid p-5">
        @if($viajes->isEmpty())
            <div class="p-5 text-center">
                <p class="text-xl text-gray-700">No hay viajes disponibles.</p>
            </div>
        @else
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Destino
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Alimentos
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Viajeros
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viajes as $viaje)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $viaje->destino }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $viaje->fecha }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <ul class="list-disc pl-5">
                                    @foreach ($viaje->alimentos as $alimento)
                                        <li>{{ $alimento['tipo'] }}: {{ $alimento['cantidad'] }} ({{ $alimento['descripcion'] }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <ul class="list-disc pl-5">
                                    @foreach ($viaje->viajeros as $viajero)
                                        <li>{{ $viajero['nombre'] }}, {{ $viajero['edad'] }} años, {{ $viajero['nacionalidad'] }}, {{ $viajero['sexo'] }}, Experiencia: {{ $viajero['experiencia'] }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <!-- Aquí puedes agregar botones para editar y eliminar un viaje -->
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm gap-y-2">
                                <button hx-get="/api/viaje/edit/{{ $viaje->id }}"
                                    hx-trigger="click"
                                    hx-target="#body"
                                    hx-swap="innerHTML"
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline
                                ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button hx-get="/api/viaje/delete/{{ $viaje->id }}"
                                    hx-trigger="click"
                                    hx-target="#body"
                                    hx-swap="innerHTML"
                                    class="bg-red-500 hover:bg-red-500 text-white py-2 px-4 mt-2 rounded focus:outline-none focus:shadow-outline"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>