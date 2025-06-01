<x-form-gym>
@if (flash()->message)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
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
    <div class="p-8 sm:ml-64">
        <p class="text-3xl font-bold">Edit Trainer</p>
        <p>Perbarui data trainer gym Anda.</p>

        <div class="mt-5">
            <form action="{{ route('gym.update.trainer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Trainer -->
                <div class="mb-6">
                    <label for="namaTrainer" class="text-2xl font-semibold text-gray-800">Nama Trainer</label>
                    <input type="text" id="trainer_name" name="trainer_name"
                        class="block w-96 p-2 mt-1 border rounded-lg"
                        value="{{ old('trainer_name', $trainer->trainer_name) }}" placeholder="Masukkan nama trainer"
                        required>
                </div>

                <!-- No HP Trainer -->
                <div class="mb-6">
                    <label for="noHpTrainer" class="text-2xl font-semibold text-gray-800">No HP Trainer</label>
                    <input type="tel" id="no_hptrainer" name="no_hptrainer"
                        class="block w-96 p-2 mt-1 border rounded-lg"
                        value="{{ old('no_hptrainer', $trainer->no_hptrainer) }}"
                        placeholder="Masukkan nomor HP trainer" required>
                </div>

                <!-- Foto -->
                <div class="mb-6">
                    <label for="foto" class="text-2xl font-semibold text-gray-800">Foto Trainer</label>
                    <input type="file" id="foto_trainer" name="foto_trainer"
                        class="block w-96 p-2 mt-1 border rounded-lg">
                    @if($trainer->foto_trainer)
                        <img src="{{ asset('storage/' . $trainer->foto_trainer) }}" alt="Foto Trainer"
                            class="mt-3 w-24 h-24 rounded-full">
                    @endif
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-6">
                    <label for="jenisKelamin" class="text-2xl font-semibold text-gray-800">Jenis Kelamin</label>
                    <select id="gender_trainer" name="gender_trainer" class="block w-96 p-2 mt-1 border rounded-lg"
                        required>
                        <option value="Laki-laki" {{ $trainer->gender_trainer == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="Perempuan" {{ $trainer->gender_trainer == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>

                <!-- Tombol -->
                <div class="mt-5 flex justify-end w-96">
                    <!-- Tombol Hapus -->

                    <button type="submit"
                        class="py-2 px-6 bg-yellow-300 text-black font-semibold rounded-lg hover:bg-yellow-500">Simpan</button>

                </div>
            </form>
        </div>
    </div>
</x-form-gym>