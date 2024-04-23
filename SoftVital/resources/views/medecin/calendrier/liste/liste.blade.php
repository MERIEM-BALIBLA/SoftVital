{{-- @extends('Layouts.app')

@section('content')

<section class="container mx-auto p-6 font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg mt-24">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 py-3">Patient</th>
              <th class="px-4 py-3">Date</th>
              <th class="px-4 py-3">Operation</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($events as $event)
            <tr class="text-gray-700">
              <td class="px-4 py-3 border">
                <div class="flex items-center text-sm">
                  <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold text-black">{{$event->title}}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-ms border">
                <p class="text-sm text-gray-600">{{$event->start}}</p>
                <p class="text-sm text-gray-600">{{$event->end}}</p>
            </td>
              {{-- <td class="px-4 py-3 text-xs border">
                {{-- <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">  </span> --}
                <a 
                >
                    <button class="">Modifier</button>
                </a>
              </td> --}
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>

@endsection --}}