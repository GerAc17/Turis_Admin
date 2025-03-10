<div class="container mx-auto py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Editar Viaje</h1>
        <form>
            <!-- ID -->
            <input type="hidden" name="id" value="{{ $viaje->id }}">
            <!-- Destino -->
            <div class="mb-4">
                <label for="destino" class="block text-gray-700">Destino:</label>
                <input type="text" id="destino" name="destino" value="{{ $viaje->destino }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="block text-gray-700">Fecha:</label>
                <input type="datetime-local" id="fecha" name="fecha" value="{{ \Carbon\Carbon::parse($viaje->fecha)->format('Y-m-d\TH:i') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Alimentos -->
            <h2 class="text-xl font-semibold mb-4">Alimentos</h2>
            <div id="alimentos">
                @foreach ($viaje->alimentos as $index => $alimento)
                    <div class="mb-4 border border-gray-200 p-4 rounded-md relative">
                        <button type="button" onclick="removeSection(this)" class="absolute top-2 right-2 text-red-500">×</button>
                        <label class="block text-gray-700">Tipo:</label>
                        <input type="text" name="alimentos[{{ $index }}][tipo]" value="{{ $alimento['tipo'] }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <label class="block text-gray-700 mt-2">Cantidad:</label>
                        <input type="number" name="alimentos[{{ $index }}][cantidad]" value="{{ $alimento['cantidad'] }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <label class="block text-gray-700 mt-2">Descripción:</label>
                        <input type="text" name="alimentos[{{ $index }}][descripcion]" value="{{ $alimento['descripcion'] }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addAlimento()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Agregar Alimento</button>

            <!-- Viajeros -->
            <h2 class="text-xl font-semibold mt-6 mb-4">Viajeros</h2>
            <div id="viajeros">
                @foreach ($viaje->viajeros as $index => $viajero)
                <div class="mb-4 border border-gray-200 p-4 rounded-md relative">
                    <button type="button" onclick="removeSection(this)" class="absolute top-2 right-2 text-red-500">×</button>
                        <label class="block text-gray-700">Nombre:</label>
                        <input type="text" name="viajeros[{{ $index }}][nombre]" value="{{ $viajero['nombre'] }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <label class="block text-gray-700 mt-2">Edad:</label>
                        <input type="number" name="viajeros[{{ $index }}][edad]" value="{{ $viajero['edad'] }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <label class="block text-gray-700 mt-2">Nacionalidad:</label>
                        <input type="text" name="viajeros[{{ $index }}][nacionalidad]" value="{{ $viajero['nacionalidad'] }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        <label class="block text-gray-700 mt-2">Sexo:</label>
                        <select name="viajeros[{{ $index }}][sexo]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                            <option value="Masculino" {{ $viajero['sexo'] == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ $viajero['sexo'] == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        <label class="block text-gray-700 mt-2">Experiencia:</label>
                        <input type="text" name="viajeros[{{ $index }}][experiencia]" value="{{ $viajero['experiencia'] }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addViajero()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Agregar Viajero</button>

            <div class="mt-6">
                <button hx-post="/api/viaje/update"
                    hx-target="#body" 
                    hx-swap="innerHTML"
                    class="bg-green-500 text-white px-4 py-2 rounded-md"
                >Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<script>
    function addAlimento() {
        const index = document.querySelectorAll('#alimentos > div').length;
        const html = `
            <div class="mb-4 border border-gray-200 p-4 rounded-md relative">
                <button type="button" onclick="removeSection(this)" class="absolute top-2 right-2 text-red-500">×</button>
                <label class="block text-gray-700">Tipo:</label>
                <input type="text" name="alimentos[${index}][tipo]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <label class="block text-gray-700 mt-2">Cantidad:</label>
                <input type="number" name="alimentos[${index}][cantidad]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <label class="block text-gray-700 mt-2">Descripción:</label>
                <input type="text" name="alimentos[${index}][descripcion]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
        `;
        document.getElementById('alimentos').insertAdjacentHTML('beforeend', html);
    }

    function addViajero() {
        const index = document.querySelectorAll('#viajeros > div').length;
        const html = `
        <div class="mb-4 border border-gray-200 p-4 rounded-md relative">
                    <button type="button" onclick="removeSection(this)" class="absolute top-2 right-2 text-red-500">×</button>
                <label class="block text-gray-700">Nombre:</label>
                <input type="text" name="viajeros[${index}][nombre]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <label class="block text-gray-700 mt-2">Edad:</label>
                <input type="number" name="viajeros[${index}][edad]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <label class="block text-gray-700 mt-2">Nacionalidad:</label>
                <input type="text" name="viajeros[${index}][nacionalidad]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                <label class="block text-gray-700 mt-2">Sexo:</label>
                <select name="viajeros[${index}][sexo]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                <label class="block text-gray-700 mt-2">Experiencia:</label>
                <input type="text" name="viajeros[${index}][experiencia]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
        `;
        document.getElementById('viajeros').insertAdjacentHTML('beforeend', html);
    }

    function removeSection(button) {
        button.closest('div').remove();
    }
</script>