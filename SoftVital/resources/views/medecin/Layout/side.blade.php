<div class="fixed left-0 top-0 w-64 h-full bg-white rounded-xl shadow-lg p-4 z-50 sidebar-menu transition-transform hidden">
    <a href="/" class="flex items-center pb-4 border-b border-b-gray-800">

        <h2 class="font-bold text-2xl">Soft <span class="bg-[#f84525] text-white px-2 rounded-md">Vital</span></h2>
    </a>
    <ul class="mt-4">
        <li class="mb-1 group">
            <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-list-ul mr-3 text-lg'></i>                
                <span class="text-sm">Mes patients</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold">BLOG</span>
        <li class="mb-1 group">
            <a href="{{ route('dashboard_medecin') }}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group relative">
                <i class='bx bxl-blogger mr-3 text-lg'></i>                 
                <span class="text-sm">Poste</span>
            </a>
                    
            <ul class="pl-7 mt-2 hidden group-hover:block">
                <li class="mb-4">
                    <a href="#" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Tout mes postes</a>
                </li> 
                <li class="mb-4">
                    <a href="#" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Postes approuvés</a>
                </li> 
                <li class="mb-4">
                    <a href="#" class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Postes en attentes</a>
                </li> 
            </ul>
        </li>
        
        
        <li class="mb-1 group">
            <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-archive mr-3 text-lg'></i>                
                <span class="text-sm">Réaction</span>
            </a>
        </li>
        <span class="text-gray-400 font-bold">PERSONAL</span>
        <li class="mb-1 group">
            <a href="{{route('dash.profile')}}" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-bell mr-3 text-lg' ></i>                
                <span class="text-sm">Mon profil</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class='bx bx-bell mr-3 text-lg' ></i>                
                <span class="text-sm">Notifications</span>
                <span class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
            </a>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>