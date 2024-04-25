@extends('Layouts.app')
@section('content')
    <div class="md:py-10 md:px-20 bg-white md:mx-20 mt-4 rounded-lg shadow-md">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="">

            <!-- Tab Buttons -->
            <div class="">
                <div class="flex justify-start space-x-4">
                    <button
                        class="px-4 py-2 text-gray-800 font-semibold border-b-4 border-blue-700 hover:bg-blue-700 focus:outline-none tab-button"
                        onclick="showTab('tab1')">Calandreir</button>
                    <button
                        class="px-4 py-2 text-gray-800 font-semibold border-b-4 border-blue-700 hover:bg-blue-700 focus:outline-none tab-button"
                        onclick="showTab('tab2')">Horaire de travail</button>
                    <button
                        class="px-4 py-2 text-gray-800 font-semibold border-b-4 border-blue-700 hover:bg-blue-700 focus:outline-none tab-button"
                        onclick="showTab('tab3')">Liste des rendez-vous</button>
                </div>
            </div>

            <!-- Tab Content -->
            <div id="tab1" class="p-4 tab-content bg-white shadow-md rounded-lg">
                <button id="add-btn">Ajouter ici</button>
                <div class="p-10" id="calendar"></div>
            </div>
            <div id="tab2" class="md:p-4 tab-content bg-white shadow-md rounded-lg hidden">
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">Evenement</th>
                            <th class="text-left p-3 px-5">Date de départ</th>
                            <th class="text-left p-3 px-5">Date de fin</th>
                            <th class="text-left p-3 px-5">Statut</th>
                        </tr>
                        @foreach ($travaux as $travail)
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <form action="{{ route('event.update', ['event' => $travail->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td class="p-3 px-5">
                                        <input type="text" name="title" value='{{ $travail->title }}'
                                            class="bg-transparent border-b-2 border-gray-300 py-2">
                                    </td>
                                    <td class="p-3 px-5">
                                        <input type="text" name="start" value='{{ $travail->start }}'
                                            class="bg-transparent border-b-2 border-gray-300 py-2">
                                    </td>
                                    <td class="p-3 px-5">
                                        <input type="text" name="end" value='{{ $travail->end }}'
                                            class="bg-transparent border-b-2 border-gray-300 py-2">
                                    </td>
                                    <input type="hidden" name="type" value='{{ $travail->type }}'>
                                    <td class="p-3 px-5">
                                        <select name="status" class="bg-transparent border-b-2 border-gray-300 py-2">
                                            <option value="active" {{ $travail->status === 'active' ? 'selected' : '' }}>
                                                active</option>
                                            <option value="inactive"
                                                {{ $travail->status === 'inactive' ? 'selected' : '' }}>inactive</option>
                                        </select>
                                    </td>
                                    <input type="hidden" name="activeTab" value="tab2">
                                    <td class="p-3">
                                        <button class="update-event-btn" type="submit">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </button>

                                    </td>
                                </form>
                                <td class="p-3">
                                    <form action="{{ route('event.destroy', ['event' => $travail->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="activeTab" value="tab2">
                                        <button type="submit"> <!-- Assurez-vous que type="submit" est spécifié -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 14 14">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" d="m13.5.5l-13 13m0-13l13 13" />
                                            </svg>
                                        </button>
                                    </form>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Vérifier si activeTab est défini dans la session
                                            @if (session('activeTab'))
                                                // Exécuter la fonction showTab avec l'onglet actif
                                                showTab('{{ session('activeTab') }}');
                                            @endif
                                        });
                                    </script>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination-links">
                    {{ $evenements->links() }}
                </div> --}}
            </div>
            {{-- fin tab2 --}}
            {{-- tab3 --}}
            <div id="tab3" class="md:p-4 tab-content bg-white shadow-md rounded-lg hidden">
                {{-- <h2 class="text-2xl font-semibold mb-2 text-blue-700">Tab 3 Content</h2> --}}
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">Titre d'evenement</th>
                            <th class="text-left p-3 px-5">Date de départ</th>
                            <th class="text-left p-3 px-5">Date de fin</th>
                            {{-- <th class="text-left p-3 px-5">Statut</th> --}}
                        </tr>
                        @foreach ($evenements as $evenement)
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <form action="{{ route('event.update', ['event' => $evenement->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td class="p-3 px-5">
                                        <input type="text" name="title" value='{{ $evenement->title }}'
                                            class="bg-transparent border-b-2 border-gray-300 py-2">
                                    </td>
                                    <td class="p-3 px-5">
                                        <input type="text" name="start" value='{{ $evenement->start }}'
                                            class="bg-transparent border-b-2 border-gray-300 py-2">
                                    </td>
                                    <td class="p-3 px-5">
                                        <input type="text" name="end" value='{{ $evenement->end }}'
                                            class="bg-transparent border-b-2 border-gray-300 py-2">
                                    </td>
                                    <input type="hidden" name="activeTab" value="tab3">
                                    <input type="hidden" name="type" value='{{ $evenement->type }}'>
                                    <input type="hidden" value="inactive" name="status">
                                    <td class="p-3">
                                        <button class="update-event-btn" type="submit">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </form>
                                <td class="p-3">
                                    <form action="{{ route('event.destroy', ['event' => $evenement->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="activeTab" value="tab3">

                                        <button type="submit"> <!-- Assurez-vous que type="submit" est spécifié -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 14 14">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" d="m13.5.5l-13 13m0-13l13 13" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
            <style>
                html,
                body {
                    height: 100%;
                }

                @media (min-width: 640px) {
                    table {
                        display: inline-table !important;
                    }

                    thead tr:not(:first-child) {
                        display: none;
                    }
                }

                td:not(:last-child) {
                    border-bottom: 0;
                }

                th:not(:last-child) {
                    border-bottom: 2px solid rgba(0, 0, 0, .1);
                }
            </style>
        </div>

    </div>

    <style>
        .tab-button.active {
            background-color: #fff;
            border-color: #4299e1;
            color: #4299e1;
        }
    </style>


    {{-- script de tabulation --}}
    <script>
        function showTab(tabId) {
            // Rafraîchir la page avant d'accéder à l'onglet "Calandreir" (tab1)
            if (tabId === 'tab1') {
                location.reload();
                return; // Arrêter l'exécution de la fonction après le rafraîchissement de la page
            }

            // Masquer tous les contenus d'onglet
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach((content) => {
                content.classList.add('hidden');
            });

            // Afficher le contenu de l'onglet sélectionné
            const selectedTab = document.getElementById(tabId);
            if (selectedTab) {
                selectedTab.classList.remove('hidden');
            }

            // Supprimer la classe 'active' de tous les boutons d'onglet
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach((button) => {
                button.classList.remove('active');
            });

            // Ajouter la classe 'active' au bouton d'onglet cliqué
            const clickedButton = document.querySelector(`[onclick="showTab('${tabId}')"]`);
            if (clickedButton) {
                clickedButton.classList.add('active');
            }

            // Si l'onglet actif est 'tab1', vérifiez si le calendrier est déjà initialisé
            if (tabId === 'tab1') {
                var calendarEl = document.getElementById('calendar');
                // Vérifiez si le calendrier est déjà initialisé
                if (!calendarEl.classList.contains('fc')) {
                    // Initialisez le calendrier
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        editable: true,
                        displayEventTime: true,
                        displayEventEnd: true,
                        events: '{{ route('getevents') }}'
                    });
                    calendar.render();
                }
            }
            document.addEventListener('DOMContentLoaded', function() {
                // Vérifier si activeTab est défini dans la session
                @if (session('activeTab'))
                    // Exécuter la fonction showTab avec l'onglet actif
                    showTab('{{ session('activeTab') }}');
                @endif
            });
        }
    </script>
    {{-- fin du scropt de tabulation --}}


    {{-- add popup --}}
    <section id="add-popup" class="hidden">
        <div id="" tabindex="-1"
            class="bg-black/50 fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="relative bg-white py-10 px-4 shadow sm:rounded-lg sm:px-10">
                    <button class="absolute right-4 top-4" id="add-popup-close" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="product-modal">
                        <svg id="add-popup-close" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <form class="space-y-6" action="{{ route('mycalendar.addevent') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div>
                            <select
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900"
                                name="type" id="type">
                                <option value="travail" selected>Horaire de travail</option>
                                <option value="evenement">Un événement</option>
                            </select>

                        </div>
                        <div id="titre" class="hidden">
                            <label type="text" class="block text-sm font-medium text-gray-700">
                                Entrer le titre d'evenement ici
                            </label>
                            <div class="mt-1">
                                <input id="" name="title" type="text" autocomplete="" required
                                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="Enter your email address">
                            </div>
                        </div>
                        <div>
                            <input type="text" name="rangepick"
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900" />
                        </div>
                        <div id="division">
                            <select
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900"
                                name="division" id="">
                                <option value="">Rien a été sélectionné</option>
                                <option value="15min">15 minutes</option>
                                <option value="20min">20 minutes</option>
                                <option value="30min">30 minutes</option>
                            </select>
                        </div>
                        <div class="w-full flex justify-center">
                            <button type="submit"
                                class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded-md w-1/2">Submit</button>
                        </div>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const eventTypeSelect = document.getElementById('type');
                            const eventTitleField = document.getElementById('titre');
                            const eventRangeField = document.getElementById('division');
                            const titleInput = document.querySelector('#titre input[name="title"]');

                            eventTypeSelect.addEventListener('change', function() {

                                if (eventTypeSelect.value === 'evenement') {
                                    eventTitleField.style.display = 'block';
                                    eventRangeField.style.display = 'none';
                                    titleInput.required = true;
                                } else {
                                    eventTitleField.style.display = 'none';
                                    eventRangeField.style.display = 'block';
                                    titleInput.required = false;
                                    titleInput.value = 'horaire de travail'; // Valeur par défaut pour le titre
                                }
                            });
                        });
                    </script>


                </div>
            </div>

        </div>
        </div>

    </section>
    {{-- edit popup --}}
    <section id="eventForm" class="hidden">
        <div id="add-popup" tabindex="-1"
            class="bg-black/50 fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="relative bg-white py-10 px-4 shadow sm:rounded-lg sm:px-10">
                    <button class="absolute right-4 top-4" id="edit-popup-close" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="product-modal">
                        <svg id="add-popup-close" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <form class="space-y-6" method="POST" action="{{ route('mycalender.updateevent') }}">
                        @csrf
                        @method('PUT')
                        <input id="eventid" type="hidden" name="eventid" value="">
                        {{-- <input type="text" name="type"> --}}

                        <div>
                            <input type="text" name="rangepick"
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900" />
                        </div>
                        <button type="submit">save</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    {{-- ------------------ -------------------------------------------------------------add---------------------------------------- --}}
    {{-- time input --}}
    <script type="text/javascript">
        $(function() {
            $('input[name="rangepick"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'YYYY-MM-DD HH:mm'
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                displayEventTime: true,
                displayEventEnd: true,
                events: '{{ route('getevents') }}',

                eventClick: function(info) {
                    $('#eventForm').removeClass('hidden');
                    $('#eventid').val(info.event
                        .id); // Mettre à jour la valeur de l'ID de l'événement dans le formulaire

                    // Envoyer l'ID de l'événement au serveur via une requête AJAX
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('event_id') }}',
                        data: {
                            eventId: info.event.id,
                            _token: '{{ csrf_token() }}' // Inclure le jeton CSRF dans les données de la requête
                        },
                        success: function(response) {
                            console.log('Requête AJAX réussie ! Réponse du serveur :',
                                response);
                            $('input[name="title"]').val(response.event.title);
                            $('input[name="type"]').val(response.event.type);
                        },
                        error: function(xhr, status, error) {
                            console.error('Erreur lors de la requête AJAX :', error);
                            console.error('Statut de la requête :', status);
                            console.error('Réponse du serveur :', xhr.responseText);
                        }
                    });
                }
            });
            calendar.render();
        });
    </script>
    {{-- ------------------------- --}}

    {{-- edit avec translation --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                eventDrop: function(info) {
                    var newStartDate = info.event.start;
                    var newEndDate = info.event.end;

                    // Envoyer la nouvelle date au serveur à l'aide d'une requête AJAX
                    $.ajax({
                        type: 'PUT',
                        url: '{{ route('translateevent') }}',
                        data: {
                            eventid: info.event.id,
                            new_start_date: newStartDate,
                            new_end_date: newEndDate,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Traitez la réponse du serveur ici si nécessaire
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Gérez les erreurs de la requête AJAX ici si nécessaire
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
            calendar.render();
        });
    </script> --}}
    {{-- ----------------------- --}}
    {{-- popup add script --}}
    <script>
        document.getElementById('add-btn').addEventListener('click', function() {
            document.getElementById('add-popup').classList.remove('hidden')
        });
        document.getElementById('add-popup-close').addEventListener('click', function() {
            document.getElementById('add-popup').classList.add('hidden');
        });
        document.getElementById('edit-popup-close').addEventListener('click', function() {
            document.getElementById('eventForm').classList.add('hidden');
        });
    </script>

    {{-- End popup add script  --}}

    <script></script>
@endsection
