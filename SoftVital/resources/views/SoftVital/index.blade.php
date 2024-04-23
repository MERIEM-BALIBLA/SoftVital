@extends('Layouts.app')

@section('content')
    <style>
<<<<<<< HEAD
        /*Start Animations*/
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0;
            }

=======
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        /*Start Animations*/
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0;
            }

>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
            to {
                top: 0;
                opacity: 1;
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0;
            }

            to {
                top: 0;
                opacity: 1;
            }
        }

        @-webkit-keyframes zoomIn {
            0% {
                opacity: 0;
                -webkit-transform: scale3d(0.3, 0.3, 0.3);
                transform: scale3d(0.3, 0.3, 0.3);
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                -webkit-transform: scale3d(0.3, 0.3, 0.3);
                transform: scale3d(0.3, 0.3, 0.3);
            }

            50% {
                opacity: 1;
            }
        }

        /*End Animations*/
        /*
<<<<<<< HEAD
                                                -- Start BackGround Animation
                                                */
=======
            -- Start BackGround Animation
            */
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
        .area {
            /* background: #575edf; */
            /* dark:background-image:#575edf; */
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;
            z-index: -1;
        }


        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 96%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

<<<<<<< HEAD

        /* slider */
        $bg-color: #222;
        $margin: 20px;

        body {
            color: #333;
            text-align: center;
            background: $bg-color;
            margin: 0;
        }

        ul {
            padding: 0;
        }

        li {
            list-style: none;
        }


        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 0;

            h1 {
                margin-bottom: 50px;
            }
        }

        .wrapper {
            position: relative;

            // Gradient side fade

            &:before,
            &:after {
                position: absolute;
                top: 0;
                z-index: 1;

                content: "";
                display: block;
                width: $margin;
                height: 100%;
            }

            &:before {
                left: 0;
                background: linear-gradient(90deg, $bg-color, transparent);
            }

            &:after {
                right: 0;
                background: linear-gradient(-90deg, $bg-color, transparent);
            }
        }

        .items {
            position: relative;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            font-size: 0;
            cursor: pointer;

            &.active {
                cursor: grab;
            }
        }

        .item {
            display: inline-block;
            margin-left: $margin;
            /* user-select: none; */

            /* background: tomato; */
            width: 50%;
            /* height: 130px; */
            /* color: $bg-color; */
            font-size: 33px;
            font-weight: bold;
            line-height: 130px;

            &:last-child {
                margin-right: $margin;
            }
        }

        @media screen and (min-width: 500px) {

            .item {
                width: 33%;
            }
        }

        @media screen and (min-width: 800px) {

            .item {
                width: 25%;
            }
        }

        @media screen and (min-width: 1200px) {

            .wrapper {
                margin-left: -$margin;
            }

            .item {
                width: 20%;
            }
        }
    </style>
=======
       
    </style>
    
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
    <div class="relative w-full mb-4 rounded-b-2xl area bg-indigo-500 dark:bg-orange-500">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
