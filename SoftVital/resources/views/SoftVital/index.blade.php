@extends('Layouts.app')

@section('content')
    <style>
        /*Start Animations*/
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0;
            }

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
                                                    -- Start BackGround Animation
                                                    */
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
        <div class="rounded-b-2xl pt-4 md:px-36 flex">
            <div class="w-full md:w-1/2 text-start px-20 relative py-28 z-20">
                <h2 class="text-4xl text-white font-bold title-font mb-4">Vous êtes professionnel de santé ?</h2>
                <p class="text-xl text-gray-300">Comme des milliers de médecins, rejoignez la plateforme santé n°1 en
                    Afrique.</p>
                @if (!auth()->check())
                    <div class="mt-10">
                        <a href="/Authentification" class="bg-gray-900 text-gray-100 px-5 py-3 font-semibold rounded">Je
                            m'inscris</a>
                    </div>
                @endif
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
@endsection
