@extends('Layouts.app')
@section('content')
    <div class="bg-gray-200 dark:bg-slate-700 h-screen py-10">
        <img class="position-absolute bottom-0 end-0" src="https://cdn.easyfrontend.com/pictures/httpcodes/three.svg"
            alt="" />
        <div class="container relative overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">horaire
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Reservation
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p>Le {{ date('y - m - d', strtotime($reservation->debut)) }}</p>
                                <p>{{ date('H:i', strtotime($reservation->debut)) }} -
                                    {{ date('H:i', strtotime($reservation->fin)) }}</p>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($reservation->statut === 'active')
                                    <div <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $reservation->statut }}</span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $reservation->statut }}</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">

                                {{-- <p>{{ $reservation->id }}</p> --}}
                                <form action="{{ route('reservation_statut', ['id' => $reservation->id]) }}" method="POST"
                                    id="editForm">
                                    @csrf
                                    @method('PUT')

                                    <select name="statut" class="border rounded-md p-1 select-statut">
                                        <option value="en atente"
                                            {{ $reservation->reservation === 'en atente' ? 'selected' : '' }}>En attente
                                        </option>
                                        <option value="accepter"
                                            {{ $reservation->reservation === 'accepter' ? 'selected' : '' }}>Accepter
                                        </option>
                                        <option value="refuser"
                                            {{ $reservation->reservation === 'refuser' ? 'selected' : '' }}>Refuser
                                        </option>
                                    </select>
                                </form>
                                <script>
                                    document.querySelectorAll('.select-statut').forEach(select => {
                                        select.addEventListener('change', function() {
                                            this.form.submit();
                                        });
                                    });
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-links">
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
@endsection
