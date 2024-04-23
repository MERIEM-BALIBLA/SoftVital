@extends('Layouts.app')
@section('content')
<<<<<<< HEAD
    <div class="w-full bg-indigo-500 p-14">
        <div class="container">
            <div class="sm:flex items-center bg-white overflow-hidden px-2 py-1 md:justify-between rounded-full">
                <div class="ms:flex items-center px-2 rounded-lg space-x-2 md:space-x-4 mx-auto ">
                    <select id="ville" class="text-sm text-gray-700 outline-none border-2 px-2 py-2 rounded-md">
                        <option selected>Vile</option>
                        @foreach ($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                        @endforeach
                    </select>
                    <select id="specialite" class="text-sm text-gray-700 outline-none border-2 px-2 py-2 rounded-md">
                        <option selected>Selectionner la spécialité</option>
                        @foreach ($specialites as $specilaite)
                            <option value="{{ $specilaite->id }}">{{ $specilaite->specialite }}</option>
                        @endforeach
                    </select>
                </div>
                <input name="search_input" class="text-sm text-gray-700 flex-grow outline-none px-2 " type="text"
                    placeholder="Medecin généraliste" />
                {{-- <button class="bg-indigo-500 text-white text-base px-4 py-2 font-thin rounded-r-2xl">Search</button> --}}
            </div>
        </div>
    </div>
    @include('SoftVital.liste');
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchData() {
                // var specialite = $("#specialite").val();
                var search_input = $("#search_input").val();
                $.ajax({
                    url: "{{ route('filtre') }}",
                    type: "POST",
                    data: {
                        // specialite: specialite,
                        search: search_input
                    },
                    success: function(res) {
                        console.log(res);
                        displayProfiles(res.profile);
                    }
                });
            };
            // $("#specialite").change(function() {
            //     fetchData();
            // });
            $("#search_input").on('input', function() {
                fetchData();
            });
        });

        function displayProfiles(profile) {
            console.log(profile);
        }
    </script>

    <footer>
        @include('layouts.footer')

    </footer>
=======
    <!-- component -->
    <!-- Creacte By Joker Banny -->
    {{-- <div class="min-h-screen bg-gray-100 flex justify-center items-center"> --}}
    <div class="w-full bg-indigo-500 rounded-lg p-14 mt-12">

        <form class="">

            <div class="sm:flex items-center bg-white overflow-hidden px-2 py-1 md:justify-between rounded-full">
                <div class="ms:flex items-center px-2 rounded-lg space-x-2 md:space-x-4 mx-auto ">
                    <select id="Com" class="text-sm text-gray-700 outline-none border-2 px-2 py-2 rounded-md">
                        <option value="com" selected>Vile</option>
                    </select>
                    <select id="Com" class="text-sm text-gray-700 outline-none border-2 px-2 py-2 rounded-md">
                        <option value="com" selected>Selectionner la spécialité</option>
                    </select>
                </div>
                <input class="text-sm text-gray-700 flex-grow outline-none px-2 " type="text"
                    placeholder="Medecin généraliste" />
                <button class="bg-indigo-500 text-white text-base px-4 py-2 font-thin rounded-r-2xl">Search</button>

            </div>
        </form>
    </div>

    <div class="flex gap-10 p-8">
        @foreach ($medecins as $medecin)
            <div class="border border-2 w-1/2 border-gray-600 hover:border-blue-600 flex p-4 bg-white rounded-lg">
                <div class="w-1/2">
                    <div class="flex">
                        <div class="relative">
                            <img class=" rounded-full object-cover" src="https://randomuser.me/api/portraits/women/87.jpg"
                                alt="Avatar">
                        </div>
                        <div class="ml-4">
                            <h2 class="font-bold text-gray-800 text-lg">{{ $medecin->user_name }}
                            </h2>
                            <p class="text-gray-600">{{ $medecin->specialite }}</p>

                        </div>
                    </div>
                    <a href="/single_page/{{ $medecin->id }}">
                        <button class="mt-20 bg-blue-500 text-white hover:bg-blue-800 p-2 rounded-lg text-base font-bold">
                            Prendre rendez-vous avec {{ $medecin->nom }}
                        </button>
                    </a>
                </div>
                <div class="w-full">
                    <section class=" dark:bg-gray-900 antialiased">
                        <div class="px-8">
                            <h2
                                class="inline-flex items-center text-lg font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Horaires d'ouverture
                            </h2>
                        </div>
                        @foreach ($horaireTravail->where('user_id', $medecin->user_id) as $horaire)
                            <div class="flow-root max-w-3xl mx-auto mt-2 sm:mt-12 lg:mt-16">
                                <div class="-my-4 divide-y divide-gray-200 dark:divide-gray-700">
                                    <div class="flex gap-4 py-4 sm:gap-6 sm:flex-row sm:items-center">
                                        <p
                                            class="w-32 text-lg font-normal text-gray-500 sm:text-right dark:text-gray-400 shrink-0">
                                            {{ date('d M Y', strtotime($horaire->start)) }}
                                        </p>
                                        {{-- <p>{{ $horaire->title }}</p> --}}
                                        <form class="horaire-form" action="{{ route('rendez-vous') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="event_id" value="{{ $horaire->id }}">
                                            <input type="hidden" value="{{ $medecin->id }}" name="medecin_id">

                                            <button data-id="{{ $horaire->id }}"
                                                class="horaire-btn bg-{{ $horaire->status === 'active' ? 'indigo-300 hover:bg-indigo-400' : 'red-500' }} px-1 rounded-md text-lg font-normal text-gray-700 sm:text-right dark:text-gray-400 shrink-0"
                                                {{ $horaire->status !== 'active' ? 'disabled' : '' }}>
                                                {{ date('H:i', strtotime($horaire->start)) }} -
                                                {{ date('H:i', strtotime($horaire->end)) }}
                                            </button>
                                        </form>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{-- <a href="#" class="hover:underline">Opening remarks</a> --}}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('.horaire-btn').click(function() {
                                    var id = $(this).data('id'); // Récupère l'ID de l'horaire
                                    // Vous pouvez ici afficher une notification en utilisant une bibliothèque comme Toastr ou simplement en affichant une alerte native
                                    alert('Votre demande a été bien envoyée pour l\'horaire avec l\'ID ' + id);
                                });
                            });
                        </script>

                        {{-- </div> --}}
                    </section>

                </div>
            </div>
        @endforeach
    </div>

    {{-- <div class="flex items-end gap-1">
            <span class="text-6xl font-semibold dark:text-white">Soft</span>
            <svg width="100px" height="100px" xmlns="http://www.w3.org/2000/svg">
                <!-- Nuage -->
                <g id="cloud">
                  <circle cx="30" cy="40" r="20" fill="#F5F5F5"/>
                  <circle cx="50" cy="35" r="25" fill="#F5F5F5"/>
                  <circle cx="70" cy="40" r="20" fill="#F5F5F5"/>
                </g>
              </svg>
              
              <style>
                #cloud {
                  animation: moveCloud 2s infinite alternate;
                }
              
                @keyframes moveCloud {
                  0% {
                    transform: translateY(-18px);
                  }
                  100% {
                    transform: translateY(25px);
                  }
                }
              </style>
              
            <span class="text-6xl font-semibold text-orange-500">Vital</span>
          </div> --}}
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
@endsection
