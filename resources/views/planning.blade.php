<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('planning.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="date">Datum:</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div>
                            <label for="start_hour">Begin Uur:</label>
                            <input type="number" id="start_hour" name="start_hour" min="8" max="17" required>
                        </div>
                        <div>
                            <label for="end_hour">Eind Uur:</label>
                            <input type="number" id="end_hour" name="end_hour" min="8" max="17" required>
                        </div>
                        <div>
                            <label for="function">Functie:</label>
                            <input type="text" id="function" name="function" required>
                        </div>
                        <div>
                            <label for="beschikbaar">Beschikbaar</label>
                            <select id="beschikbaar" name="beschikbaar" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
