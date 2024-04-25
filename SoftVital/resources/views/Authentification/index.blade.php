@extends('Layouts.app')
@section('content')



    <style>
        #regForm {
            background-color: #ffffff;
            width: 70%;
            min-width: 300px;
        }

        */

        /* Style the input fields */
        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>
    <section class="relative w-full h-screen py-20">
        <img class="position-absolute bottom-0 end-0" src="https://cdn.easyfrontend.com/pictures/httpcodes/three.svg"
            alt="" />

        <main class="container relative w-full flex flex-col justify-center items-center md:w-1/2 md:mx-auto">
            <div class=" w-full flex flex-col items-center justify-center text-center">

                <div class="w-full rounded-lg dark:border md:mt-0 xl:p-0 dark:bg-orange-400 dark:border-gray-700">
                    <div class=" space-y-4 md:space-y-6 flex flex-col justify-center">
                        <div class="md:w-2/3 md:mx-auto bg-white p-6 rounded-lg">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-xl dark:text-white">
                                J'ai déjà un compte SoftVital
                            </h1>
                            <form action="{{ route('login') }}" class="md:space-y-6" action="#">
                                @csrf
                                @method('POST')
                                <div class="bg-white rounded-lg mt-4">
                                    <div class="relative bg-inherit">
                                        <input type="email" name="email" id="email" required=""
                                            class="peer bg-transparent h-9 w-full rounded-lg text-gray-700 placeholder-transparent ring-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600"
                                            placeholder="Type inside me" /><label for="username"
                                            class="absolute cursor-text left-4 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Adresse
                                            e-mail</label>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg mt-4">
                                    <div class="relative bg-inherit">
                                        <input type="password" name="password" id="password" placeholder="Mot de passe"
                                            required=""
                                            class="peer bg-transparent h-9 w-full rounded-lg text-gray-700 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600"
                                            placeholder="Type inside me" /><label for="username"
                                            class="absolute cursor-text left-4 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Mot
                                            de passe</label>
                                    </div>
                                </div>
                                <div class="mx-auto w-all mt-4">
                                    <button
                                        class="group relative h-12 w-full overflow-hidden rounded-lg bg-white text-lg shadow">
                                        <div
                                            class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                                        </div>
                                        <span class="relative text-black group-hover:text-white">Se connecter</span>
                                    </button>
                                </div>
                                <div class="ml-3 text-sm sm:my-4 text-center">

                                    <a href="{{ route('forget_password') }}"
                                        class="font-light text-gray-500 dark:text-gray-300">J'ai oublié le mot de
                                        passe</a>
                                    <hr class="w-1/2 mx-auto">
                                </div>
                            </form>
                        </div>
                        <div class="md:w-2/3 md:mx-auto bg-white p-6 rounded-lg">
                            <div class="" id="register-btn">
                                <button id="register-btn"
                                    class="group relative h-12 w-full overflow-hidden rounded-lg bg-white text-lg shadow">
                                    <div
                                        class="absolute inset-0 w-3 bg-slate-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                                    </div>
                                    <span class="relative text-black group-hover:text-white">Inscrivez-vous tant que
                                        Patient</span>
                                </button>
                            </div>
                            <div class="mt-4" id="registerM-btn">
                                <button id="register-btn"
                                    class="group relative h-12 w-full overflow-hidden rounded-lg bg-white text-lg shadow">
                                    <div
                                        class="absolute inset-0 w-3 bg-slate-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                                    </div>
                                    <span class="relative text-black group-hover:text-white">Inscrivez-vous au tant que
                                        medecin</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            {{-- </div> --}}
        </main>

    </section>

    @if ($errors->any())
        <div class="alert alert-danger bg-red-200 text-red-800 p-4 mb-4">
            {{-- <strong>Whoops!</strong> There were some problems with your input.<br><br> --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
        <?php
        // Décoder le texte HTML encodé
        $errorMessage = stripslashes(session('error'));
        ?>
        <script>
            alert("{{ $errorMessage }}");
        </script>
    @endif

    {{-- Register Modal PATIENT --}}
    <section id="register-popup" class="hidden">
        <div id="register-popup" tabindex="-1"
            class="bg-black/50 fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
            <div class="w-2/3 bg-white border-4 rounded-lg shadow relative">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Creer votre compte ici
                    </h3>
                    <button id="register-popup-close" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="product-modal">
                        <svg id="register-popup-close" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="w-full flex justify-center">
                    <form class="w-full" action="{{ route('register') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="grid grid-cols-6 gap-6">
                            <input type="hidden" name="role" value="patient">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Nom
                                    d'utilisateur :</label>
                                <input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="nom d'utilisation" type="text" name="nom">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">CIN
                                    :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="votre cin" type="text" name="cin">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Numéro de
                                    téléphone :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="numéro de téléphone" type="text" name="numero">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Ville
                                    :</label><select
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    name="ville">
                                    @foreach ($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Email
                                    :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="email" name="email">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Mot de
                                    passe :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="password" name="password">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Confirmer
                                    le mot de passe :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="password" name="password_confirmation">
                            </div>

                        </div>
                        <div class="p-6 border-t border-gray-200 rounded-b">
                            <button
                                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Se connecter</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>


    {{-- Register Modal MEDECIN --}}
    <section id="registerM-popup" class="hidden ">
        <div id="register-popup" tabindex="-1"
            class="bg-black/50 fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">

            <div class="w-1/2 bg-white border-4 rounded-lg shadow relative m-10">

                <div class="flex items-start justify-between p-2 rounded-t">
                    <button id="registerM-popup-close" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="product-modal">
                        <svg id="register-popup-close" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="text-center font-extrabold p-4">
                    <h2>Nouveau sur SoftVital ?</h2>
                </div>

                <div class="flex justify-center">
                    {{-- <form action="{{ route('register') }}" method="POST">
                            @csrf
                            @method('post')
                            <div class="grid grid-cols-6 gap-6">
                                <input type="hidden" name="role" value="medecin">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Titre
                                        :</label>
                                    <input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="nom d'utilisation" type="text" name="nom">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">CIN
                                        :</label><input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="votre cin" type="text" name="cin">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Ville
                                        :</label><select
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        name="ville">
                                        @foreach ($villes as $ville)
                                            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Email
                                        :</label><input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        type="email" name="email">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Mot de
                                        passe :</label><input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        type="password" name="password">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Confirmer
                                        le mot de passe :</label><input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        type="password" name="password_confirmation">
                                </div>


                                <div class="col-span-full px-20">
                                    <hr class="border-6 border-gray-300">
                                </div>


                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Spécialité
                                        :</label>
                                    <select
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        name="specialite" id="">
                                        <option value="">rien</option>
                                        @foreach ($specialites as $specialite)
                                            <option value="{{ $specialite->id }}">{{ $specialite->specialite }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Nom du
                                        cabinet :</label><input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        type="text" name="cabinet">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Numéro de
                                        téléphone :</label><input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        placeholder="numéro de téléphone" type="text" name="numero">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Addresse
                                        :</label><input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        type="text" name="adresse_cabinet">
                                </div>


                            </div>
                            <div class="p-6 border-t border-gray-200 rounded-b">
                                <button
                                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Se connecter</button>
                            </div>
                        </form> --}}
                    <form action="{{ route('register') }}" method="POST" id="regForm">
                        @csrf
                        @method('post')
                        {{-- <h1>Register:</h1> --}}

                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <input type="hidden" name="role" value="medecin">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Titre
                                    :</label>
                                {{-- <input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="nom d'utilisation" type="text" name="nom"
                                    oninput="this.className = ''" id="nom" oninput="validateInput(this)"> --}}
                                <input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="nom d'utilisation" type="text" name="nom"
                                    oninput="this.className=''; validateInput(this);" id="nom">

                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">CIN
                                    :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="votre cin" type="text" name="cin" oninput="this.className = ''"
                                    id="cin">
                            </div>

                        </div>

                        <div class="tab">Contact Info:
                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Ville
                                    :</label><select
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    name="ville" oninput="this.className = ''" id="ville">
                                    @foreach ($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Email
                                    :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="email" name="email" oninput="this.className = ''" id="email">
                            </div>
                        </div>

                        <div class="tab">Birthday:
                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Mot de
                                    passe :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="password" name="password" oninput="this.className = ''" id="password">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Confirmer
                                    le mot de passe :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="password" name="password_confirmation" oninput="this.className = ''"
                                    id="password">
                            </div>
                        </div>

                        <div class="tab">Login Info:
                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Spécialité
                                    :</label>
                                <select
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    name="specialite" id="" oninput="this.className = ''" id="specialite">
                                    <option value="">rien</option>
                                    @foreach ($specialites as $specialite)
                                        <option value="{{ $specialite->id }}">{{ $specialite->specialite }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Nom du
                                    cabinet :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="text" name="cabinet" oninput="this.className = ''" id="cabinet">
                            </div>
                        </div>
                        <div class="tab">Login Info:
                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Numéro de
                                    téléphone :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="numéro de téléphone" type="text" name="numero"
                                    oninput="this.className = ''" id="telephone">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Addresse
                                    :</label><input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    type="text" name="adresse_cabinet" oninput="this.className = ''" id="adresse">
                            </div>
                            {{-- <input type="hidden" name="image" value="src="{{asset('assets/image/calandreier.pnj')}}""> --}}
                        </div>



                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

                                {{-- @if
                                @endif --}}
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
    {{-- </div> --}}
    <script>
        // patient
        document.getElementById('register-btn').addEventListener('click', function() {
            document.getElementById('register-popup').classList.remove('hidden')
        });
        document.getElementById('register-popup-close').addEventListener('click', function() {
            document.getElementById('register-popup').classList.add('hidden');
        });

        // medecin
        document.getElementById('registerM-btn').addEventListener('click', function() {
            document.getElementById('registerM-popup').classList.remove('hidden')

        });
        document.getElementById('registerM-popup-close').addEventListener('click', function() {
            document.getElementById('registerM-popup').classList.add('hidden');
        });
    </script>
    {{-- <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script> --}}
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("nextBtn").setAttribute("onclick", "submitForm()");
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
                document.getElementById("nextBtn").setAttribute("onclick", "nextPrev(1)");
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }


        function validateInput(input) {
            var value = input.value;
            if (value.length < 3) {
                // Vérifiez d'abord si la classe invalid-input est déjà présente
                if (!input.classList.contains('invalid-input')) {
                    // Si elle n'est pas présente, ajoutez-la
                    input.classList.add('invalid-input');
                }
            } else {
                // Si la saisie est valide, assurez-vous que la classe invalid-input est retirée
                input.classList.remove('invalid-input');
            }
        }



        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:

            // If it's the first tab, call validateNom
            // valid = validation();f
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                    // } else {
                    //     // Valider la saisie de chaque champ avec validateInput(input)
                    //     validateInput(y[i]);
                }

            }

            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }

        function submitForm() {
            // This function submits the form
            document.getElementById("regForm").submit();
        }

        function validation() {
            var nomInput = document.getElementById('nom');
            var cinInput = document.getElementById('cin');
            var emailInput = document.getElementById('email');
            var passwordInput = document.getElementById('password');
            var cabinetInput = document.getElementById('cabinet');
            var numeroInput = document.getElementById('numero');
            var nomInput = document.getElementById('adresse');
        }
    </script>

@endsection
