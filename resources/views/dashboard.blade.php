<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <a href="{{ route('planning') }}" class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                    Planning
                </a>
                <a href="{{ route('klantengegevens') }}" class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                    Klantengegevens
                </a>
                <div class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                    Placeholder 1
                </div>
                <div class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                    Placeholder 2
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
