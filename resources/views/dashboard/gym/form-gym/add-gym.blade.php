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
        <p class="text-2xl font-bold">Silahkan lengkapi data gym</p>
        <p>Yuk lengkapi data kalian, agar <br>usaha gym kalian semakin banyak pelanggan</p>

        <div class="mt-5">
            {{-- Form untuk tahap data gym --}}
            <form action="{{ route('gym.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Input tersembunyi untuk gym_id (jika ada di sesi) --}}
                @if(session('gym_id'))
                    <input type="hidden" name="gym_id" value="{{ session('gym_id') }}">
                @endif

                {{-- Nama Gym --}}
                <h1 class="text-1xl font-bold">Apa nama Gym anda?</h1>
                <div class="mb-4">
                    <p class="text-gray-600">Saran : GYM (spasi) Nama Gym</p>
                    <input type="text" name="gym_name" id="gym_name"
                        class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                        placeholder="masukan nama gym anda" required
                        value="{{ old('gym_name', $gym->gym_name ?? '') }}">
                    @error('gym_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Rekening--}}
                <h1 class="text-1xl font-bold">Masukan Rekning Anda</h1>
                <div class="mb-4">
                    <p class="text-gray-600">Contoh: Nama BANK : No Rekening</p>
                    <input type="text" name="rekening" id="rekening"
                        class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                        placeholder="BCA : 7704534673" required
                        value="{{ old('gym_name', $gym->gym_name ?? '') }}">
                    @error('gym_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- Harga Harian --}}
                <div class="mb-4">
                    <label for="price" class="block text-1xl font-bold">Harga Harian</label>
                    <p class="text-gray-600">Masukkan Harga Harian Gym Anda</p>
                    <input type="number" name="price" id="price"
                        class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                        placeholder="10000" required
                        value="{{ old('price', $gym->price ?? '') }}">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga Member --}}
                <div class="mb-4">
                    <label for="price" class="block text-1xl font-bold">Harga Membership</label>
                    <p class="text-gray-600">Masukkan Harga Membership Gym Anda</p>
                    <input type="number" name="price_member" id="price_member"
                        class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                        placeholder="2000000" required
                        value="{{ old('price_member', $gym->price_member ?? '') }}">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi Gym --}}
                <div class="mb-4">
                    <label for="description" class="block text-1xl font-bold">Deskripsi Gym Anda</label>
                    <p class="text-gray-600">Ceritakan hal menarik gym anda</p>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{ old('description', $gym->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No HP Owner --}}
                <div class="mb-4 mt-4">
                    <label for="no_hpowner" class="block text-1xl font-bold">No Telepon Seluler</label>
                    <p class="text-gray-600">Masukkan no HP owner, agar pelanggan dapat menghubungi Anda</p>
                    <input type="tel" name="no_hpowner" id="no_hpowner"
                        class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                        placeholder="08187565" required
                        value="{{ old('no_hpowner', $gym->no_hpowner ?? '') }}">
                    @error('no_hpowner')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="flex justify-end w-1/2 mt-5">
                    <button type="submit"
                        class="text-gray-900 bg-yellow-300 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-form-gym>
