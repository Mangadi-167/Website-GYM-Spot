 
    <nav class="w-full z-40 fixed" @if (in_array(Request::segment(1), ['']))
        :class="scrolled ? 'bg-gray-900' :
    'bg-transparent'"
        @else
        :class="scrolled ? 'bg-gray-900' :
    'bg-gray-900'"
        @endif x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 64)">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-2 p-6">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Picture">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white"></span>
            </a>

            
            <div class="flex md:order-2 space-x-3.5 md:space-x-0 rtl:space-x-reverse">
                <!-- Cek apakah pengguna sudah login (ada di session) -->
                @if(Session::has('userdata'))
                <button type="button" class="ms-1 mr-1 flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    <!-- Tampilkan foto profil pengguna yang sudah login -->
                    <img class="w-10 h-10 rounded-full" src="{{ Storage::url(session('userdata')->foto) }}
                        " alt="user photo">
                </button>
                @endif


                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            
            <div class="z-40 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                id="dropdown-user">
                <ul class="py-1">
                    <li>
                    @if (session('role') !== 'member')
                        <a href="{{ route('gym.data') }}" class="flex items-center px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-in-right mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                            Menu Pemilik
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('logout')}}" class="flex items-center px-4 py-2 text-sm text-black hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                            </svg>
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Menu Navbar (visible on desktop) -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border-gray-100 bg-gray-900 md:bg-transparent rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('home.welcome') }}" class="block py-2 px-3 {{ Route::is('home.welcome') ? 
                                'text-yellow-300' : 'text-white' }} hover:text-yellow-300 md:p-0 text-lg" style="transition: color 0.3s ease !important;">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home.pendaftaran') }}" class="block py-2 px-3 {{ Route::is('home.pendaftaran') ? 
                                'text-yellow-300' : 'text-white' }} hover:text-yellow-300 md:p-0 text-lg" style="transition: color 0.3s ease !important;">
                            Pendaftaran
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home.about') }}" class="block py-2 px-3 {{ Route::is('home.about') ? 
                                'text-yellow-300' : 'text-white' }} rounded hover:text-yellow-300 md:p-0 text-lg" style="transition: color 0.3s ease !important;">
                            About
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>