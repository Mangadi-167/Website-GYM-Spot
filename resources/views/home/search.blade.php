<x-home-layout>

    @section('title', 'Search')
    <section class="relative">
        <div class="py-8 mt-5 px-4 mx-auto max-w-screen text-center lg:py-16 relative z-30 mb-5 h-screen ">

            <div class="w-full flex justify-center ">
                <div class="w-96 relative">
                    <form action="{{ route('gyms.search') }}" method="GET">
                        @csrf
                        <div class="relative mt-2 flex items-center space-x-1 justify-end ">

                            <!-- Input Pencarian Gym -->
                            <input type="search" name="search" id="search-gym" class="z-30 block w-full p-4 absolute text-left text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Cari Nama Gym..." />

                            <button id="dropdownMenuIconButton" data-dropdown-toggle="location-filter" class=" relative z-40 align  p-2 text-sm font-medium text-center text-gray-900  rounded-lg  focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800  dark:focus:ring-gray-600" type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <button type="submit" class=" h-14 ml-4 z-40 relative p-3  text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2">
                                Cari
                            </button>


                            <div id="location-filter" class="hidden absolute top-16 left-0 w-1/3 bg-white p-4 rounded-lg shadow-lg mt-2">
                                <div class="space-y-4">
                                    <div class="flex flex-col space-y-2">
                                        <label for="district" class="text-sm font-medium text-gray-900">Pilih Kabupaten</label>
                                        <select id="district" name="kabupaten" class="w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                            <option value="" disabled selected>Pilih Kabupaten</option>
                                            <option value="denpasar">Denpasar</option>
                                            <option value="badung">Badung</option>
                                            <option value="bangli">Bangli</option>
                                            <option value="buleleng">Buleleng</option>
                                            <option value="gianyar">Gianyar</option>
                                            <option value="klungkung">Klungkung</option>
                                            <option value="karangasem">Karangasem</option>
                                            <option value="tabanan">Tabanan</option>
                                            <option value="jembrana">Jembrana</option>
                                        </select>
                                    </div>

                                    <div class="flex flex-col space-y-2">
                                        <label for="sub-district" class="text-sm font-medium text-gray-900">Pilih Kecamatan</label>
                                        <select id="sub-district" name="kecamatan" class="w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                            <option value="" disabled selected>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>

            <script>
                const kabupatenDropdown = document.getElementById('district');
                const kecamatanDropdown = document.getElementById('sub-district');

                // Data Kecamatan per Kabupaten
                const kecamatanData = {
                    denpasar: ['Denpasar Utara', 'Denpasar Selatan', 'Denpasar Timur', 'Denpasar Barat'],
                    badung: ['Kuta', 'Kuta Selatan', 'Kuta Utara', 'Mengwi', 'Abiansemal', 'Petang'],
                    bangli: ['Bangli', 'Kintamani', 'Susut', 'Tembuku'],
                    buleleng: ['Singaraja', 'Seririt', 'Banjar', 'Busungbiu', 'Gerogak', 'Kubutambahan', 'Sawan', 'Tejakula', 'Sukasada'],
                    gianyar: ['Ubud', 'Sukawati', 'Blahbatuh', 'Payangan', 'Tegalalang', 'Tampaksiring', 'Gianyar'],
                    klungkung: ['Klungkung', 'Nusa Penida', 'Dawan', 'Banjarangkan'],
                    karangasem: ['Karangasem', 'Manggis', 'Rendang', 'Abang', 'Kubu', 'Selat', 'Bebandem', 'Sidemen'],
                    tabanan: ['Tabanan', 'Marga', 'Selemadeg', 'Baturiti', 'Kediri', 'Karambitan', 'Penebel', 'Pupuan', 'Selemadeg Barat', 'Selemadeg Timur'],
                    jembrana: ['Jembrana', 'Melaya', 'Mendoyo', 'Negara', 'Pekutatan']
                };

                // Update Kecamatan options based on selected Kabupaten
                kabupatenDropdown.addEventListener('change', (event) => {
                    const selectedKabupaten = event.target.value;
                    const kecamatanOptions = kecamatanData[selectedKabupaten] || [];
                    kecamatanDropdown.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

                    kecamatanOptions.forEach((kecamatan) => {
                        const option = document.createElement('option');
                        option.value = kecamatan.toLowerCase().replace(' ', '-');
                        option.textContent = kecamatan;
                        kecamatanDropdown.appendChild(option);
                    });
                });

                // Form submit handling
                const form = document.querySelector('form');
                form.addEventListener('submit', function(event) {


                    const searchValue = document.getElementById('search-gym').value;
                    const kabupatenValue = kabupatenDropdown.value;
                    const kecamatanValue = kecamatanDropdown.value;


                    if (!searchValue && !kabupatenValue && !kecamatanValue) {
                        alert('Masukkan Nama Gym atau Pilih Lokasi!');
                        return;
                    }

                    form.submit();

                    console.log('Mencari dengan:', {
                        gym: searchValue,
                        kabupaten: kabupatenValue,
                        kecamatan: kecamatanValue
                    });
                });
            </script>


            <div class="flex justify-center flex-wrap ">
                <div class="mt-8 flex justify-start text-left gap-6 flex-wrap" style="padding: 16px 80px 16px 80px">
                    @foreach($gyms as $gym) <!-- Iterasi setiap gym -->
                    <div class="max-w-sm  border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 " style="transition: all 0.3s ease-in-out; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 309px;"
                        onmouseenter="this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.2)';"
                        onmouseleave="this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';">

                        <a href="{{ route('gym-detail', $gym->slug) }}">
                            <!-- Cek jika foto gym pertama ada -->
                            @if($gym->fotoGym->first() && $gym->fotoGym->first()->foto_gym1)
                            <img class="rounded-t-lg w-full object-cover object-top" style="height:160px; object-position:top;"
                                src="{{ asset('storage/' . $gym->fotoGym->first()->foto_gym1) }}" alt="product image" />
                            @else
                            <!-- Jika tidak ada foto gym -->
                            <img class="rounded-t-lg w-full object-cover object-top" style="height:160px; object-position:top;"
                                src="{{ asset('images/default-image.jpg') }}" alt="default gym image" />
                            @endif
                        </a>

                        <div class="p-2">
                            <a href="{{ route('gym-detail', $gym->slug) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $gym->gym_name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ Str::limit($gym->description, 50, '...') }}
                            </p>
                            <p class="text-right text-lg text-red-600">Rp {{ number_format($gym->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

    </section>

</x-home-layout>