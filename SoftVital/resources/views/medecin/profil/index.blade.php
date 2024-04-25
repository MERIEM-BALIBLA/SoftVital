{{-- @include('medecin.Layout.app') --}}
@extends('Layouts.app')

@section('content')

    <section class="bg-gray-200">
        <div class="container bg-gray-200">
            <div class="relative bg-cyan-400 h-80 flex justify-center items-center"
                style="background-image: url('{{ asset('assets/images/background.png') }}'); background-position: center; background-size: cover;">
                <!-- Contenu centré -->
                <button id="editButton">
                    <div class="absolute rounded-full bg-gray-400 p-1 bottom-0 left-32 z-30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M17 12c0 1.7-1.3 3-3 3s-3-1.3-3-3s1.3-3 3-3s3 1.3 3 3m5-5v11c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V7c0-1.1.9-2 2-2V4h4v1h2l1-2h6l1 2h2c1.1 0 2 .9 2 2M7.5 9c0-.8-.7-1.5-1.5-1.5S4.5 8.2 4.5 9s.7 1.5 1.5 1.5S7.5 9.8 7.5 9M19 12c0-2.8-2.2-5-5-5s-5 2.2-5 5s2.2 5 5 5s5-2.2 5-5" />
                        </svg>
                    </div>
                </button>
                <div
                    class="absolute bottom-0 left-10 rounded-full bg-gray-200 text-gray-400 w-36 h-36 border-2 border-white">
                    @if ($user->medecin->image)
                        <img class="w-full h-full rounded-full" src="{{ asset('storage/' . $user->medecin->image) }}"
                            alt="">
                    @else
                        <div>
                            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill="black"
                                    d="M10 2a4 4 0 1 0 3.123 6.5H10v-1h3.71q.192-.474.26-1H10v-1h3.97a4 4 0 0 0-.26-1H10v-1h3.123A4 4 0 0 0 10 2m-4.991 9A2 2 0 0 0 3 13c0 1.691.833 2.966 2.135 3.797C6.417 17.614 8.145 18 10 18c1.694 0 3.282-.322 4.52-1H10v-1h5.836c.283-.3.522-.636.708-1.005H10v-1h6.896A4.7 4.7 0 0 0 17 13v-.005h-7v-1h6.73A2 2 0 0 0 15 11z" />
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container flex md:flex-row flex-col gap-2">
            {{-- left side --}}
            <div class="md:w-1/2 w-full py-2">
                {{-- Information personnelle --}}
                <div class="relative w-full bg-white rounded-lg border border-gray-200 p-6 mb-2">
                    <button class="absolute right-2 top-0" id="personne-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 32 32">
                            <path fill="black"
                                d="M25 4.031c-.766 0-1.516.297-2.094.875L13 14.781l-.219.219l-.062.313l-.688 3.5l-.312 1.468l1.469-.312l3.5-.688l.312-.062l.219-.219l9.875-9.906A2.968 2.968 0 0 0 25 4.03zm0 1.938c.234 0 .465.12.688.343c.445.446.445.93 0 1.375L16 17.376l-1.719.344l.344-1.719l9.688-9.688c.222-.222.453-.343.687-.343zM4 8v20h20V14.812l-2 2V26H6V10h9.188l2-2z" />
                        </svg>
                    </button>


                    {{-- <div class="pl-4 py-1 sm:px-6 bg-gray-500"> --}}
                    <h3 class="text-base leading-6 font-medium text-gray-900 mb-1">
                        Intro
                    </h3>
                    {{-- </div> --}}
                    <div class=" sm:p-0">
                        {{-- <dl class="sm:divide-y sm:divide-gray-200"> --}}
                        <div class="flex justify-between mb-2">
                            <p class="text-sm font-medium text-gray-500">
                                Full name
                            </p>
                            <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->nom }}
                            </p>
                        </div>
                        <div class="flex justify-between mb-2">
                            <p class="text-sm font-medium text-gray-500">
                                Phone number
                            </p>
                            <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->numero }}
                            </p>
                        </div>
                        <div class="flex justify-between mb-2">
                            <p class="text-sm font-medium text-gray-500">
                                Email address
                            </p>
                            <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->email }}
                            </p>
                        </div>
                        <div class="flex justify-between mb-2">
                            <p class="text-sm font-medium text-gray-500">
                                ville
                            </p>
                            <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->ville->nom }}
                            </p>
                        </div>
                        {{-- </dl> --}}
                    </div>
                </div>
                {{-- ---------------------- --}}
                {{-- information de proffession --}}
                <div class="relative w-full bg-white rounded-lg border border-gray-200 p-6 mb-2">
                    <button class="absolute top-0 right-2" id="profession-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 32 32">
                            <path fill="black"
                                d="M25 4.031c-.766 0-1.516.297-2.094.875L13 14.781l-.219.219l-.062.313l-.688 3.5l-.312 1.468l1.469-.312l3.5-.688l.312-.062l.219-.219l9.875-9.906A2.968 2.968 0 0 0 25 4.03zm0 1.938c.234 0 .465.12.688.343c.445.446.445.93 0 1.375L16 17.376l-1.719.344l.344-1.719l9.688-9.688c.222-.222.453-.343.687-.343zM4 8v20h20V14.812l-2 2V26H6V10h9.188l2-2z" />
                        </svg>
                    </button>

                    <h3 class="text-base leading-6 font-medium text-gray-900 mb-1">
                        Intro de proffession
                    </h3>
                    <div class="">
                        {{-- <dl class="sm:divide-y sm:divide-gray-200"> --}}
                        <div class="flex justify-between mb-2">
                            <p class="text-sm font-medium text-gray-500">
                                Spécialité
                            </p>
                            <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->medecin->specialite->specialite }}
                            </p>
                        </div>
                        <div class="flex justify-between mb-2">
                            <p class="text-sm font-medium text-gray-500">
                                Nom du cabinet
                            </p>
                            <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->medecin->cabinet }}
                            </p>
                        </div>

                        <div class="flex justify-between">
                            <p class="text-sm font-medium text-gray-500">
                                Adresse
                            </p>
                            <p class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->medecin->adresse_cabinet }}
                            </p>
                        </div>

                        {{-- </dl> --}}
                    </div>
                </div>
                {{-- ----- --}}
                {{-- supprimer le compte --}}
                <div class="w-full">
                    <Button type="submit" id="suprimer-compte"
                        class="w-full bg-red-700 hover:bg-red-600 py-1 px-2 text-white rounded-md">Supprimer
                        mon compte</Button>
                </div>
                {{-- ------- --}}
            </div>
            {{-- right side --}}
            <div class="w-full">
                <div class="flex flex-col w-full py-2">
                    <div class="p-6 bg-white border-b border-gray-200 mb-2">
                        <h1 class="text-sm font-bold mb-2">Que voulez-vous partager ?</h1>
                        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="flex gap-2 items-center">
                                <div class="w-1/2">
                                    <input type="text" class="border-2 border-gray-500 rounded-md p-1 w-full"
                                        name="title" value="" placeholder="Taper le titre de poste ici *" required>
                                </div>
                                <label class="w-64 flex gap-3 px-2 py-1 text-blue cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                        viewBox="0 0 48 48">
                                        <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                                            <rect width="30" height="30" x="6" y="6" rx="2" />
                                            <path stroke-linecap="round"
                                                d="M42 12v27a3 3 0 0 1-3 3H12M6 25l7.656-6.806a2 2 0 0 1 2.674.015L26 27" />
                                            <path stroke-linecap="round"
                                                d="m22 23l4.785-3.988a2 2 0 0 1 2.48-.063L36 24M6 19v8m30-8v8" />
                                        </g>
                                    </svg>
                                    <span>Photo</span>
                                    <input type='file' class="hidden" name="image" />
                                </label>

                            </div>
                            <div class="">
                                <label class="text-xl text-gray-600">Content <span
                                        class="text-red-500">*</span></label></br>
                                <textarea name="description" class="border-2 border-gray-500">
                                    Taper le titre de poste ici</textarea>
                            </div>
                            <button type="submit"
                                class="w-1/4 mt-2 py-2 bg-blue-700 text-white hover:bg-blue-600 rounded-md"
                                required>Ajouter</button>
                        </form>
                    </div>
                    @if ($posts->isEmpty())
                        <p>Aucun post trouvé pour ce médecin.</p>
                    @else
                        @foreach ($posts as $post)
                            <!-- Blog post with featured image -->
                            <div class="relative w-full border rounded-md bg-white mb-2 flex">
                                <form action="{{ route('destroy', ['post' => $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="absolute right-1 top-1"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="1em" height="1em" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 3c-4.963 0-9 4.038-9 9s4.037 9 9 9s9-4.038 9-9s-4.037-9-9-9m0 16c-3.859 0-7-3.14-7-7s3.141-7 7-7s7 3.14 7 7s-3.141 7-7 7m.707-7l2.646-2.646a.502.502 0 0 0 0-.707a.502.502 0 0 0-.707 0L12 11.293L9.354 8.646a.5.5 0 0 0-.707.707L11.293 12l-2.646 2.646a.5.5 0 0 0 .707.708L12 12.707l2.646 2.646a.5.5 0 1 0 .708-.706z" />
                                        </svg></button>
                                </form>
                                <a href="{{ route('edit', ['post' => $post->id]) }}">
                                    <button class="absolute top-1 right-6" id="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m7 17.013l4.413-.015l9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583zM18.045 4.458l1.589 1.583l-1.597 1.582l-1.586-1.585zM9 13.417l6.03-5.973l1.586 1.586l-6.029 5.971L9 15.006z" />
                                            <path fill="currentColor"
                                                d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2" />
                                        </svg>
                                    </button></a>
                                {{-- <a href="{{ route('edit', ['post' => $post->id]) }}"> edit</a> --}}

                                <div class="w-1/3">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                </div>
                                <div class="p-2">
                                    <div class="flex gap-2 items-center text-base font-medium">
                                        <p>{{ $post->title }}</p>
                                        <span
                                            class="block text-xs text-gray-500 dark:text-gray-400 font-light leading-snug">
                                            {{ $post->created_at }}
                                        </span>
                                    </div>
                                    <p class="text-lg font-light leading-5 text-black"> {!! $post->description !!}</p>
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="flex gap-2 items-center ">
                                            @if ($post->reactions_count === 0)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                                    viewBox="0 0 48 48">
                                                    <path fill="#2f88ff" stroke="white" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="0.5"
                                                        d="M15 8C8.92487 8 4 12.9249 4 19C4 30 17 40 24 42.3262C31 40 44 30 44 19C44 12.9249 39.0751 8 33 8C29.2797 8 25.9907 9.8469 24 12.6738C22.0093 9.8469 18.7203 8 15 8Z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                                    viewBox="0 0 48 48">
                                                    <path fill="#2f88ff" stroke="white" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="0.5"
                                                        d="M15 8C8.92487 8 4 12.9249 4 19C4 30 17 40 24 42.3262C31 40 44 30 44 19C44 12.9249 39.0751 8 33 8C29.2797 8 25.9907 9.8469 24 12.6738C22.0093 9.8469 18.7203 8 15 8Z" />
                                                </svg> {{ $post->reactions_count }}
                                            @endif
                                        </p>
                                        <div class="ml-1 text-gray-500 dark:text-gray-400 font-light">33 comments
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>


    {{-- popup poste --}}
    {{-- <div id="popup_post{{ $key }}"
        class="fixed hidden z-50 bg-gray-500 bg-opacity-25 bg-blur h-full w-full px-4 flex justify-center items-center">
        <div class="relative mx-auto shadow-xl bg-white w-1/2 border-2 rounded-md border-cyan-700">
            <div class="flex justify-end p-2">
                <button id="close_popup_post" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class=" p-6 pt-0 text-center">
                <div class="flex justify-start mb-4">
                    <h2 class="text-sm font-bold ">Tu peut modifier vos informations personnelles ici </h2>
                </div>
                <form method="POST" action="{{ route('update', ['post' => $post->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 flex">
                        <input type="text" class="w-1/2 rounded-md border border-slate-300 bg-white p-2"
                            name="title" value="{{ $post->title }}" required>

                        <input value="{{ $post->image }}" class="w-1/2 rounded-md border border-slate-300 bg-white p-2"
                            type="file" name="image">
                    </div>
                    <div class="">
                        <textarea name="description" class="border-2 border-gray-500 w-full">
                              </textarea>
                    </div>
                    <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                </form>
            </div>

        </div>
    </div> --}}



    {{-- popup pour photo de profil --}}
    <div id="editModal"
        class="z-50 fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-4 rounded-md">
            <form action="{{ route('supprimer_photo_profil') }}" method="POST" class="mb-2">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="bg-red-600 w-64 flex gap-3 px-2 py-1 text-blue rounded-lg shadow-lg border border-blue cursor-pointer text-white hover:bg-red-700">
                    <span class="text-base leading-normal">Supprimer la photo</span>
                </button>
            </form>

            <form action="{{ route('Modifier_profil') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <label
                    class="bg-blue-600 w-64 flex gap-3 px-2 py-1 text-blue rounded-lg shadow-lg border border-blue cursor-pointer hover:text-blue-400 text-white hover:bg-blue-700">
                    <span class="text-base leading-normal">Ajouter une photo</span>
                    <input type='file' class="hidden" name="image" />
                </label>
                <button type="submit"
                    class="px-8 py-2 bg-blue-700 rounded-md text-white text-sm font-bold hover:bg-blue-600 mt-8" required>
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
    {{-- ---------------- --}}

    {{-- information personnelle popup --}}
    <div id="personne-popup"
        class="fixed hidden z-50 bg-gray-500 bg-opacity-25 bg-blur h-full w-full px-4 flex justify-center items-center">
        <div class="relative mx-auto shadow-xl bg-white w-1/2 border-2 rounded-md border-cyan-700">
            <div class="flex justify-end p-2">
                <button id="personne-close" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class=" p-6 pt-0 text-center">
                <div class="flex justify-start mb-4">
                    <h2 class="text-sm font-bold ">Tu peut modifier vos informations personnelles ici </h2>
                </div>
                <form action="{{ route('update_InfoPersonnelle') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex gap-4 mb-4">
                        <input type="text" name="nom"
                            class="w-1/2 rounded-md border border-slate-300 bg-white p-2" placeholder="Full Name *"
                            value="{{ auth()->user()->nom }}" />
                        <input type="email" name="email"
                            class="w-1/2 rounded-md border border-slate-300 bg-white p-2" placeholder="Email *"
                            value="{{ auth()->user()->email }}" />
                    </div>
                    <div class="flex gap-4">
                        <input type="text" name="numero"
                            class="w-1/2 rounded-md border border-slate-300 bg-white p-2" placeholder="Phone Number *"
                            value="{{ auth()->user()->numero }}" />
                        <select name="ville" id=""
                            class="w-1/2 rounded-md border border-slate-300 bg-white p-2">
                            <option value="{{ auth()->user()->ville->id }}">{{ auth()->user()->ville->nom }}</option>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->is }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="px-8 py-2 bg-blue-700 rounded-md text-white text-sm font-bold hover:bg-blue-600 mt-8"
                        required>
                        Enregistrer
                    </button>

                </form>

            </div>

        </div>
    </div>

    {{-- informations professionnelle popup --}}
    <div id="profession-popup"
        class="fixed hidden z-50 bg-gray-500 bg-opacity-25 bg-blur h-full w-full px-4 flex justify-center items-center">
        <div class="relative mx-auto shadow-xl bg-white w-1/2 border-2 rounded-md border-cyan-700">
            <div class="flex justify-end p-2">
                <button id="profession-close" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class=" p-6 pt-0 text-center">
                <div class="flex justify-start mb-4">
                    <h2 class="text-sm font-bold ">Tu peut modifier les informations de votre cabinet </h2>
                </div>
                <form action="{{ route('updateProffesionInfo') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex gap-4 mb-4">
                        <select name="specialite" class="w-1/2 rounded-md border border-slate-300 bg-white p-2">
                            <option value="{{ $user->medecin->specialite_id }}">
                                {{ $user->medecin->specialite->specialite }}</option>
                            @foreach ($specialites as $specialite)
                                <option value="{{ $specialite->id }}">{{ $specialite->specialite }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="cabinet"
                            class="w-1/2 rounded-md border border-slate-300 bg-white p-2" placeholder="Nom du cabinet "
                            value="{{ $user->medecin->cabinet }}" />
                    </div>
                    <div class="flex gap-4">
                        <input type="text" name="adresse"
                            class="w-1/2 rounded-md border border-slate-300 bg-white p-2" placeholder="Adresse du cabinet"
                            value="{{ $user->medecin->adresse_cabinet }}" />
                    </div>

                    <button type="submit"
                        class="px-8 py-2 bg-blue-700 rounded-md text-white text-sm font-bold hover:bg-blue-600 mt-8"
                        required>
                        Enregistrer
                    </button>

                </form>


            </div>

        </div>
    </div>
    {{-- suppression popup --}}
    <div id="modelConfirm"
        class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
        <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

            <div class="flex justify-end p-2">
                <button id="suprimer-compte-close" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 pt-0 text-center">
                <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this user?</h3>
                <div class="flex gap-4">
                    <form action="{{ route('supprimer_mon_compte') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Confirmer
                        </button>
                    </form>
                    <button id="Anuller-supression"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                        data-modal-toggle="delete-user-modal">
                        Non, Annuler
                    </button>
                </div>
            </div>

        </div>
    </div>
    {{-- ---------- --}}
    <script>
        document.getElementById('personne-btn').addEventListener('click', function() {
            document.getElementById('personne-popup').classList.remove('hidden');
        });
        document.getElementById('personne-close').addEventListener('click', function() {
            document.getElementById('personne-popup').classList.add('hidden');
        });

        document.getElementById('profession-btn').addEventListener('click', function() {
            document.getElementById('profession-popup').classList.remove('hidden');
        });
        document.getElementById('profession-close').addEventListener('click', function() {
            document.getElementById('profession-popup').classList.add('hidden');
        });

        // pop up pour supprimer le compte

        document.getElementById('suprimer-compte').addEventListener('click', function() {
            document.getElementById('modelConfirm').classList.remove('hidden');
        });
        document.getElementById('suprimer-compte-close').addEventListener('click', function() {
            document.getElementById('modelConfirm').classList.add('hidden');
        });
        document.getElementById('Anuller-supression').addEventListener('click', function() {
            document.getElementById('modelConfirm').classList.add('hidden');
        });
    </script>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            document.getElementById('editModal').classList.remove('hidden');
        });
        window.addEventListener('click', function(event) {
            var editModal = document.getElementById('editModal');
            if (event.target == editModal) {
                editModal.classList.add('hidden');
            }
        });
    </script>

    {{-- popup pour modifier un poste --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btn_popup_post').addEventListener('click', function() {
                document.getElementById('popup_post').classList.remove('hidden');
            });
            document.getElementById('close_popup_post').addEventListener('click', function() {
                document.getElementById('popup_post').classList.add('hidden');
            });
            document.getElementById('Anuller-modification_poste').addEventListener('click', function() {
                document.getElementById('popup_post').classList.add('hidden');
            });
        });
    </script> --}}

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
