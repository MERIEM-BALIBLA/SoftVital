// // {{-- add popup --}}

//     document.getElementById('add-btn').addEventListener('click', function() {
//         document.getElementById('add-popup').classList.remove('hidden')
//     });
//     document.getElementById('add-popup-close').addEventListener('click', function() {
//         document.getElementById('add-popup').classList.add('hidden');
//     });
// // </script>
// // {{-- end add popup --}}


// {{-- time input --}}
    // <script type="text/javascript">
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
    // </script>
    // {{-- end date input --}}

    // {{-- calandrier render --}}
    // {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                displayEventTime: true,
                displayEventEnd: true,
                events: '{{ route('getevents') }}',
                eventClick: function(info) {
                    $('#eventForm').removeClass(
                        'hidden'); // Afficher le formulaire en supprimant la classe 'hidden'
                    $('#eventid').val(info.event
                        .id); // Utiliser info.event.id pour obtenir l'ID de l'événement
                }

            });
            calendar.render();


            $.ajax({
                type: 'POST',
                url: '{{ route('event_id') }}', // Utilisez le nom de la route pour spécifier l'URL
                data: {
                    eventId: info.event.id
                }, // Envoyez les données de l'événement
                success: function(response) {
                    // Traitez la réponse du serveur ici si nécessaire
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Gérez les erreurs de la requête AJAX ici si nécessaire
                    console.error(xhr.responseText);
                }
            });

        });
    // </script> --}}

    // {{-- edit with popup --}}
    // <script>
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
    // </script>
    // {{-- ------------------------- --}}

    // {{-- edit avec translation --}}
    // <script>
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
    // </script>
    // {{-- ----------------------- --}}
    // {{-- popup add script --}}
    // <script>
        document.getElementById('add-btn').addEventListener('click', function() {
            document.getElementById('add-popup').classList.remove('hidden')
        });
        document.getElementById('add-popup-close').addEventListener('click', function() {
            document.getElementById('add-popup').classList.add('hidden');
        });
        document.getElementById('edit-popup-close').addEventListener('click', function() {
            document.getElementById('eventForm').classList.add('hidden');
        });
    // </script>
