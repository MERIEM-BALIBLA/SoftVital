@extends('Layouts.app')

@section('content')
<!-- component -->

<div class="py-12 ">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    {{-- <form method="POST" action="{{ route('dashboard_medecin.store') }}"> --}}
                    @csrf
                    @method('POST')

                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" value=""
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Image</label></br>
                        <input class="border-2 border-gray-300 p-2 w-full" type="file" name="image">
                    </div>

                    <div class="mb-8">
                        <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                        <textarea name="description" class="border-2 border-gray-500">
                        </textarea>
                    </div>

                    <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description');
</script>
<<<<<<< HEAD
@endsection
=======
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
