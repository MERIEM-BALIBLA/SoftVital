<aside x-transition:enter="transition transform duration-300"
    x-transition:enter-start="-translate-x-full opacity-30  ease-in"
    x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300"
    x-transition:leave-start="translate-x-0 opacity-100 ease-out"
    x-transition:leave-end="-translate-x-full opacity-0 ease-in"
    class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
    :class="{ '-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen }">
    <!-- sidebar header -->
    <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{ 'lg:justify-center': !isSidebarOpen }">
        <a href="/" class="p-2 font-bold text-3xl ">
            Soft <span :class="{ 'lg:hidden': !isSidebarOpen }"
                class="bg-[#f84525] text-white px-2 rounded-md">Vital</span>
        </a>
        <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <!-- Sidebar links -->
    <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden">
            <li>
                <a href="#" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                    :class="{ 'justify-center': !isSidebarOpen }">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z">
                            </path>
                        </svg>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
                </a>
            </li>
            <li>
                <div href="#"
                    class="flex items-center pl-2 space-x-2 rounded-md hover:bg-gray-100 hover:text-blue-500">
                    <span>
                        <details class="group">
                            <summary :class="{ 'lg:hidden': !isSidebarOpen }"
                                class="flex items-center justify-between gap-2 py-2 font-medium marker:content-none hover:cursor-pointer">
                                <svg class="hover:fill-blue-500" xmlns="http://www.w3.org/2000/svg" width="2em"
                                    height="2em" viewBox="0 0 16 16">
                                    <path fill="black" d="M8 4H3v3h5zm5 5H8v3h5zm-3-5h3v3h-3zM6 9H3v3h3z" />
                                </svg>
                                <span class="flex gap-2">
                                    <a href="dashboard">
                                        Liste des comptes
                                    </a>
                                </span>
                                <svg class="w-5 h-5 text-gray-500 transition group-open:rotate-90"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>
                            </summary>
                            <article class="pb-4">
                                <ul class="flex flex-col gap-4 mt-4 px-4">
                                    <li class="flex gap-2 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                            viewBox="0 0 24 24">
                                            <path fill="black"
                                                d="M13 11a3 3 0 1 0-3-3a3 3 0 0 0 3 3m0-4a1 1 0 1 1-1 1a1 1 0 0 1 1-1m4.11 3.86a5 5 0 0 0 0-5.72A2.9 2.9 0 0 1 18 5a3 3 0 0 1 0 6a2.9 2.9 0 0 1-.89-.14M13 13c-6 0-6 4-6 4v2h12v-2s0-4-6-4m-4 4c0-.29.32-2 4-2c3.5 0 3.94 1.56 4 2m7 0v2h-3v-2a5.6 5.6 0 0 0-1.8-3.94C24 13.55 24 17 24 17M7.34 8.92l1.16 1.41l-4.75 4.75l-2.75-3l1.16-1.16l1.59 1.58z" />
                                        </svg>
                                        <a href="liste_des_comptes_actives">
                                            Comptes actives
                                        </a>
                                    </li>
                                    <li class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                            viewBox="0 0 24 24">
                                            <path fill="black"
                                                d="M13 11a3 3 0 1 0-3-3a3 3 0 0 0 3 3m0-4a1 1 0 1 1-1 1a1 1 0 0 1 1-1m4.11 3.86a5 5 0 0 0 0-5.72A2.9 2.9 0 0 1 18 5a3 3 0 0 1 0 6a2.9 2.9 0 0 1-.89-.14M13 13c-6 0-6 4-6 4v2h12v-2s0-4-6-4m-4 4c0-.29.32-2 4-2c3.5 0 3.94 1.56 4 2m7 0v2h-3v-2a5.6 5.6 0 0 0-1.8-3.94C24 13.55 24 17 24 17M8 12H0v-2h8Z" />
                                        </svg>
                                        <a href="liste_des_comptes_inactives">
                                            Comptes inactives
                                        </a>
                                    </li>
                                </ul>
                            </article>
                        </details>
                    </span>
                </div>
            </li>
            <li>
<<<<<<< HEAD
                <a href="{{ route('liste_des_specialites') }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                    :class="{ 'justify-center': !isSidebarOpen }">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <g fill="none" stroke="black" stroke-width="1.2">
                                <path
                                    d="M2.906 17.505L5.337 3.718a2 2 0 0 1 2.317-1.623L19.472 4.18a2 2 0 0 1 1.622 2.317l-2.431 13.787a2 2 0 0 1-2.317 1.623L4.528 19.822a2 2 0 0 1-1.622-2.317Z" />
                                <path stroke-linecap="round"
                                    d="m8.929 6.382l7.879 1.389m-8.574 2.55l7.879 1.39M7.54 14.26l4.924.869" />
                            </g>
                        </svg>
                    </span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Liste des spécialités</span>
                </a>
=======
                <div href="#"
                    class="flex items-center pl-2 space-x-2 rounded-md hover:bg-gray-100 hover:text-blue-500">
                    <span>
                        <details class="group">
                            <summary :class="{ 'lg:hidden': !isSidebarOpen }"
                                class="flex items-center justify-between gap-2 py-2 font-medium marker:content-none hover:cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="black" stroke-width="1.2">
                                        <path
                                            d="M2.906 17.505L5.337 3.718a2 2 0 0 1 2.317-1.623L19.472 4.18a2 2 0 0 1 1.622 2.317l-2.431 13.787a2 2 0 0 1-2.317 1.623L4.528 19.822a2 2 0 0 1-1.622-2.317Z" />
                                        <path stroke-linecap="round"
                                            d="m8.929 6.382l7.879 1.389m-8.574 2.55l7.879 1.39M7.54 14.26l4.924.869" />
                                    </g>
                                </svg>
                                <span class="flex gap-2">
                                    <span>
                                        Liste des postes
                                    </span>
                                </span>
                                <svg class="w-5 h-5 text-gray-500 transition group-open:rotate-90"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>
                            </summary>
                            <article class="pb-4">
                                <ul class="flex flex-col gap-4 mt-4 px-4">
                                    <li class="flex gap-2 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                            viewBox="0 0 24 24">
                                            <path fill="black"
                                                d="M5 19V5h7v7h7v1c.7 0 1.37.13 2 .35V9l-6-6H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h8.35c-.22-.63-.35-1.3-.35-2zm9-14.5l5.5 5.5H14zm8.5 12.75L17.75 22L15 19l1.16-1.16l1.59 1.59l3.59-3.59z" />
                                        </svg>
                                        <a href="">
                                            Poste publié
                                        </a>
                                    </li>
                                    <li class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                            viewBox="0 0 24 24">
                                            <path fill="black"
                                                d="M23 18v2h-8v-2zm-10 1c0 .7.13 1.37.35 2H5a2 2 0 0 1-2-2V5c0-1.11.89-2 2-2h10l6 6v4.35c-.63-.22-1.3-.35-2-.35v-1h-7V5H5v14zm1-9h5.5L14 4.5z" />
                                        </svg>
                                        <a href="">
                                            Postes non publié
                                        </a>
                                    </li>
                                </ul>
                            </article>
                        </details>
                    </span>
                </div>
>>>>>>> ab0b16a8d40deba901b275864c75f50097109340
            </li>
            <!-- Sidebar Links... -->
        </ul>
    </nav>
    <!-- Sidebar footer -->
    <div class="flex-shrink-0 p-2 border-t max-h-14">
        <button
            class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring">
            <span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </span>
            <span :class="{ 'lg:hidden': !isSidebarOpen }"> Logout </span>
        </button>
    </div>
</aside>
