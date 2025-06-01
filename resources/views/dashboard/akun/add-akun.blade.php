<x-layout>

    @section('title', 'Tambah Akun')


    <div class="p-4 sm:ml-64">
        <div class="content-wrapper">

            <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="col-sm-6">
                    <div class="flex justify-between p-2 mb-0 mr-0">
                        <p class="text-3xl font-bold">+Add Akun</p>
                        <form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="flex items-center justify-end mb-2 space-x-5">

                                <button type="reset"
                                    class="flex items-center px-5 py-2.5 bg-red-700 text-white rounded-lg hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="mr-2 bi bi-x"
                                        viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                    Reset
                                </button>

                                <button type="submit"
                                    class="flex items-center px-5 py-2.5 bg-yellow-400 text-black rounded-lg hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2 bi bi-floppy"
                                        viewBox="0 0 16 16">
                                        <path d="M11 2H9v3h2z" />
                                        <path
                                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                    </svg>
                                    Simpan
                                </button>
                            </div>
                    </div>



                    <div class="mb-6 border-b border-gray-300 dark:border-gray-600"></div>


                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                        <div class="md:col-span-2">
                            <div class="space-y-4">

                                <div>
                                    <label for="name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                                    <input type="text" name="name" id="name"
                                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                        placeholder="Masukan username anda" value="{{ old('name') }}" required>
                                    @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No
                                        Telepon</label>
                                    <input type="text" name="no_hp" id="no_hp"
                                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                        placeholder="Masukan no telepon" value="{{ old('no_hp') }}" required>
                                    @error('no_hp')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                        placeholder="Masukan email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="password"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                        placeholder="Masukan password" required>
                                    @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="password_confirmation"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Verifikasi
                                        Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                        placeholder="Konfirmasi password" required>
                                    @error('password_confirmation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div>
                                    <label for="role"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan</label>
                                    <select name="role" id="role"
                                        class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                                        required>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="gym owner" {{ old('role') == 'gym owner' ? 'selected' : '' }}>Gym Owner
                                        <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member Gym
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>


                        <div>
                            <label for="foto" class="block mb-2 text-sm font-medium text-center text-gray-700 dark:text-gray-300">
                                Foto Profile
                            </label>
                            <div class="flex flex-col items-center space-y-3">

                                <div class="w-24 h-24">
                                    <img id="previewImage"
                                        src="{{ asset('images/default.png') }}"
                                        alt="Preview Foto"
                                        class="object-cover w-full h-full border border-gray-300 rounded-full dark:border-gray-600">
                                </div>


                                <div class="w-1/2">
                                    <input type="file" name="foto" id="foto"
                                        class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500"
                                        accept="image/*" onchange="previewFile()" required>
                                    @error('foto')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Tipe file gambar jpg | png | GIF. Width = Height
                                </p>
                            </div>
                        </div>

                        <!-- Tambahkan Script untuk Preview Gambar -->
                        <script>
                            function previewFile() {
                                const fileInput = document.getElementById('foto');
                                const previewImage = document.getElementById('previewImage');

                                const file = fileInput.files[0];
                                const reader = new FileReader();

                                reader.onload = function(e) {
                                    previewImage.src = e.target.result;
                                };

                                if (file) {
                                    reader.readAsDataURL(file);
                                }
                            }
                        </script>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>