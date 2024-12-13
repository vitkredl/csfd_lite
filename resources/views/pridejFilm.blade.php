<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Přidat nový film</h1>
        <form action="{{ route('addFilm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Jméno filmu</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Rok</label>
                <input type="number" name="year" id="year" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="genre" class="block text-sm font-medium text-gray-700">Žánr</label>
                <input type="text" name="genre" id="genre" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="actors" class="block text-sm font-medium text-gray-700">Herci (nepovinné)</label>
                <input type="text" name="actors" id="actors" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Obrázek</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
    <label for="popisFilmu" class="block text-sm font-medium text-gray-700">Popis filmu</label>
    <textarea name="popisFilmu" id="popisFilmu" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
</div>
            
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Přidat film
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
