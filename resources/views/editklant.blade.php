<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl text-center">Edit Klant</h1>
                    <form action="{{ route('klant.update', $klant) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Add form fields for Klant attributes -->
                        <div class="mb-4">
                            <label for="naam" class="block text-sm font-medium text-gray-700">Naam</label>
                            <input type="text" name="naam" id="naam" value="{{ old('naam', $klant->naam) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="volwassenen" class="block text-sm font-medium text-gray-700">Volwassenen</label>
                            <input type="number" name="volwassen" id="volwassen" value="{{ old('volwassen', $klant->volwassen) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="kinderen" class="block text-sm font-medium text-gray-700">Kinderen</label>
                            <input type="number" name="kinderen" id="kinderen" value="{{ old('kinderen', $klant->kinderen) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="babys" class="block text-sm font-medium text-gray-700">Baby's</label>
                            <input type="number" name="babys" id="babys" value="{{ old('babys', $klant->babys) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                            <input type="text" name="postcode" id="postcode" value="{{ old('postcode', $klant->postcode) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="wensen" class="block text-sm font-medium text-gray-700">Wensen</label>
                            <textarea name="wensen" id="wensen" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('wensen', $klant->wensen) }}</textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
