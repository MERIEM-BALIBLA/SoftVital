{{-- @include('medecin.Layout.app') --}}

@extends('Layouts.app')

@section('content')
    {{-- <div class="bg-gradient-to-bl from-blue-50 to-violet-50"> --}}

    <!-- component -->
    {{-- <div class=" flex justify-center lg:h-screen"> --}}
    {{-- <div class="container mx-auto p-4"> --}}
    <div class="container flex flex-col sm:flex-row gap-8 mt-24">

        @foreach ($posts as $post)
            <div class="relative bg-white md:w-1/3 w-full border shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}" class="object-cover h-52 w-full" alt="">
                <div class="p-6">
                    <span class="block text-slate-400 font-semibold text-sm">{{ $post->created_at->format('Y-m-d') }}</span>
                    <h3 class="mt-3 font-bold text-lg pb-4 border-b border-slate-300">
                        <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                            {{ $post->title }}</a>
                    </h3>
                    <div class="flex mt-4 gap-4 items-center">
                        <span class="flex gap-1 items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="text-sky-400 w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>

                            {{ $post->count }}
                        </span>
                        <span class="flex gap-1 items-center text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4 text-lime-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                            15
                        </span>
                    </div>
                </div>

                <form action="{{ route('destroy', ['post' => $post->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button> <svg class="absolute top-1 right-1" xmlns="http://www.w3.org/2000/svg" width="1em"
                            height="1em" viewBox="0 0 14 14">
                            <path fill="black" fill-rule="evenodd"
                                d="M1.707.293A1 1 0 0 0 .293 1.707L5.586 7L.293 12.293a1 1 0 1 0 1.414 1.414L7 8.414l5.293 5.293a1 1 0 0 0 1.414-1.414L8.414 7l5.293-5.293A1 1 0 0 0 12.293.293L7 5.586z"
                                clip-rule="evenodd" />
                        </svg></button>
                </form>

                <a href="{{ route('edit', ['post' => $post->id]) }}">
                    <svg class="absolute bottom-1 right-1" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                        viewBox="0 0 24 24">
                        <path fill="black" fill-opacity="0" d="M20 7L17 4L15 6L18 9L20 7Z">
                            <animate fill="freeze" attributeName="fill-opacity" begin="1.2s" dur="0.15s"
                                values="0;0.3" />
                        </path>
                        <g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21H21">
                                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="20;0" />
                            </path>
                            <path stroke-dasharray="44" stroke-dashoffset="44" d="M7 17V13L17 3L21 7L11 17H7">
                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.6s"
                                    values="44;0" />
                            </path>
                            <path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6L18 10">
                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s" dur="0.2s"
                                    values="8;0" />
                            </path>
                        </g>
                    </svg>
                </a>
            </div>
        @endforeach
        <div class="bg-white md:w-1/3 w-fullshadow rounded-lg">

            <a href="{{ route('create') }}" class="">
                <button class="bg-cyan-800 text-gray-200 hover:bg-cyan-700 hover:text-white p-4 rounded-md text-base">
                    Ajouter un nouveau poste
                </button>
            </a>
        </div>

    </div>




    {{-- </div> --}}
@endsection
