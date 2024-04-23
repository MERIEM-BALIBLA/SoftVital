<div class="flex flex-wrap justify-center gap-10 py-4">
    @foreach ($medecins as $medecin)
        <div
            class="relative border-2 w-2/5 border-gray-600 hover:border-blue-600 flex px-4 pt-4 pb-20 bg-white rounded-lg">
            {{-- <div class="container flex flex-wrap gap-10 p-4">
    @foreach ($medecins as $medecin)
        <div
            class="relative border-2 w-1/2 border-gray-600 hover:border-blue-600 flex px-4 pt-4 pb-20 bg-white rounded-lg"> --}}
            <div class="absolute right-6 bottom-2 ">

                <a href=""
                    class="animate-bounce focus:animate-none hover:animate-none inline-flex text-md font-medium mt-3 px-4 py-2 rounded-lg tracking-wide text-black flex items-center">
                    Plus de rendez-vous
                    {{-- <span class="ml-2">Bouncing Button 🏀</span> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 32 32">
                        <path fill="black"
                            d="M11.166 23.963L22.36 17.5c1.43-.824 1.43-2.175 0-3L11.165 8.037c-1.43-.826-2.598-.15-2.598 1.5v12.926c0 1.65 1.17 2.326 2.598 1.5z" />
                    </svg>
                </a>
            </div>
            <div class="w-1/2">
                <div class="flex">
                    <div
                        class="relative w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                        @if ($medecin->image)
                            <img class=" rounded-full object-cover" src="{{ asset('storage/' . $medecin->image) }}"
                                alt="Avatar">
                        @else
                            {{-- <img class=" rounded-full object-cover" src="{{asset('assets/images/calandrier.jpg')}}" 
                                alt="Avatar"> --}}
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
                        <h2 class="font-bold text-gray-800 text-lg">{{ $medecin->user_name }}
                        </h2>
                        <p class="text-gray-600">{{ $medecin->specialite }}</p>

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
                        {{-- <h3 class="font-medium text-sm">Nom du cabinet : </h3> --}}
                        <p>{{ $medecin->user_email }}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        {{-- <h3 class="font-medium text-sm">L'adresse du cabinet : </h3> --}}
                        <p>{{ $medecin->user_numero }}</p>
                    </div>
                </div>
                <div class="pr-10">
                    <a href="/single_page/{{ $medecin->id }}">
                        <button
                            class="w-full mt-20 bg-blue-500 text-white hover:bg-blue-800 p-2 rounded-lg text-base font-bold">
                            Voir profil {{ $medecin->nom }}
                        </button>
                    </a>
                </div>
            </div>
            <div class="">
                <section class=" dark:bg-gray-900 antialiased">
                    {{-- <div class="px-8 flex flex-col "> --}}
                    <h2 class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500 text-ce">
                        Horaires d'ouverture pour

                    </h2>
                    <p class="text-xm font-medium text-primary-600 hover:underline dark:text-primary-500">
                        Le {{ $aujourdhui->format('d M Y') }}</p>

                    {{-- </div> --}}
                    <div class="flow-root max-w-3xl mx-auto mt-2 sm:mt-12 lg:mt-16">
                        <div class="-my-4 divide-y divide-gray-200 dark:divide-gray-700">
                            @php $counter = 0; @endphp
                            @if ($horaireTravail->where('user_id', $medecin->user_id)->isEmpty())
                                <div class="bg-red-300 p-4 border-2 border-red-700 rounded-md hover:bg-red-400 mt-20">
                                    <p>Aucun horaire disponible pour ce médecin aujourd'hui.</p>
                                </div>
                            @else
                                @foreach ($horaireTravail->where('user_id', $medecin->user_id) as $horaire)
                                    @if ($counter % 2 == 0)
                                        <div class="flex gap-4 py-4 sm:gap-6 sm:flex-row sm:items-center border-0">
                                        @endif
                                        <div>
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
                                        @php $counter++; @endphp
                                        @if ($counter % 2 == 0 || $loop->last)
                                                                </div>
                                            @endif
    @endforeach
    @endif
</div>
</div>

</section>

</div>

</div>
@endforeach
</div>
