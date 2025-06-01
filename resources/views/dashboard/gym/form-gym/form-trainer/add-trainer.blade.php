<x-form-gym>
    <div class="p-8 sm:ml-64">
        <p class="text-3xl font-bold">Tambahkan Trainer</p>
        <p>Isi form ini untuk menambahkan trainer ke gym Anda.</p>

        <div class="mt-5">
            <form action="{{ route('gym.store.trainer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Hidden Input Gym ID -->
                <input type="hidden" name="gym_id" value="{{ $gym_id }}">

                <!-- Nama Trainer -->
                <div class="mb-6">
                    <label for="namaTrainer" class="text-2xl font-semibold text-gray-800">Nama Trainer</label>
                    <input type="text" id="trainer_name" name="trainer_name" class="block w-96 p-2 mt-1 border rounded-lg" placeholder="Masukkan nama trainer" required>
                </div>

                <!-- No HP Trainer -->
                <div class="mb-6">
                    <label for="noHpTrainer" class="text-2xl font-semibold text-gray-800">No HP Trainer</label>
                    <input type="tel" id="no_hptrainer" name="no_hptrainer" class="block w-96 p-2 mt-1 border rounded-lg" placeholder="Masukkan nomor HP trainer" required>
                </div>

                <!-- Foto -->
                <div class="mb-6">
                    <label for="foto" class="text-2xl font-semibold text-gray-800">Foto Trainer</label>
                    <input type="file" id="foto_trainer" name="foto_trainer" class="block w-96 p-2 mt-1 border rounded-lg">
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-6">
                    <label for="jenisKelamin" class="text-2xl font-semibold text-gray-800">Jenis Kelamin</label>
                    <select id="gender_trainer" name="gender_trainer" class="block w-96 p-2 mt-1 border rounded-lg" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Tombol -->
                <div class="mt-5 flex justify-between w-96">
                    <a href="{{ route('gym.trainer') }}" class="text-gray-900 bg-transparent border border-yellow-300 hover:bg-yellow-500 text-sm px-5 py-2.5 rounded-lg">Kembali</a>
                    <button type="submit" class="py-2 px-6 bg-yellow-300 text-black font-semibold rounded-lg hover:bg-yellow-500">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-form-gym>
