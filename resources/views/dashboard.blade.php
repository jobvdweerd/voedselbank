<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Je bent ingelogd") }}
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <a href="{{ route('planning') }}" class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                    Planning
                </a>
                <a href="{{ route('dagrooster') }}" class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                    Dagrooster
                </a>
                @if(auth()->user()->role_id === 1)
                    <a href="{{ route('klant.create') }}" class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                        Klant aanmaken
                    </a>
                    <a href="{{ route('managerooster') }}" class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                        Manage planning
                    </a>
                @elseif(auth()->user()->role_id === 3)
                    <a href="{{ route('klant.create') }}" class="bg-gray-500 text-white text-center py-4 rounded-lg shadow-lg">
                        Klant aanmaken
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
