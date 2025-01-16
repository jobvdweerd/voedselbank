<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl text-center">Dagrooster</h1>
                    <div class="flex justify-between mb-4">
                        <a href="{{ route('dagrooster', ['date' => \Carbon\Carbon::parse($date)->subDay()->format('Y-m-d')]) }}" class="btn btn-primary">Previous Day</a>
                        <a href="{{ route('dagrooster', ['date' => \Carbon\Carbon::parse($date)->addDay()->format('Y-m-d')]) }}" class="btn btn-primary">Next Day</a>
                    </div>
                    <h2 class="text-xl mt-4">{{ $date }}</h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tijd
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Activiteit
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gemaakt door
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($planning as $plan)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $plan->hour }}:00 - {{ $plan->hour + 1 }}:00
                                </td>
                                @if ($plan->functie == null)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    </td>
                                @else
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $plan->functie ?? 'Geen functie' }} ({{ $plan->beschikbaar ? 'Beschikbaar' : 'Niet beschikbaar' }})
                                    </td>
                                @endif
                                @if (!$plan->user)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    </td>
                                @else
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $plan->user->name }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
