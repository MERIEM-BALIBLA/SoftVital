@extends('Layouts.app')
@section('content')
    <div class="w-full bg-gray-200">
        <div class="w-full bg-indigo-500 p-14">
            <div class="container">
                <div class="sm:flex items-center bg-white overflow-hidden px-2 py-1 md:justify-between rounded-full">
                    <div class="ms:flex items-center px-2 rounded-lg space-x-2 md:space-x-4 mx-auto ">
                        <select id="ville" class="text-sm text-gray-700 outline-none border-2 px-2 py-2 rounded-md">
                            <option selected value="0">Vile</option>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                        <select id="specialite" class="text-sm text-gray-700 outline-none border-2 px-2 py-2 rounded-md">
                            <option selected value="0">Selectionner la spécialité</option>
                            @foreach ($specialites as $specilaite)
                                <option value="{{ $specilaite->id }}">{{ $specilaite->specialite }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input id="search" class="text-sm text-gray-700 flex-grow outline-none px-2 " type="text"
                        placeholder="Medecin généraliste" />
                </div>
            </div>
        </div>
        <div class="container" id="place_result">
            @include('SoftVital.liste')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log($('#search'));
            $('#search').on('input', function() {
                recherche();
            });

            $('#specialite').on('change', function() {
                recherche();
            });

            $('#ville').on('change', function() {
                recherche();
            });
        });

        function recherche() {
            const search = $('#search').val();
            const specialite = $('#specialite').val();

            const ville = $('#ville').val();


            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            var params = new URLSearchParams({
                search: search,
                specialite: specialite,
                ville: ville
            }).toString();

            fetch("/search?" + params, {
                    method: 'GET',
                    header: {
                        'Content-Type': "application/json",
                        'X-CSRF-TOKEN': token
                    },
                })
                .then(response => response.json())
                .then(response => {
                    console.log(response);
                    $('#place_result').html("");
                    $('#place_result').html(response.view)
                })
                .catch(error => console.log(error))
        }
    </script>
    <footer>
        @include('layouts.footer')
    </footer>
@endsection