<<<<<<< HEAD
        <div class="rounded-b-2xl pt-4 md:px-36 flex">
            <div class="w-full md:w-1/2 text-start px-20 relative py-28 z-20">
                <h2 class="text-4xl text-white font-bold title-font mb-4">Vous êtes professionnel de santé ?</h2>
                <p class="text-xl text-gray-300">Comme des milliers de médecins, rejoignez la plateforme santé n°1 en
                    Afrique.</p>

                <div class="mt-10">
                    <a href="/Authentification" class="bg-gray-900 text-gray-100 px-5 py-3 font-semibold rounded">Je
                        m'inscris</a>
                </div>
            </div>
            <div class="w-1/2 md:block hidden">
                <img class="w-full h-full" src="{{ asset('assets/images/docteur.png') }}" alt="">
            </div>
        </div>

    </div>


    <div class="container py-10 pt-10">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    SoftVital en chiffres
                </h2>
                <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                    Accédez à la plateforme santé n°1 en Afrique
                </p>
            </div>
        </div>
        <div class="mt-10 pb-1">
            <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto">
                        <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                            <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                    de patients
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-gray-700">500+</dd>
                            </div>
                            <div
                                class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                    utilisateurs professionnels

                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-gray-700">58%</dd>
                            </div>
                            <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                                <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                    evenements
                                </dt>
                                <dd class="order-1 text-5xl font-extrabold text-gray-700">30+</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Slider --}}
    <div class="px-4 w-full">
        <div class="wrapper py-10">
            <ul class="items">
                @foreach ($medecins as $medecin)
                    <li class="item">
                        <div class="w-96 bg-base-100 border">
                            <div class="w-full h-48"> <!-- Utilisation de h-48 pour une hauteur de 12rem -->
                                @if ($medecin->image)
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $medecin->image) }}"
                                        alt="">
                                @else
                                    <div class="w-full h-full">
                                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="3em"
                                            height="3em" viewBox="0 0 20 20">
                                            <path fill="black"
                                                d="M10 2a4 4 0 1 0 3.123 6.5H10v-1h3.71q.192-.474.26-1H10v-1h3.97a4 4 0 0 0-.26-1H10v-1h3.123A4 4 0 0 0 10 2m-4.991 9A2 2 0 0 0 3 13c0 1.691.833 2.966 2.135 3.797C6.417 17.614 8.145 18 10 18c1.694 0 3.282-.322 4.52-1H10v-1h5.836c.283-.3.522-.636.708-1.005H10v-1h6.896A4.7 4.7 0 0 0 17 13v-.005h-7v-1h6.73A2 2 0 0 0 15 11z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h2 class="text-base font-medium">{{ $medecin->name }}</h2>
                                <p class="text-sm font-light">{{ $medecin->email }}</p>
                                <p class="text-sm font-light">{{ $medecin->telephone }}</p>
                                <div class="pr-10">
                                    <div class="">
                                        <a href="/single_page/{{ $medecin->id }}"
                                            class="inline-block text-center text-lg font-medium text-gray-100 bg-cyan-900 border-solid border-2 rounded-md border-cyan-800 py-1 px-10 hover:bg-cyan-800 hover:text-white hover:shadow-md md:w-48">Voir
                                            le profil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="px-2 py-20 w-full flex justify-center">
        <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg rounded-lg">
            <div class="lg:w-1/2">
                <div class="lg:scale-110 h-80 bg-cover lg:h-full rounded-b-none border lg:rounded-lg"
                    style="background-image:url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97')">
                </div>
            </div>
            <div class="py-12 px-6 lg:px-12 max-w-xl lg:max-w-5xl lg:w-1/2 rounded-t-none border lg:rounded-lg">
                {{-- <h2 class="text-3xl text-gray-800 font-bold">
                    Pourquoi choisir SoftVital ?

                    <span class="text-indigo-600">Choices</span>
                </h2> --}}
                <h2 class="text-xl text-cyan-950 font-medium uppercase lg:text-4xl">Pourquoi choisir SoftVital ?
                </h2>
                <p class="font-medium text-gray-900 text-2xl">
                    Un cabinet plus visible, grâce à la présence puissante de DabaDoc sur le digital
                </p>
                <p class="mt-4 text-gray-600">
                    Les patients peuvent vous trouver facilement grâce au référencement naturel sur les moteurs de
                    recherche.
                </p>

            </div>
        </div>
    </div>

    <!-- https://gist.github.com/goodreds/3d044027175954984fb96c7407a955ab -->

    <!-- Container -->
    <div
        class="container relative flex flex-col items-center mx-auto lg:flex-row-reverse lg:max-w-5xl lg:mt-12 xl:max-w-6xl mb-4">

        <!-- Image Column -->
        <div class="w-full h-64 lg:w-1/2 lg:h-auto">
            <img class="h-full w-full object-cover" src="{{ asset('assets/images/index2.png') }}"
                alt="Winding mountain road">
        </div>
        <!-- Close Image Column -->

        <!-- Text Column -->
        <div
            class="max-w-lg bg-white md:max-w-2xl md:z-10 md:shadow-lg md:absolute md:top-0 md:mt-48 lg:w-3/5 lg:left-0 lg:mt-20 lg:ml-20 xl:mt-24 xl:ml-12">
            <!-- Text Wrapper -->
            <div class="flex flex-col p-12 md:px-16">
                <h2 class="text-xl text-cyan-950 font-medium uppercase lg:text-4xl">Davantage de flux grâce à la prise de
                    RDV 24/24
                </h2>
                <p class="mt-4 text-gray-600">
                    Profitez d'un profil personnalisé qui regroupe toutes les informations concernant votre cabinet, ainsi
                    que les créneaux horaires disponibles dans votre agenda.
                </p>
                <!-- Button Container -->
                <div class="mt-8">
                    <a href="#"
                        class="inline-block w-full text-center text-lg font-medium text-gray-100 bg-cyan-900 border-solid border-2 border-cyan-800 py-4 px-10 hover:bg-cyan-800 hover:text-white hover:shadow-md md:w-48">Je
                        m'inscris</a>
