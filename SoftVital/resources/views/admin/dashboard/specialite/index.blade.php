@extends('admin.Layout.app')
@section('content')
    <section class="w-full h-screen flex flex-col px-20 bg-gray-200">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full px-20 py-10 align-middle md:px-6 lg:px-8">
                <button id="add-btn"
                    class="p-2 bg-blue-700 hover:bg-blue-600 text-white font-medium rounded-md mb-4">Ajouter une autre
                    spécialité</button>
                <div class="border rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Le titre
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Date de créaction</th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Opération</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($specialites as $specialite)
                                <form action="{{ route('modifier_une_specialite', ['specialite' => $specialite->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div>
                                                <h4 class="text-gray-700 dark:text-gray-200">
                                                    <input class="pb-1 border-b border-gray-500" type="text"
                                                        name="specialite" value="{{ $specialite->specialite }}">
                                                </h4>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <p class="text-gray-500 dark:text-gray-400">
                                                <input class="pb-1 border-b border-gray-500" type="text"
                                                    name="date" value="{{ $specialite->created_at }}">
                                            </p>
                                        </td>
                                        <td class="flex gap-3 px-4 py-4 text-sm whitespace-nowrap">
                                            <button class="update-event-btn" type="submit">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                            </button>
                                </form>
                                <form action="{{ route('suprimer_une_specialite', ['specialite' => $specialite->id]) }}""
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Assurez-vous que type="submit" est spécifié -->
                                    <button type="submit">
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
                <div class="pagination-links">
                    {{ $specialites->links() }}
                </div>
            </div>
        </div>
    </section>

    {{-- popup d'ajout --}}
    <section id="add-popup" class="hidden">
        <div id="" tabindex="-1"
            class="bg-black/50 fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="relative bg-white py-4 px-4 shadow sm:rounded-lg sm:px-10">
                    <button class="absolute right-4 top-4" id="close-add-popup" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="product-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <h1 class="text-base font-medium">Ajouter une spécialite ici</h1>
                    <form class="space-y-6" action="{{ route('ajouter_une_specialite') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div>
                            <input type="text" name="specialite" placeholder="Titre de la spécialité"
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900" />
                        </div>
                        <div class="w-full flex justify-center">
                            <button type="submit"
                                class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded-md w-1/2">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        document.getElementById('add-btn').addEventListener('click', function() {
            document.getElementById('add-popup').classList.remove('hidden')
        });
        document.getElementById('close-add-popup').addEventListener('click', function() {
            document.getElementById('add-popup').classList.add('hidden');
        });
    </script>
@endsection
