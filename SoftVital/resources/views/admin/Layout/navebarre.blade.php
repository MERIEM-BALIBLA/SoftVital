<header class="flex-shrink-0 border-b">
    <div class="flex items-center justify-between p-2">
      <!-- Navbar left -->
      <div class="flex items-center space-x-3">
        {{-- <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">K-WD</span> --}}
        <span class="font-bold text-3xl lg:hidden">Soft <span class="bg-[#f84525] text-white px-2 rounded-md">Vital</span></span>

        <!-- Toggle sidebar button -->
        <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
          <svg
            class="w-4 h-4 text-gray-600"
            :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <!-- Mobile search box -->
      <div
        x-show.transition="isSearchBoxOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-20"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        <div
          @click.away="isSearchBoxOpen = false"
          class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md"
        >
          <div class="flex items-center flex-1 px-2 space-x-2">
            <!-- search icon -->
            <span>
              <svg
                class="w-6 h-6 text-gray-500"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
              </svg>
            </span>
            <input
              type="text"
              placeholder="Search"
              class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"
            />
          </div>
          <!-- close button -->
          <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
            <svg
              class="w-4 h-4 text-gray-500"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Desktop search box -->
    

      <!-- Navbar right -->
      <div class="relative flex items-center space-x-3">
        <!-- Search button -->

        <!-- avatar button -->
        <div class="relative" x-data="{ isOpen: false }">
          <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
            <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 20 20"><path fill="black" d="M10 9.25c-2.27 0-2.73-3.44-2.73-3.44C7 4.02 7.82 2 9.97 2c2.16 0 2.98 2.02 2.71 3.81c0 0-.41 3.44-2.68 3.44m0 2.57L12.72 10c2.39 0 4.52 2.33 4.52 4.53v2.49s-3.65 1.13-7.24 1.13c-3.65 0-7.24-1.13-7.24-1.13v-2.49c0-2.25 1.94-4.48 4.47-4.48z"/></svg>
          </button>
          <!-- green dot -->
          {{-- <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div> --}}
          {{-- <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div> --}}

          <!-- Dropdown card -->
          <div
            @click.away="isOpen = false"
            x-show.transition.opacity="isOpen"
            class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max"
          >
            <div class="flex flex-col p-4 space-y-1 font-medium border-b">
              <span class="text-gray-800">Ahmed Kamel</span>
              <span class="text-sm text-gray-400">ahmed.kamel@example.com</span>
            </div>
            <ul class="flex flex-col p-2 my-2 space-y-1">
              <li>
                <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
              </li>
              <li>
                <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
              </li>
            </ul>
            <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
              <a href="#">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>