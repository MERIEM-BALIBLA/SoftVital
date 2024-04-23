<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <meta name="csrf-token" content="{{csrf_token()}}"> --}}

    <title>SoftVital</title>
    @vite('resources/css/app.css')
    
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    
    {{-- calandrier script --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

    
    {{-- ----------------- --}}
    {{-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
    </style> --}}
</head>