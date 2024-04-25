@extends('Layouts.app')
@section('content')

    <div class="relative bg-gray-200 h-screen py-4">
        <img class="position-absolute bottom-0 end-0" src="https://cdn.easyfrontend.com/pictures/httpcodes/three.svg"
            alt="" />
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 container">
            <div class="relative bg-white overflow-hidden shadow-sm sm:rounded-lg pt-4 w-1/2 md:mx-auto">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            {{-- <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br> --}}
                            <input type="text" class="border-2 border-gray-300 p-2 w-full rounded-md" name="title"
                                value="{{ $post->title }}" required>
                        </div>
                        <div class="mx-auto">
                            <input value="{{ $post->image }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                type="file" name="image">
                        </div>
                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                            <textarea name="description" class="border-2 border-gray-500">{{ $post->description }}
                            </textarea>
                        </div>
                        <button type="submit" class="py-2 w-1/3 rounded-md bg-blue-700 text-white hover:bg-blue-600" required>Enregistrer</button>
                    </form>
                </div>
                <a class="absolute top-2" href="{{ route('dash.profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                        <path fill="none" stroke="black" stroke-miterlimit="10" stroke-width="32"
                            d="M256 64C150 64 64 150 64 256s86 192 192 192s192-86 192-192S362 64 256 64Z" />
                        <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                            d="m296 352l-96-96l96-96" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description');
    </script>

@endsection
