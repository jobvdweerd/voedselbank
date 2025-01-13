<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Vul in beschikbaarheid</h2>
                    <form method="POST" action="{{ route('beschikbaar.store') }}">
                        @csrf
                        <div>
                            <label for="date">Datum</label>
                            <input type="date" id="datum" name="datum" required>
                        </div>
                        <div>
                            <label for="function">Functie</label>
                            <input type="text" id="functie" name="functie" required>
                        </div>
                        <div>
                            <label for="available">Beschikbaar</label>
                            <select id="beschikbaar" name="beschikbaar" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
