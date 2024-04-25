@extends('Layouts.app')
@section('content')

    <div class="w-full h-screen bg-gray-200">
        <div class="w-full py-3 bg-cyan-700">
            <div class="container flex gap-3 items-center">
                @if ($medecin->image)
                    <img alt="content" src="{{ asset('storage/' . $medecin->image) }}"
                        class="rounded-lg border-4 border-white transition duration-200 transform hover:scale-110 w-28 h-28">
                @else
                    <div
                        class="rounded-full w-20 h-20 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill="black"
                                d="M10 2a4 4 0 1 0 3.123 6.5H10v-1h3.71q.192-.474.26-1H10v-1h3.97a4 4 0 0 0-.26-1H10v-1h3.123A4 4 0 0 0 10 2m-4.991 9A2 2 0 0 0 3 13c0 1.691.833 2.966 2.135 3.797C6.417 17.614 8.145 18 10 18c1.694 0 3.282-.322 4.52-1H10v-1h5.836c.283-.3.522-.636.708-1.005H10v-1h6.896A4.7 4.7 0 0 0 17 13v-.005h-7v-1h6.73A2 2 0 0 0 15 11z" />
                        </svg>
                    </div>
                @endif
                <div>
                    <h1 class="font-bold text-3xl text-white">
                        Dr {{ ucfirst(substr($medecin->user_name, 0, 1)) . substr($medecin->user_name, 1) }}
                    </h1>

                    <p class="text-base text-gray-200 font-medium">{{ $medecin->specialite->specialite }}
                    </p>
                </div>
            </div>
        </div>

        <div class="container w-full mt-4 flex">

            @if ($posts->isEmpty())
                <p>Aucun post trouvé pour ce médecin.</p>
            @else
                <div class="mr-4">
                    @foreach ($posts as $post)
                        <div class="dark:bg-gray-800 bg-white flex gap-3 border h-80 mb-4">
                            <div class="w-1/3"> <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                    class="w-full h-full"></div>
                            <div>
                                <p>{{ $post->title }}</p>
                                <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">
                                    {{ $post->created_at }}
                                </span>
                                <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">
                                    {!! $post->description !!}</p>

                                {{-- <div class="relative bg-gray-100 p-6"> --}}

                                {{-- </div> --}}
                                <div class="flex gap-4 items-center mt-5">
                                    <div class="flex gap-2">
                                        <form action="{{ route('add_reaction') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <button
                                                class="py-1.5 px-3 hover:text-green-600 hover:scale-105 hover:shadow text-center border rounded-md border-gray-400 h-8 text-sm flex items-center gap-1 lg:gap-2">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z">
                                                    </path>
                                                </svg>
                                                <span>{{ $post->reactions_count }}</span>
                                            </button>
                                        </form>

                                        <form action="{{ route('delete_reaction', ['reaction' => $post->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="py-1.5 px-3 hover:text-red-600 hover:scale-105 hover:shadow text-center border rounded-md border-gray-400 h-8 text-sm flex items-center gap-1 lg:gap-2">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7.5 15h2.25m8.024-9.75c.011.05.028.1.052.148.591 1.2.924 2.55.924 3.977a8.96 8.96 0 01-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398C20.613 14.547 19.833 15 19 15h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 00.303-.54m.023-8.25H16.48a4.5 4.5 0 01-1.423-.23l-3.114-1.04a4.5 4.5 0 00-1.423-.23H6.504c-.618 0-1.217.247-1.605.729A11.95 11.95 0 002.25 12c0 .434.023.863.068 1.285C2.427 14.306 3.346 15 4.372 15h3.126c.618 0 .991.724.725 1.282A7.471 7.471 0 007.5 19.5a2.25 2.25 0 002.25 2.25.75.75 0 00.75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 002.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384" />
                                                </svg>
                                                <span>Supprimer Réaction</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


            <div>
                <div class="bg-white px-20 py-10 rounded-lg ">
                    <h2 class="mb-2">En résumé</h2>
                    <hr class="mb-2">
                    <div class="w-full">
                        <h2 class="text-sm font-medium mb-2"> Présentation du Medecin</h2>
                        <p class="flex gap-2 items-center justify-start mb-2">
                            <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m16.484 11.976l6.151-5.344v10.627zm-7.926.905l2.16 1.875c.339.288.781.462 1.264.462h.017h-.001h.014c.484 0 .926-.175 1.269-.465l-.003.002l2.16-1.875l6.566 5.639H1.995zM1.986 5.365h20.03l-9.621 8.356a.612.612 0 0 1-.38.132h-.014h.001h-.014a.61.61 0 0 1-.381-.133l.001.001zm-.621 1.266l6.15 5.344l-6.15 5.28zm21.6-2.441c-.24-.12-.522-.19-.821-.19H1.859a1.87 1.87 0 0 0-.835.197l.011-.005A1.856 1.856 0 0 0 0 5.855v12.172a1.86 1.86 0 0 0 1.858 1.858h20.283a1.86 1.86 0 0 0 1.858-1.858V5.855c0-.727-.419-1.357-1.029-1.66l-.011-.005z" />
                            </svg>
                            <span class="text-base font-normal">{{ $medecin->user_email }}</span>
                        </p>
                        <p class="flex gap-2 items-center justify-start mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M20 15.5c-1.2 0-2.5-.2-3.6-.6h-.3c-.3 0-.5.1-.7.3l-2.2 2.2c-2.8-1.5-5.2-3.8-6.6-6.6l2.2-2.2c.3-.3.4-.7.2-1c-.3-1.1-.5-2.4-.5-3.6c0-.5-.5-1-1-1H4c-.5 0-1 .5-1 1c0 9.4 7.6 17 17 17c.5 0 1-.5 1-1v-3.5c0-.5-.5-1-1-1M5 5h1.5c.1.9.3 1.8.5 2.6L5.8 8.8C5.4 7.6 5.1 6.3 5 5m14 14c-1.3-.1-2.6-.4-3.8-.8l1.2-1.2c.8.2 1.7.4 2.6.4z" />
                            </svg>
                            <span class="text-base font-normal">{{ $medecin->telephone }}</span>
                        </p>
                        <p class="flex gap-2 items-center justify-start mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7" />
                            </svg>
                            <span class="text-base font-normal">{{ $medecin->location }}</span>
                        </p>


                    </div>

                    <div class="w-full mt-2">
                        <div class="w-full">
                            <h2 class="text-sm font-medium mb-2"> Présentation du Cabinet</h2>
                            <p class="flex gap-2 items-center justify-start mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M18 14h-4v4h-4v-4H6v-4h4V6h4v4h4" />
                                </svg>
                                <span class="text-base font-normal">{{ $medecin->cabinet }}</span>
                            </p>
                            <p class="flex gap-2 items-center justify-start mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 1024 1024">
                                    <path fill="currentColor"
                                        d="m249.6 417.088l319.744 43.072l39.168 310.272L845.12 178.88zm-129.024 47.168a32 32 0 0 1-7.68-61.44l777.792-311.04a32 32 0 0 1 41.6 41.6l-310.336 775.68a32 32 0 0 1-61.44-7.808L512 516.992z" />
                                </svg>
                                <span class="text-base font-normal">{{ $medecin->adresse_cabinet }}</span>
                            </p>
                        </div>
                    </div>
                    <div class=" w-full mt-2 mb-2 mx-auto">
                        <button id="btn"
                            class="flex items-center gap-2 w-full text-white text-base rounded-md text-center font-medium  px-10 py-2 bg-blue-600 hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M1.5 2a1 1 0 0 0-1 1v9.5a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-2M3.5.5v3m7-3v3M3.5 2h5" />
                                    <path
                                        d="M6.188 4.562a.5.5 0 0 0-.5.5v1.406H4.28a.5.5 0 0 0-.5.5v1.625a.5.5 0 0 0 .5.5h1.407v1.406a.5.5 0 0 0 .5.5h1.625a.5.5 0 0 0 .5-.5V9.093h1.406a.5.5 0 0 0 .5-.5V6.968a.5.5 0 0 0-.5-.5H8.313V5.062a.5.5 0 0 0-.5-.5z" />
                                </g>
                            </svg>
                            <span>
                                Prenez un rendez-vous
                            </span>
                        </button>
                    </div>
                </div>

                <div class="text-center">
                    <h2 class="text-xl font-semibold mb-2 text-gray-500">Medecins de meme specialite
                    </h2>
                    <div class="w-full">
                        @foreach ($decinsMemeSpecialite as $medecin)
                            <div
                                class="mb-4 py-10 bg-gray-100 dark:bg-gray-700 relative shadow-lg overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform">
                                <div class="flex items-center gap-4">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyfHxhdmF0YXJ8ZW58MHwwfHx8MTY5MTg0NzYxMHww&ixlib=rb-4.0.3&q=80&w=1080"
                                        class="w-32 group-hover:w-36 group-hover:h-36 h-32 object-center object-cover rounded-full transition-all duration-500 delay-500 transform" />
                                    <div class="w-fit transition-all transform duration-500">
                                        <h1 class="text-gray-600 dark:text-gray-200 font-bold">
                                            {{ $medecin->nom }}
                                        </h1>
                                        <p class="text-gray-400">{{ $medecin->cabinet }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- comments section --}}
    <div id="popup_comments" tabindex="-1"
        class="bg-black/50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex hidden">
        <div class="relative bg-gray-100 p-6 md:w-1/2 container">
            <button type="button" id="close_comments"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"><svg
                    aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d=" M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414
                                                                                            10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293
                                                                                            5.707a1 1 0 010-1.414z"
                        cliprule="evenodd">
                    </path>
                </svg>
                <span class="sr-only">Close popup</span>
            </button>
            <h2 class="text-lg font-bold mb-4">Comments</h2>
            <div class="flex flex-col space-y-4">

                <div class="bg-white p-2 rounded-md">
                    <h3 class="text-base font-bold">Jane Smith</h3>
                    <p class="text-gray-700 text-sm mb-2">Partager le </p>
                    <p class="text-gray-700 text-sm font-light">I agree with John. Lorem ipsum dolor sit amet, consectetur
                        adipiscing
                        elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>

                <form method="POST" action="">
                    @csrf
                    @method('POST')
                    <h3 class="text-sm font-bold mb-2">Ajouter un commentaire ici</h3>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-4">
                        <textarea class="border-2 border-cyan-900 rounded-md w-full p-2 text-gray-700" id="comment" rows="3"
                            placeholder="Enter your comment"></textarea>
                    </div>
                    <button
                        class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit
                    </button>
                </form>
            </div>
            {{-- </div> --}}
        </div>
    </div>

    {{-- --------------- --}}

    {{-- popup --}}
    @if (auth()->check())
        <div id="popup" tabindex="-1"
            class="hidden bg-black/50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" id="close"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"><svg
                            aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d=" M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414
                                                                                                    10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293
                                                                                                    5.707a1 1 0 010-1.414z"
                                cliprule="evenodd">
                            </path>
                        </svg>
                        <span class="sr-only">Close popup</span>
                    </button>

                    <div class="p-5">
                        <h3 class="text-2xl mb-0.5 font-medium">Prendre un rendez vous le :
                        </h3>
                        <form class="w-full" method="POST" action="{{ route('rendez-vous') }}">
                            @csrf
                            @method('POST')
                            {{-- <input type="hidden" name="" value="{{ $medecin->id }}"> --}}
                            <input type="hidden" name="medecin_id" value="{{ $medecin->id }}">

                            <label for="horaire" class="sr-only">Horaire d'ouverture</label>
                            <select name="event_id" id=""
                                class="mt-4 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1">
                                <option value="Rien selectionné">Rien selectionné</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">
                                        {{ date('m-d H:i', strtotime($event->start)) }} -
                                        {{ date('H:i', strtotime($event->end)) }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit"
                                class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-blue-500 hover:bg-blue-300 p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                                Continue
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- end popup --}}

    <script>
        document.getElementById('btn').addEventListener('click', function() {
            document.getElementById('popup').classList.remove('hidden');
        });
        document.getElementById('close').addEventListener('click', function() {
            document.getElementById('popup').classList.add('hidden');
        });

        // document.getElementById('btn_comment').addEventListener('click', function() {
        //     document.getElementById('popup_comments').classList.remove('hidden');
        // });
        // document.getElementById('close_comments').addEventListener('click', function() {
        //     document.getElementById('popup_comments').classList.add('hidden');
        // });
    </script>


    <div class="w-full">

    </div>
    </div>
    {{-- </div> --}}

    </div>
    </div>

@endsection
