<x-home-layout>

    @section('title', 'Home')


    <section class="relative">
        <div class=" p-8 bg-cover bg-center bg-no-repeat bg-gray-600 bg-blend-multiply px-8 sm:px-16 md:px-20 lg:px-32 xl:px-32"
            style="background-image: url('images/gym.jpg');">

            <div class="py-8 mt-5 px-4 mx-auto  max-w-screen text-center lg:py-16 relative z-30 mb-5">
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
                                            <label for="sub-district" class="text-sm font-medium text-gray-900">Pilih
                                                Kecamatan</label>
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


                        // Lakukan pencarian atau filter berdasarkan input
                        console.log('Mencari dengan:', {
                            gym: searchValue,
                            kabupaten: kabupatenValue,
                            kecamatan: kecamatanValue
                        });
                    });
                </script>

                <!-- Konten di bawah search bar -->
                <div
                    class="py-8 px-3 mx-auto max-w-screen-xl mt-8 lg:py-16 grid lg:grid-cols-2 row-span-3 gap-8 lg:gap-16 ">
                    <div class="flex flex-col justify-start mt-8 ">
                        <h1 class="mb-6 text-2xl  mr-5 font-extrabold tracking-tight leading-none text-white md:text-4xl lg:text-5xl dark:text-white text-center lg:text-left"
                            style="font-family: 'Poppins', sans-serif;">
                            Welcome to <span class="text-yellow-300">Gym Spot!</span>
                        </h1>
                        <p class="mb-8 text-lg font-normal text-white lg:text-xl  lg:text-left text-justify ">
                            <span class="text-yellow-300">Gym Spot</span> adalah platform yang menyediakan tempat gym
                            dengan fasilitas terbaik untuk mendukung kebutuhan kebugaran Anda. Kami menghadirkan
                            lingkungan yang nyaman, peralatan modern, dan ruang yang dirancang untuk semua level
                            kebugaran, dari pemula hingga atlet berpengalaman. Temukan tempat yang ideal untuk mencapai
                            tujuan kesehatan Anda bersama kami.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="mt-4 ">
        <p class="text-center text-3xl p-6  font-bold"><span class="text-yellow-300">RECOMENDED</span> GYM</p>
    </div>


    <div class="flex justify-center gap-6 flex-wrap p-8 ">
        @foreach($gyms as $gym)
        <div class="max-w-sm border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
            style="background-color: black !important; transition: all 0.3s ease-in-out; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
            onmouseenter="this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.4)';"
            onmouseleave="this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.3)';">

            <a href="{{ route('gym-detail', $gym->slug) }}">

                @if($gym->fotoGym->first() && $gym->fotoGym->first()->foto_gym1)
                <div style="height: 200px;">
                    <img class="rounded-t-lg h-full object-cover w-full" src="{{ asset('storage/' . $gym->fotoGym->first()->foto_gym1) }}"
                        alt="gym image" />
                </div>
                @else

                <img class="rounded-t-lg" src="{{ asset('images/default-image.jpg') }}" alt="default gym image" />
                @endif
            </a>

            <div class="p-5">
                <a href="{{ route('gym-detail', $gym->slug) }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $gym->gym_name }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-white dark:text-white">{{ Str::limit($gym->description, 50, '...') }}</p>
                <p
                    class="inline-flex items-center px-3 py-2 text-xl font-medium text-center text-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-400 dark:hover:bg-yellow-400 dark:focus:ring-yellow-400">
                    Rp {{ number_format($gym->price, 0, ',', '.') }}
                </p>
            </div>
        </div>
        @endforeach
    </div>

    </div>

    </div>

    <div class="mt-10 p-8" style="background-color: black; ">
        <div class="container mx-auto p-6 mt-4">

            <h1 class="text-center text-2xl font-bold mb-8 text-white">
                Simple <span class="text-yellow-300">Funfact</span> About <span class="text-yellow-300">Gym</span>
            </h1>

            <div class="flex items-center mb-12 mt-6 p-3 lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 pr-6">
                    <h2 class="text-4xl font-semibold mb-2 text-right text-white">Hormon <span
                            class="text-yellow-300">Kebahagiaan</span></h2>
                    <p class="text-lg text-gray-300 text-justify">Olahraga di gym tidak hanya bermanfaat bagi kebugaran
                        fisik, tetapi juga dapat meningkatkan produksi endorfin, yang sering disebut sebagai "hormon
                        kebahagiaan." Peningkatan kadar endorfin ini dapat memberikan efek positif pada suasana hati,
                        meningkatkan rasa bahagia, dan membantu mengurangi kecemasan serta stres. Dengan rutin
                        berolahraga, tubuh akan lebih mudah mengatasi tekanan emosional, memberikan rasa relaksasi, dan
                        meningkatkan kesejahteraan secara keseluruhan.</p>
                </div>
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('images/gym2.jpg') }}" class="h-[300px] w-full object-cover p-8" alt="Gym Image">
                </div>
            </div>

            <div class="flex items-center mt-10 p-5 lg:flex-row flex-col">
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('images/gym1.jpg') }}" class="h-[300px] w-full object-cover p-8" alt="Gym Image">
                </div>
                <div class="w-full lg:w-1/2 pl-6">
                    <h2 class="text-4xl font-semibold mb-2 text-white"><span class="text-yellow-300">Musik</span>
                        Meningkatkan <span class="text-yellow-300">Performa.</span></h2>
                    <p class="text-lg text-gray-300 text-justify">Mendengarkan musik saat berolahraga dapat memberikan
                        dorongan motivasi yang kuat, membantu meningkatkan fokus, dan memperbaiki performa secara
                        keseluruhan. Ritme musik yang enerjik tidak hanya mengurangi rasa lelah, tetapi juga
                        meningkatkan semangat, sehingga memungkinkan kita untuk berolahraga lebih lama, dengan
                        intensitas yang lebih tinggi, dan mencapai hasil yang lebih baik. Musik menjadi alat yang
                        efektif untuk mempertahankan ritme latihan dan mengatasi rasa bosan selama sesi olahraga.</p>
                </div>
            </div>


            <div class="flex items-center mb-12 mt-10 p-5 lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 pr-6">
                    <h2 class="text-4xl font-semibold mb-2 text-right text-white"><span
                            class="text-yellow-300">Olahraga</span> dan <span class="text-yellow-300">tidur</span></h2>
                    <p class="text-lg text-gray-300 text-justify">Latihan teratur dapat membantu memperbaiki kualitas
                        tidur dengan cara yang signifikan. Olahraga yang dilakukan secara rutin membantu tubuh lebih
                        cepat merasa lelah, sehingga memudahkan proses tidur. Selain itu, olahraga juga meningkatkan
                        kualitas tidur secara keseluruhan, memungkinkan kita untuk tidur lebih nyenyak dan bangun dengan
                        perasaan yang lebih segar dan bertenaga.</p>
                </div>
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('images/fotogym3.jpg') }}" class="h-[300px] w-full object-cover p-8"
                        alt="Gym Image">
                </div>
            </div>
        </div>
    </div>
</x-home-layout>