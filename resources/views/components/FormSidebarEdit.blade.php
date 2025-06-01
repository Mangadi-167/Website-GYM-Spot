<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-6 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar" style="background-color: black !important;">
   <div class="h-full px-2 pb-4 overflow-y-auto" style="background-color: black !important;">
     
      <a href="{{ route('gym.data') }}" class="flex items-center ps-2.5 mb-5 gap-3 bg-black ms-8">
         <img src="{{ asset('images/logo.PNG') }}" class="h-8" alt="Picture">
         <span class="self-center text-xl font-semibold whitespace-nowrap text-white dark:text-white">Gym Spot</span>
      </a>

      
      <ul class="space-y-2 font-medium">
        
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg group {{ Route::currentRouteName() == 'gym.edit.data' ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <span class="ms-8">Data Gym</span>
            </a>
         </li>

         
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg group {{ Route::currentRouteName() == 'gym.edit.foto' ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <span class="ms-8">Foto Gym</span>
            </a>
         </li>

         
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg group {{ Route::currentRouteName() == 'gym.edit.fasilitas.umum' ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <span class="ms-8">Fasilitas Umum</span>
            </a>
         </li>

        
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg group {{ Route::currentRouteName() == 'gym.edit.fasilitas.alat' ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <span class="ms-8">Fasilitas Alat</span>
            </a>
         </li>

         
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg group {{ Route::currentRouteName() == 'gym.edit.alamat' ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <span class="ms-8">Alamat Gym</span>
            </a>
         </li>

        
         <li>
            <a href="#" class="flex items-center p-2 rounded-lg group {{ Route::currentRouteName() == '#' ? 'bg-yellow-300 text-black' : 'text-white' }} hover:bg-yellow-300 hover:text-black">
               <span class="ms-8">Data Trainer</span>
            </a>
         </li>
      </ul>
   </div>
</aside>