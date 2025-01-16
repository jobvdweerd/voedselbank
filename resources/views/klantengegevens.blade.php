<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Klantengegevens') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">Actieve  Klanten</h3>
                    <table class="min-w-full divide-y divide-gray-200 mb-6">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volwassen</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kinderen</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Baby's</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Totaal</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Postcode</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wensen</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pakketten</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($activeKlant as $klanten)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $klanten->naam }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->volwassen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->kinderen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->babys }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->volwassen + $klanten->kinderen + $klanten->babys }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->postcode }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->wensen }}</td>
                                <td class="px-0 py-9 whitespace-nowrap text-sm text-gray-500 flex flex-col items-center space-y-2">
                                        <a href="{{ route('klant.edit', $klanten) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('klant.toggleActive', $klanten) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Deactiveren</button>
                                        </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <form action="{{ route('klant.updatePackage', $klanten->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-4">
                                                <select name="pakket_id" id="pakket" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                    @foreach($pakketten as $pakket)
                                                        <option value="{{ $pakket->id }}" {{ $klanten->pakket_id == $pakket->id ? 'selected' : '' }}>
                                                            {{ $pakket->naam }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Update Pakket
                                            </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <h3 class="font-semibold text-lg text-gray-800 leading-tight">Inactieve  Klanten</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volwassen</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kinderen</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Baby's</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Totaal</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Postcode</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wensen</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pakketten</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($inactiveKlant as $klanten)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $klanten->naam }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->volwassen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->kinderen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->babys }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->volwassen + $klanten->kinderen + $klanten->babys }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->postcode }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $klanten->wensen }}</td>
                                <td class="px-0 py-9 whitespace-nowrap text-sm text-gray-500 flex flex-col items-center space-y-2">
                                    <a href="{{ route('klant.edit', $klanten) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('klant.toggleActive', $klanten) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Activeren</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <form action="{{ route('klant.updatePackage', $klanten->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <select name="pakket_id" id="pakket" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                @foreach($pakketten as $pakket)
                                                    <option value="{{ $pakket->id }}" {{ $klanten->pakket_id == $pakket->id ? 'selected' : '' }}>
                                                        {{ $pakket->naam }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Update Pakket
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
