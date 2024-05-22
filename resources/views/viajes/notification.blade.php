<div class="container mx-auto py-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        @if($status == 'success')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Éxito!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <a hx-get="/api/viaje/get-view"
                    hx-trigger="click"
                    hx-target="#body"
                    hx-swap="innerHTML"
                    class="text-green-500 cursor-pointer text-end"
                >
                ×
                </a>
            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif
    </div>
</div>