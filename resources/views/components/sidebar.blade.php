<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar" style="background-color: black !important;">
   <div class="h-full px-3 pb-4 overflow-y-auto" style="background-color: black !important;">
      <ul class="space-y-2 font-medium">
         
         <li>
            <a href="{{ route('gym.data') }}" class="flex items-center p-2 rounded-lg group {{ Request::is('gym/data') ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-add-fill {{ Request::is('gym/data') ? 'text-black' : 'text-white' }}" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                  <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z" />
               </svg>
               <span class="ms-3">Data Gym</span>
            </a>
         </li>

         <li>
            <a href="{{ route('membership') }}" class="flex items-center p-2 rounded-lg group {{ Request::is('membership/membership') ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-vcard-fill {{ Request::is('membership/membership') ? 'text-black' : 'text-white' }}" viewBox="0 0 16 16">
                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
               </svg>
               <span class="ms-3">Membership</span>
            </a>
         </li>

         
         @if(session('role') == 'admin')
         <li>
            <a href="{{ route('akun.data') }}" class="flex items-center p-2 rounded-lg group {{ Request::is('akun/data') ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill {{ Request::is('akun/data') ? 'text-black' : 'text-white' }}" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Data Akun</span>
            </a>
         </li>
         @endif
      </ul>
   </div>
</aside>