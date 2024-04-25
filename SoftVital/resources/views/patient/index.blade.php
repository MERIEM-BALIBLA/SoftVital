@extends('Layouts.app')
@section('content')
    <div class="bg-gray-200 dark:bg-slate-700 h-screen py-10">
        <img class="position-absolute bottom-0 end-0" src="https://cdn.easyfrontend.com/pictures/httpcodes/three.svg"
            alt="" />
        <div class="container overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medecin
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->medecin_nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($reservation->statut === 'accepter')
                                    <span
                                        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                        {{ $reservation->statut }}</span>
                                @else
                                    <span
                                        class="inline px-3 py-1 text-sm font-normal rounded-full text-red-400 gap-x-2 bg-red-200 dark:bg-gray-800">
                                        {{ $reservation->statut }}</span>
                                @endif
                            </td>
                            @if ($reservation->statut === 'accepter')
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->debut }}-{{ $reservation->fin }}
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
