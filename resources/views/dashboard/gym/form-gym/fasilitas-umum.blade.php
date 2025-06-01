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
    <div class="p-8 h-full sm:ml-64 bg-white">
        <p class="text-2xl font-bold ">Fasilitas umum yang ada di gym</p>
        <p>Silahkan centang fasilitas yang ada di gym anda</p>

        <div class="mt-5">
            <h1 class="text-2xl font-bold">Fasilitas umum</h1>

            <!-- Form untuk memilih fasilitas -->
            <form action="{{ route('gym.store.fasilitas.umum') }}" method="POST">
                @csrf
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="public_facility[]" value="wifi" id="wifi"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="wifi" class="ml-2 text-lg font-medium text-black">Wifi</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="public_facility[]" value="loker_penyimpanan" id="loker_penyimpanan"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="loker_penyimpanan" class="ml-2 text-lg font-medium text-black">Loker penyimpanan</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="public_facility[]" value="ruang_ganti" id="ruang_ganti"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="ruang_ganti" class="ml-2 text-lg font-medium text-black">Ruang ganti</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="public_facility[]" value="kamar_mandi" id="kamar_mandi"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="kamar_mandi" class="ml-2 text-lg font-medium text-black">Kamar mandi</label>
                </div>

                <div class="flex justify-end w-96 mt-5">
                    <button type="submit" class="text-gray-900 bg-yellow-300 border border-yellow-300 focus:outline-none hover:bg-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan Fasilitas
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-form-gym>
