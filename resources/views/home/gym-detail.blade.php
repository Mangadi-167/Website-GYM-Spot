<x-home-layout>
    @section('title', 'Gym Detail')

    @if (flash()->message)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });
            Toast.fire({
                icon: '{{ flash()->class }}',
                title: "{{ flash()->message }}",
            });
        });
    </script>
    @endif

    <section class="relative min-h-screen">

        <div class="px-8 sm:px-16 md:px-20 lg:px-32 xl:px-32">

            <!-- Search gym -->
            <div class="">
                <div class="py-8 mt-5 px-4 mx-auto  max-w-screen text-center lg:py-16 relative z-40 mb-5">
                    <div class="w-full flex justify-center">
                        <div class="w-96 relative">
                            <form action="{{ route('gyms.search') }}" method="GET">
                                @csrf
                                <div class="relative mt-2 flex items-center space-x-1 justify-end ">

                                    <input type="search" name="search" id="search-gym"
                                        class="z-30 block w-full p-4 absolute text-left text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                                        placeholder="Cari Nama Gym..." />

                                    <button id="dropdownMenuIconButton" data-dropdown-toggle="location-filter"
                                        class=" relative z-40 align  p-2 text-sm font-medium text-center text-gray-900  rounded-lg  focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800  dark:focus:ring-gray-600"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 4 15">
                                            <path
                                                d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                    </button>

                                    <button type="submit"
                                        class=" h-14 ml-4 z-40 relative p-3  text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2">
                                        Cari
                                    </button>

                                    <div id="location-filter"
                                        class="hidden absolute top-16 left-0 w-1/3 bg-white p-4 rounded-lg shadow-lg mt-2">
                                        <div class="space-y-4">
                                            <div class="flex flex-col space-y-2">
                                                <label for="district" class="text-sm font-medium text-gray-900">Pilih
                                                    Kabupaten</label>
                                                <select id="district" name="kabupaten"
                                                    class="w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
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
                                                <label for="sub-district"
                                                    class="text-sm font-medium text-gray-900">Pilih Kecamatan</label>
                                                <select id="sub-district" name="kecamatan"
                                                    class="w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
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

                            // Kirim form setelah pengecekan
                            if (!searchValue && !kabupatenValue && !kecamatanValue) {
                                alert('Masukkan Nama Gym atau Pilih Lokasi!');
                                return;
                            }

                            form.submit();

                            // Lakukan pencarian atau filter berdasarkan input
                            console.log('Mencari dengan:', {
                                gym: searchValue,
                                kabupaten: kabupatenValue,
                                kecamatan: kecamatanValue
                            });
                        });
                    </script>
                </div>


                <!-- Carousel wrapper -->
                <div id="controls-carousel" class="relative w-full" data-carousel="static">
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach ($gym->fotoGym as $foto)
                        @if($foto->foto_gym1)
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $foto->foto_gym1) }}" class="w-full h-full object-cover"
                                alt="Gym Photo">
                        </div>
                        @endif
                        @if($foto->foto_gym2)
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $foto->foto_gym2) }}" class="w-full h-full object-cover"
                                alt="Gym Photo">
                        </div>
                        @endif
                        @if($foto->foto_gym3)
                        <div class="duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $foto->foto_gym3) }}" class="w-full h-full object-cover"
                                alt="Gym Photo">
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <button type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

                <!-- Content Section -->
                <div class="flex justify-center p-10 flex-col lg:flex-row">
                    <div class="w-full bg-white p-6">
                        <div class="flex justify-between items-center flex-col lg:flex-row">
                            <p class="text-4xl font-bold">{{ $gym->gym_name }}</p>

                            <div class="flex items-center space-x-6 mt-2">

                                @if (Session::has('loginstatus') && Session::get('loginstatus') === true)
                               
                                <button type="button" id="openFormButton"
                                    class="w-50 px-4 py-2 text-base bg-yellow-300 text-black rounded-lg hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300">
                                    Join Memberships
                                </button>
                                @else
                               
                                <button type="button" disabled
                                    class="w-50 px-4 py-2 text-base bg-gray-300 text-white rounded-lg">
                                    Login untuk Join Membership
                                </button>
                                @endif

                                
                                <div id="overlayForm"
                                    class=" hidden justify-center align-center overflow-y-auto overflow-x-hidden fixed inset-0 z-50 items-center w-full h-screen"
                                    style="margin-left:0px;">
                                    <div class="bg-gray-900 p-8 rounded-lg bg-opacity-50 items-center z-40 relative mt-8">
                                        <h2 class="text-2xl font-bold mb-4 text-white text-center">Join Membership
                                            <br><span class="text-yellow-400">{{ $gym->gym_name }}</span>
                                        </h2>
                                        <div class="mt-3">
                                            <h2 class="text-white">
                                                Harga Membership
                                                <br> <span class="text-xl font-lg text-yellow-300">Rp
                                                    {{ number_format($gym->price_member, 0, ',', '.') }}</span>
                                            </h2>
                                            <h2 class="text-white mt-2">
                                                Rekening
                                                <br> <span class=" font-base text-white">{{ $gym->rekening }}</span>
                                            </h2>
                                        </div>
                                        <form action="{{ route('membership.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="gym_id" value="{{ $gym->gym_id }}">
                                            <div class="mb-4 mt-4">
                                                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                                                <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-1 border border-gray-400 rounded-lg" placeholder="Masukan username anda" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="email" class="block text-sm font-medium text-gray-400">Email</label>
                                                <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg" placeholder="Masukan email anda" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="no_hp" class="block text-sm font-medium text-gray-400">No. HP</label>
                                                <input type="text" id="no_hp" name="no_hp" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg" placeholder="Masukan no hp yang aktif" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="pembayaran" class="block text-sm font-medium text-gray-400">Upload Bukti Pembayaran</label>
                                                <input type="file" id="pembayaran" name="pembayaran" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg" required>
                                            </div>
                                            <button type="submit" class="w-full px-4 py-2 bg-yellow-300 text-black rounded-lg hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300">Submit</button>
                                        </form>

                                        <button type="button" id="closeFormButton"
                                            class="absolute top-2 right-2 text-white bg-red-700 text-3xl font-bold rounded-lg hover:bg-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <script>
                                    // Mendapatkan elemen tombol dan overlay
                                    const openFormButton = document.getElementById('openFormButton');
                                    const overlayForm = document.getElementById('overlayForm');
                                    const closeFormButton = document.getElementById('closeFormButton');

                                    openFormButton.addEventListener('click', function() {
                                        overlayForm.classList.remove('hidden'); 
                                        overlayForm.classList.add('flex'); 
                                    });

                                    closeFormButton.addEventListener('click', function() {
                                        overlayForm.classList.remove('flex'); 
                                        overlayForm.classList.add('hidden'); 
                                    });
                                </script>

                                <p class="text-red-500 text-xl">Rp {{ number_format($gym->price, 0, ',', '.') }}</p>
                            </div>
                        </div>


                        <div class="mt-3">
                            <p>Hub : {{ $gym->no_hpowner }}</p>
                        </div>
                        <div class="mt-2">
                            <p>Alamat : {{ $gym->gymAddress->address ?? 'Alamat tidak tersedia' }}</p>
                        </div>

                        <div class="flex justify-between flex-col lg:flex-row mt-7">

                            <div class="w-full lg:w-1/2 mt-6 border-t">
                                <h2 class="text-2xl font-bold mt-3 text-gray-800">Deskripsi Gym</h2>
                                <p class="text-gray-600 mt-2">{{ $gym->description }}</p>

                                <div class="mt-6 border-t">
                                    <h3 class="text-xl font-semibold text-gray-800">Fasilitas Umum</h3>
                                    <ul class="list-disc pl-6 text-gray-600 mt-2 mx-2">
                                        @foreach ($gym->publicFacility as $facility)
                                        <li class="flex items-center mt-3">
                                            <img src="{{ asset('storage/fasilitas/' . $facility->public_facility . '.svg') }}"
                                                alt="{{ $facility->public_facility }}"
                                                class="inline-block w-6 h-6 mr-3">
                                            {{ ucfirst(str_replace('_', ' ', $facility->public_facility)) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Fasilitas Alat -->
                                <div class="mt-6 border-t">
                                    <h3 class="text-xl font-semibold mt-3 text-gray-800">Fasilitas Alat</h3>
                                    <ul class="list-disc pl-6 text-gray-600 mt-2 mx-2">
                                        @foreach ($gym->toolFacility as $tool)
                                        <li class="flex items-center mt-3">
                                            <img src="{{ asset('storage/fasilitas/' . $tool->tool_facility . '.svg') }}"
                                                alt="{{ $tool->tool_facility }}" class="inline-block w-6 h-6 mr-3">
                                            {{ ucfirst(str_replace('_', ' ', $tool->tool_facility)) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <div class="w-full lg:w-96 p-6 border-t mt-6">
                                <h3 class="text-lg font-semibold text-gray-800">Trainer</h3>

                                @foreach($trainers as $trainer)
                                <div class="flex items-center mt-4">
                                    <!-- Foto Trainer -->
                                    <div class="w-10 h-10 rounded-full bg-gray-300">
                                        @if($trainer->foto_trainer)
                                        <img src="{{ asset('storage/' . $trainer->foto_trainer) }}" alt="Foto Trainer"
                                            class="w-10 h-10 rounded-full" />
                                        @else
                                        <img src="{{ asset('images/default-trainer.jpg') }}" alt="Foto Trainer"
                                            class="w-10 h-10 rounded-full" />
                                        @endif
                                    </div>

                                    <div class="px-3">
                                      
                                        <p class="font-semibold text-gray-800">{{ $trainer->trainer_name }}</p>
                                        <p class="text-gray-600 text-sm">{{ $trainer->gender_trainer }}</p>
                                    </div>

                                    <a href="https://wa.me/{{ '62' . ltrim($trainer->no_hptrainer, '0') }}"
                                        class="mx-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path
                                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                        </svg>
                                    </a>
                                </div>
                                @endforeach
                            </div>

                        </div>

                        <!-- Lokasi Gym -->
                        <div class="mt-6 border-t">
                            <h3 class="text-lg font-semibold text-gray-800 mt-3">Lokasi Gym</h3>
                            <iframe src="{{$gym->gymAddress->link}}" width="100%" height="300" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</x-home-layout>