=======
        <div class=" py-40 px-10 rounded-b-2xl " {{-- style="opacity:3;" --}}>
            <div class="text-start px-20 relative z-10 w-full">
                {{-- <h2>Vous êtes professionnel de santé ?</h2> --}}
                <h2 class="text-4xl text-black font-bold title-font mb-4">Vous êtes professionnel
                    de santé ?
                </h2>
                <p class="text-xl text-gray-300">Comme des milliers de médecins, rejoignez la plateforme santé n°1 en Afrique.</p>

                {{-- <div class="sm:w-2/3 my-auto mx-auto px-4">
                    <form class=" ">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative flex">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border-r  border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Mockups, Logos..." />
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border-r  border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Mockups, Logos..." />
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border-r  border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Mockups, Logos..." />

                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>

                </div> --}}
            </div>
        </div>


    </div>

    <div class="md:absolute flex md:flex-row flex-col justify-center gap-8 md:top-80 md:left-0 md:right-0 mx-auto">

        <div
            class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl  sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-all duration-300 group-hover:scale-[10]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-10 w-10 text-white transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                    <p>Perfect for learning how the framework works, prototyping a new idea, or creating a demo to share
                        online.</p>
                </div>
                <div class="pt-5 text-base font-semibold leading-7">
                    <p>
                        <a href="#" class="text-sky-500 transition-all duration-300 group-hover:text-white">Read the
                            docs
                            &rarr;
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div
            class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-all duration-300 group-hover:scale-[10]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-10 w-10 text-white transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                    <p>Perfect for learning how the framework works, prototyping a new idea, or creating a demo to share
                        online.</p>
                </div>
                <div class="pt-5 text-base font-semibold leading-7">
                    <p>
                        <a href="#" class="text-sky-500 transition-all duration-300 group-hover:text-white">Read the
                            docs
                            &rarr;
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div
            class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-all duration-300 group-hover:scale-[10]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-10 w-10 text-white transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                    <p>Perfect for learning how the framework works, prototyping a new idea, or creating a demo to share
                        online.</p>
                </div>
                <div class="pt-5 text-base font-semibold leading-7">
                    <p>
                        <a href="#" class="text-sky-500 transition-all duration-300 group-hover:text-white">Read the
                            docs
                            &rarr;
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <section class="text-gray-600 body-font md:mt-56 dark:bg-gray-950">
        <div class="container px-5 py-24 mx-auto">
            <h2 class="sm:text-3xl text-2xl font-medium title-font text-center text-gray-900 mb-20">SoftVital <br> au
                service de votre santé</h2>
            <div class=" sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">

                <div class="flex md:flex-row mb-10 items-center">
                    <div class="rounded-lg w-1/3 overflow-hidden">
                        <img alt="content" class="object-cover object-center "
                            src="{{ asset('assets/images/calender.png') }}">
                    </div>
                    <div class="">
                        <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Planifiez un rendez-vous sans
                            nécessité de déplacement.</h2>
                        <button
                            class="flex mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                    </div>
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
                </div>
            </div>
            <!-- Close Text Wrapper -->
        </div>
        <!-- Close Text Column -->

    </div>
    <div class="px-2 py-20 w-full flex justify-center">
        <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg rounded-lg">
            <div class="lg:w-1/2">
                <div class="lg:scale-110 h-80 bg-cover lg:h-full rounded-b-none border lg:rounded-lg"
                    style="background-image:url('{{ asset('assets/images/index3.png') }}');background-position: center;
                    background-size: cover">
                </div>
            </div>
            <div class="py-12 px-6 lg:px-12 max-w-xl lg:max-w-5xl lg:w-1/2 rounded-t-none border lg:rounded-lg">
                <h2 class="text-xl text-cyan-950 font-medium uppercase lg:text-4xl">Agenda intelligent
                </h2>
                <p class="mt-4 text-gray-600">
                    SoftVital met à la disposition de votre cabinet un agenda intelligent qui synchronise les rendez-vous
                    reçus à travers la plateforme, et les rendez-vous pris directement au cabinet.</p>

            </div>
        </div>
    </div>

    <section class="px-6 sm:px-10 md:px-24 lg:px-40 py-10">
        <div class="rounded-xl"
            style="background-image: url('{{ asset('assets/images/bg.jpg') }}');background-position: center; background-size: cover;">
            <div class="relative flex flex-col md:flex-row py-10 md:px-60 justify-between items-center sm:gap-10 bg-blue-500 bg-opacity-25 hover:bg-orange-400 hover:shadow-lg transition-colors duration-300"
                style="">

                {{-- <h4 class="text-black font-bold text-3xl sm:text-4xl lg:text-5xl hover:text-white">SoftVital c'est...</h4> --}}
                <div class="">
                    <h1 id="typewriter" class="text-4xl font-medium text-gray-700 "></h1>
                </div>
                <div class="flex flex-col md:flex-row md:gap-32 mt-6 sm:mt-0">
                    <div class="text-center">
                        <span class="font-medium text-2xl sm:text-3xl lg:text-4xl text-blue-500">80 millions</span>
                        <br>
                        <span class="text-gray-500">de patients</span>
                    </div>
                    <div class="text-center">
                        <span class="font-medium text-2xl sm:text-3xl lg:text-4xl text-indigo-800">900 000</span>
                        <br>
                        <span class="text-gray-500">utilisateurs professionnels</span>
                    </div>
                    <div class="text-center">
                        <span class="font-medium text-2xl sm:text-3xl lg:text-4xl text-indigo-800">97%</span>
                        <br>
                        <span class="text-gray-500">evenements</span>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <div class="slideshow-container w-full">
        <div>
            @foreach ($posts as $post)
                <div class="mySlides1 w-10/12 mx-auto">
                    <div class="flex">
                        <div class="flex bg-gray-100 border p-4 rounded-lg">
                            <div class="flex flex-col w-2/3 pr-4 bg">
                                <p class="text-2xl font-medium mb-2 text-black">{{ $post->title }}</p>
                                <p class="text-lg font-light leading-5 text-black"> {!! $post->description !!}</p>
                                <p class="text-lg font-light leading-5 text-gray-700 mt-6">{{ $post->user->nom }}</p>
                                <div class="flex h-full items-end text-gray-300 hover:text-gray-50">
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

                                </div>
                            </div>
                            <div class="w-1/3">
                                <img class="w-full hover:animate-bounce rounded-lg"
                                    src="{{ asset('storage/' . $post->image) }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
    </div>



<<<<<<< HEAD
    <script src="{{ asset('assets/js/slider.js') }}"></script>


    {{-- slider --}}

    <script>
        let isDown = false;
        let startX;
        let scrollLeft;
        const slider = document.querySelector('.items');

        const end = () => {
            isDown = false;
            slider.classList.remove('active');
        }

        const start = (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX || e.touches[0].pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        }

        const move = (e) => {
            if (!isDown) return;

            e.preventDefault();
            const x = e.pageX || e.touches[0].pageX - slider.offsetLeft;
            const dist = (x - startX);
            slider.scrollLeft = scrollLeft - dist;
        }

        (() => {
            slider.addEventListener('mousedown', start);
            slider.addEventListener('touchstart', start);

            slider.addEventListener('mousemove', move);
            slider.addEventListener('touchmove', move);

            slider.addEventListener('mouseleave', end);
            slider.addEventListener('mouseup', end);
            slider.addEventListener('touchend', end);
        })();
    </script>

    <footer>
        @include('layouts.footer')

    </footer>
=======
        </div>
    </section>



    <div class="slideshow-container w-full">
        <div>
            @foreach ($posts as $post)
                <div class="mySlides1 w-10/12 mx-auto">
                    <div class="flex">
                        <div class="flex bg-blue-500 p-4 rounded-lg">
                            <div class="flex flex-col w-2/3 pr-4 bg">
                                <p class="text-2xl font-black mb-2 text-gray-50">{{ $post->title }}</p>
                                <p class="text-lg font-light leading-5 text-gray-300">{{ $post->description }}.</p>
                                <p class="text-lg font-light leading-5 text-gray-300 mt-6">{{ $post->user->nom }}</p>
                                {{-- <p>{{ $post->user->medecin->specialite->specialite }}</p> --}}

                                <div class="flex h-full items-end text-gray-300 hover:text-gray-50">
                                    <button class="text-sm font-semibold flex items-center space-x-2">
                                        <span>BOOK NOW</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="w-1/3">
                                <img class="w-full hover:animate-bounce rounded-lg"
                                    src="{{ asset('storage/' . $post->image) }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
    </div>



    <script src="{{ asset('assets/js/slider.js') }}"></script>

    
    
    <script>
    const words = ["SoftVital", "presente"]
    let i = 0;
    let j = 0;
    let currentWord = "";
    let isDeleting = false;
    
    function type() {
      currentWord = words[i];
      if (isDeleting) {
        document.getElementById("typewriter").textContent = currentWord.substring(0, j-1);
        j--;
        if (j == 0) {
          isDeleting = false;
          i++;
          if (i == words.length) {
            i = 0;
          }
        }
      } else {
        document.getElementById("typewriter").textContent = currentWord.substring(0, j+1);
        j++;
        if (j == currentWord.length) {
          isDeleting = true;
        }
      }
      setTimeout(type, 300);
    }
    
    type();
    </script>
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
@endsection
