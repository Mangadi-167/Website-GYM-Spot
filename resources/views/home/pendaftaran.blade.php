    <x-home-layout>

        @section('title', 'Pendaftaran')

        <section>
            @if (flash()->message)
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
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
            <div class=" z-30 text-black " mb-8 style="background-color: black !important;">
                <div class="py-8  px-3 mx-auto max-w-screen-xl  lg:py-16 grid lg:grid-cols-2 row-span-3 gap-8 lg:gap-16 ">
                    <!-- Left Content -->
                    <div class="md:w-1/2 px-8 md:px-16 text-left md:text-left mt-8 pt-8 text-white">
                        <h1 class="text-3xl md:text-3xl font-bold mb-4 leading-tight">Ingin Mendaftarkan Gym anda disini? <span class="text-yellow-400">Atau </span>gabung sebagai Member Gym? <span class="text-yellow-400">Lets Go!</span></h1>
                        <p class="text-gray-300 md:text-base text-2xl mb-8 leading-relaxed text-justify">
                            <span class="text-yellow-400 ">Gym Spot</span> adalah platform yang menyediakan akses ke tempat gym dengan fasilitas terbaik dan modern, menciptakan pengalaman kebugaran yang optimal bagi semua orang, dari pemula hingga profesional. Kami bertujuan menjadi pusat kebugaran yang terpercaya dan mudah diakses bagi siapa saja. Jadikan gym Anda diketahui banyak orang!
                        </p>
                        <a href="{{ route('login') }}" class="bg-yellow-300 text-black px-6 py-3 rounded font-semibold hover:bg-yellow-300 z-50 relative" style="color: black !important;">
                            Login
                        </a>

                    </div>

                    <!-- Right Content -->
                    <div class="md:w-1/2 px-8 py-6 z-30 ">
                        <div class=" rounded-lg p-8 shadow-lg">
                            <h2 class="text-yellow-400 text-2xl font-bold mb-6 text-center">Daftar</h2>
                            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                                @csrf
                                <!-- Input Username -->
                                <div>
                                    <input type="text" name="name" id="name" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm" placeholder="Masukan username anda" value="{{ old('name') }}" required>
                                    @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Input No HP -->
                                <div>
                                    <input type="text" name="no_hp" id="no_hp" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm" placeholder="Masukan no telepon" value="{{ old('no_hp') }}" required>
                                    @error('no_hp')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Input Email -->
                                <div>
                                    <input type="email" name="email" id="email" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm" placeholder="Masukan email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Input Jabatan -->
                                <div>
                                    <label for="role" class="block text-sm font-medium text-white dark:text-gray-300">
                                        Sebagai <span class="text-yellow-400">member / owner gym</span>
                                    </label>
                                    <select name="role" id="role"
                                        class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                        required>
                                        <!-- Placeholder yang tidak bisa dipilih -->
                                        <option value="" selected disabled class="text-gray-700">sebagai...</option>
                                        <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member Gym</option>
                                        <option value="gym owner" {{ old('role') == 'gym owner' ? 'selected' : '' }}>Gym Owner</option>
                                    </select>
                                </div>


                                <!-- Input Password -->
                                <div>
                                    <input type="password" name="password" id="password" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm" placeholder="Masukan password 6 karakter" required>
                                    @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Input Verifikasi Password -->
                                <div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full px-4 py-3 mt-1 border border-gray-300 rounded-lg shadow-sm" placeholder="Konfirmasi password" required>
                                    @error('password_confirmation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Input Form Foto -->
                                <div>
                                    <label for="foto" class="block text-sm text-white">Pilih foto untuk profil Anda*</label>
                                    <input type="file" name="foto" id="foto" class="block w-full px-4 py-2 mt-1 border text-sm text-gray-700 border-gray-300 rounded-lg bg-gray-50" accept="image/*" onchange="previewFile()" required>
                                    @error('foto')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Simpan Button -->
                                <button type="submit" class="w-full px-4 py-3 bg-yellow-300 text-black rounded-lg hover:bg-yellow-300 focus:ring-4 focus:ring-yellow-300">
                                    Sign Up
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="flex justify-center gap-3 flex-wrap">



            </div>

            <div class="bg-black text-white p-3 ">
                <div class="container mx-auto p-3 mt-6">

                    <!-- Grid Layout -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-3">
                        <!-- Card 1: Hormon Kebahagiaan -->
                        <div class="bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col items-center text-center h-auto sm:h-96" style="background-color: black !important;">
                            <h2 class="text-white text-3xl sm:text-4xl font-bold mb-6 text-justify">Apa <span class="text-yellow-300">manfaat</span> yang diberikan saat mendaftar?</h2>
                            <p class="text-gray-300 text-justify text-xl sm:text-2xl">
                                Dengan bergabung di Gym Spot, pemilik gym dapat mempromosikan bisnis mereka ke audiens yang lebih luas. Platform kami memungkinkan Anda menampilkan fasilitas unggulan, program, dan layanan yang ditawarkan, sehingga mudah diakses banyak orang. Dengan visibilitas
                                yang lebih tinggi, Anda dapat menjangkau lebih banyak pelanggan dan meningkatkan pertumbuhan bisnis secara efektif.
                            </p>
                        </div>

                        <!-- Card 2: Musik Meningkatkan Performa -->
                        <div class="bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col items-center text-center h-auto sm:h-96" style="background-color: black !important;">
                            <h2 class="text-white text-3xl sm:text-4xl font-bold mb-6 text-justify">Apakah <span class="text-yellow-300">aman</span> membuat akun disini?</h2>
                            <p class="text-gray-300 text-justify text-xl sm:text-2xl">
                                Keamanan akun Anda adalah prioritas utama di Gym Spot. Kami menggunakan teknologi enkripsi canggih untuk melindungi data pribadi dan informasi login Anda. Dengan sistem keamanan berlapis dan autentikasi yang kuat, Anda dapat yakin bahwa akun Anda aman dari akses tidak sah. Selain itu, kami terus memantau
                                dan memperbarui protokol keamanan untuk memastikan privasi dan perlindungan data Anda tetap terjaga setiap saat.
                            </p>
                        </div>
                    </div>




        </section>

    </x-home-layout>