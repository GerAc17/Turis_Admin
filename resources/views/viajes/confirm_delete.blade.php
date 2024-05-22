<div class="container mx-auto py-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Confirmar Borrado</h1>
        <p class="mb-4">¿Estás seguro de que quieres eliminar el viaje a <strong>{{ $viaje->destino }}</strong> del <strong>{{ $viaje->fecha }}</strong>?</p>
        <form>
            <input type="hidden" name="id" value="{{ $viaje->id }}">
            <div class="flex justify-between">
                <button hx-get="/api/viaje/get-view"
                    hx-trigger="click"
                    hx-target="#body"
                    hx-swap="innerHTML"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md"
                >
                    Cancelar
                </button>
                <button hx-post="/api/viaje/delete"
                    hx-trigger="click"
                    hx-target="#body"
                    hx-swap="innerHTML"
                    class="bg-red-500 text-white px-4 py-2 rounded-md"
                >Eliminar</button>
            </div>
        </form>
    </div>
</div>