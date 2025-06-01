<x-form-gym>
    <!-- Notifikasi sukses dengan SweetAlert -->
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

        <p class="text-2xl font-bold">Masukan Alamat Gym Anda</p>
        <p>Masukan Link Google Maps Anda.
            <br>dengan nomor gym dan RT/RW, jika belum ada.
        </p>

        <form action="{{ route('gym.store.alamat') }}" method="POST">
            @csrf

            <!-- Input Link Google Maps -->
            <div class="mb-4">
                <label for="link" class="block text-lg font-bold text-black">Link Maps</label>
                <input type="text" id="link" name="link"
                    class="w-full sm:w-96 p-2 border-2 border-yellow-400 rounded-md bg-white text-black"
                    placeholder="Masukkan Link Maps" required />
                @error('link')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Alamat -->
            <div class="mb-4">
                <label for="address" class="block text-lg font-bold text-black">Alamat</label>
                <input type="text" id="address" name="address"
                    class="w-full sm:w-96 p-2 border-2 border-yellow-400 rounded-md bg-white text-black"
                    placeholder="Masukkan alamat lengkap" required />
                @error('address')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Provinsi (Fixed Bali) -->
            <div class="mb-4">
                <label for="province" class="block text-lg font-bold text-black">Provinsi</label>
                <input type="text" id="province" name="province" value="Bali"
                    class="w-full sm:w-96 p-2 border-2 border-yellow-400 rounded-md bg-gray-100 text-black" readonly />
                @error('province')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kabupaten (List Dinamis) -->
            <div class="mb-4">
                <label for="regency" class="block text-lg font-bold text-black">Kabupaten</label>
                <select id="regency" name="regency"
                    class="w-full sm:w-96 p-2 border-2 border-yellow-400 rounded-md bg-white text-black"
                    onchange="updateSubdistricts()">
                    <option value="" disabled selected>Pilih Kabupaten</option>
                    <option value="Badung">Badung</option>
                    <option value="Bangli">Bangli</option>
                    <option value="Buleleng">Buleleng</option>
                    <option value="Denpasar">Denpasar</option>
                    <option value="Gianyar">Gianyar</option>
                    <option value="Jembrana">Jembrana</option>
                    <option value="Karangasem">Karangasem</option>
                    <option value="Klungkung">Klungkung</option>
                    <option value="Tabanan">Tabanan</option>
                </select>
                @error('regency')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kecamatan (List Dinamis Berdasarkan Kabupaten) -->
            <div class="mb-4">
                <label for="subdistrict" class="block text-lg font-bold text-black">Kecamatan</label>
                <select id="subdistrict" name="subdistrict"
                    class="w-full sm:w-96 p-2 border-2 border-yellow-400 rounded-md bg-white text-black">
                    <option value="" disabled selected>Pilih Kecamatan</option>
                </select>
                @error('subdistrict')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button for Navigation -->
            <div class="mt-5 flex justify-end w-full sm:w-96">
                <button type="submit"
                    class="text-gray-900 bg-yellow-300 border border-gray-300 hover:bg-gray-100 px-5 py-2.5 rounded-lg text-sm">
                    Lanjutkan
                </button>
            </div>
        </form>
    </div>

    <!-- JavaScript untuk Mengubah Kecamatan Berdasarkan Kabupaten yang Dipilih -->
    <script>
        const subdistricts = {
            "Badung": ["Kuta", "Kuta Selatan", "Kuta Utara", "Mengwi", "Petang", "Abiansemal"],
            "Bangli": ["Bangli", "Kintamani", "Tembuku", "Susut"],
            "Buleleng": ["Buleleng", "Seririt", "Busungbiu", "Gerokgak", "Sawan", "Sukasada", "Banjar", "Tejakula"],
            "Denpasar": ["Denpasar Barat", "Denpasar Selatan", "Denpasar Utara", "Denpasar Timur"],
            "Gianyar": ["Gianyar", "Blahbatuh", "Tampaksiring", "Ubud", "Sukawati", "Payangan", "Tegallalang"],
            "Jembrana": ["Negara", "Melaya", "Jembrana", "Mendoyo", "Pekutatan"],
            "Karangasem": ["Amlapura", "Karangasem", "Abang", "Bebandem", "Manggis", "Rendang", "Selat", "Sidemen", "Kubu"],
            "Klungkung": ["Semarapura", "Dawan", "Banjarangkan", "Klungkung", "Nusa Penida"],
            "Tabanan": ["Tabanan", "Kediri", "Selemadeg", "Marga", "Pupuan", "Baturiti", "Penebel"]
        };

        function updateSubdistricts() {
            const regency = document.getElementById("regency").value;
            const subdistrictSelect = document.getElementById("subdistrict");

            subdistrictSelect.innerHTML = `<option value="" disabled selected>Pilih Kecamatan</option>`;

            if (regency && subdistricts[regency]) {
                subdistricts[regency].forEach(subdistrict => {
                    const option = document.createElement("option");
                    option.value = subdistrict;
                    option.textContent = subdistrict;
                    subdistrictSelect.appendChild(option);
                });
            }
        }
    </script>
</x-form-gym>