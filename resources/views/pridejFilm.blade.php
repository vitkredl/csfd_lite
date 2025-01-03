<x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Přidat nový film</h1>

        <!-- Modální okno pro hlášky -->
        @if (session('success') || session('error'))
            <div x-data="{ showModal: true }" x-show="showModal"
                class="fixed inset-0 flex items-center justify-center bg-gray-100 bg-opacity-80 z-50">
                <div class="bg-white rounded-lg p-6 shadow-2xl text-center border border-gray-300">
                    <p class="text-lg font-bold {{ session('success') ? 'text-blue-600' : 'text-red-600' }}">
                        {{ session('success') ?? session('error') }}
                    </p>
                    <button @click="showModal = false"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Zavřít
                    </button>
                </div>
            </div>
        @endif

        <!-- Formulář pro přidání filmu -->
        <form action="{{ route('addFilm.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Jméno filmu</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Rok</label>
                <input type="text" name="year" id="year" inputmode="numeric"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required placeholder="Zadejte rok">
                @error('year')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="genre" class="block text-sm font-medium text-gray-700">Žánr</label>
                <select name="genre" id="genre"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Vyberte žánr</option>
                    <option value="Akční">Akční</option>
                    <option value="Dobrodružný">Dobrodružný</option>
                    <option value="Komediální">Komediální</option>
                    <option value="Drama">Drama</option>
                    <option value="Horor">Horor</option>
                    <option value="Romantický">Romantický</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Animovaný">Animovaný</option>
                    <option value="Dokumentární">Dokumentární</option>
                </select>
                @error('genre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="actors" class="block text-sm font-medium text-gray-700">Herci (nepovinné)</label>
                <input type="text" name="actors" id="actors"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('actors')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Obrázek</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="popisFilmu" class="block text-sm font-medium text-gray-700">Popis filmu</label>
                <textarea name="popisFilmu" id="popisFilmu"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required></textarea>
                @error('popisFilmu')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Přidat film
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
