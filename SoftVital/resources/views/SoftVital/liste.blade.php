<div class="p-4">
    @unless ($medecins->count() == 0)
        @foreach ($medecins as $medecin)
            <div class="p-2 border border-gray-600 hover:border-blue-600 flex px-4 pt-4 pb-20 bg-white rounded-md mb-4">
                <div class="w-1/2">
                    <div class="flex">
                        <div
                            class="relative w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                            @if ($medecin->image)
                                <img class=" rounded-full object-cover" src="{{ asset('storage/' . $medecin->image) }}"
                                    alt="Avatar">
                            @else
                                <div class=" rounded-full object-cover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em"
                                        viewBox="0 0 20 20">
                                        <path fill="black"
                                            d="M10 2a4 4 0 1 0 3.123 6.5H10v-1h3.71q.192-.474.26-1H10v-1h3.97a4 4 0 0 0-.26-1H10v-1h3.123A4 4 0 0 0 10 2m-4.991 9A2 2 0 0 0 3 13c0 1.691.833 2.966 2.135 3.797C6.417 17.614 8.145 18 10 18c1.694 0 3.282-.322 4.52-1H10v-1h5.836c.283-.3.522-.636.708-1.005H10v-1h6.896A4.7 4.7 0 0 0 17 13v-.005h-7v-1h6.73A2 2 0 0 0 15 11z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h2 class="font-bold text-gray-800 text-lg">{{ $medecin->user->nom }}
                            </h2>
                            <p class="text-gray-600">{{ $medecin->specialite->specialite }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pr-10">
                        <div class="bg-gray-400 ">
                            <h2 class="text-sm font-medium">Présentation du cabinet: </h2>
                        </div>
                        <div class="flex gap-2 items-center">
                            <h3 class="font-medium text-sm">Nom du cabinet : </h3>
                            <p>{{ $medecin->cabinet }}</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <h3 class="font-medium text-sm">L'adresse du cabinet : </h3>
                            <p>{{ $medecin->adresse_cabinet }}</p>
                        </div>
                    </div>
                    <div class="mt-4 pr-10">
                        <div class="bg-gray-400 ">
                            <h2 class="text-sm font-medium">Contact : </h2>
                        </div>
                        <div class="flex gap-2 items-center">
                            <p>{{ $medecin->user_email }}</p>
                        </div>
                        <div class="flex gap-2 items-center">
                            <p>{{ $medecin->user_numero }}</p>
                        </div>
                    </div>
                    <div class="pr-10">
                        <a href="/single_page/{{ $medecin->id }}">
                            <button
                                class="w-full mt-8 bg-blue-500 text-white hover:bg-blue-800 p-2 rounded-lg text-base font-bold">
                                Voir profil {{ $medecin->nom }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class=" dark:bg-gray-900 antialiased">
                        <h2 class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500 text-ce">
                            Horaires d'ouverture pour

                        </h2>
                        <p class="text-xm font-medium text-primary-600 hover:underline dark:text-primary-500 my-2">
                            Le {{ $aujourdhui->format('d M Y') }}</p>
                        <div class="mt-4 sm:mt-12 lg:mt-16 flex flex-wrap gap-4">

                            @if ($horaireTravail->where('user_id', $medecin->user_id)->isEmpty())
                                <div class="bg-red-300 p-4 border-2 border-red-700 rounded-md hover:bg-red-400">
                                    <p>Aucun horaire disponible pour ce médecin aujourd'hui.</p>
                                </div>
                            @else
                                @foreach ($horaireTravail->where('user_id', $medecin->user_id) as $horaire)
                                    <div class="md:mb-4">
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
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="/single_page/{{ $medecin->id }}"
                            class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold text-indigo-600 transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-50 group">
                            <span
                                class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-indigo-600 group-hover:h-full"></span>
                            <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                            <span
                                class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                            <span
                                class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-white">Plus
                                de rendez-vous</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center p-4">No result</p>
    @endunless
</div>
