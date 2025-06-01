<x-form-edit>
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
    <p class="text-2xl font-bold">Edit Data Gym</p>
    <p>Ubah data gym Anda agar tetap terupdate dan siap menarik pelanggan!</p>

    <div class="mt-5">
        {{-- Form untuk edit data gym --}}
        <form action="{{ route('gym.update.data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Input tersembunyi untuk gym_id --}}
            <input type="hidden" name="gym_id" value="{{ session('gym_id') }}">

            {{-- Nama Gym --}}
            <h1 class="text-1xl font-bold">Apa nama Gym anda?</h1>
            <div class="mb-4">
                <p class="text-gray-600">Saran : GYM (spasi) Nama Gym</p>
                <input type="text" name="gym_name" id="gym_name"
                    class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                    value="{{ old('gym_name', $gym->gym_name ?? '') }}">
                @error('gym_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Rekening --}}
            <h1 class="text-1xl font-bold">Masukan Rekening Anda</h1>
            <div class="mb-4">
                <p class="text-gray-600">Contoh: Nama BANK : No Rekening</p>
                <input type="text" name="rekening" id="rekening"
                    class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                    value="{{ old('rekening', $gym->rekening ?? '') }}">
                @error('rekening')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Harga Harian --}}
            <div class="mb-4">
                <label for="price" class="block text-1xl font-bold">Harga Harian</label>
                <p class="text-gray-600">Masukkan Harga Harian Gym Anda</p>
                <input type="number" name="price" id="price"
                    class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                    value="{{ old('price', $gym->price ?? '') }}">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Harga Membership --}}
            <div class="mb-4">
                <label for="price_member" class="block text-1xl font-bold">Harga Membership</label>
                <p class="text-gray-600">Masukkan Harga Membership Gym Anda</p>
                <input type="number" name="price_member" id="price_member"
                    class="block w-1/2 p-2 mt-1 border border-gray-300 rounded-lg"
                    value="{{ old('price_member', $gym->price_member ?? '') }}">
                @error('price_member')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi Gym --}}
            <div class="mb-4">
                <label for="description" class="block text-1xl font-bold">Deskripsi Gym Anda</label>
                <p class="text-gray-600">Ceritakan hal menarik gym Anda</p>
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
                    value="{{ old('no_hpowner', $gym->no_hpowner ?? '') }}">
                @error('no_hpowner')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end w-1/2 mt-5">
                <button type="submit"
                    class="text-gray-900 bg-yellow-300 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
</x-form-edit>
