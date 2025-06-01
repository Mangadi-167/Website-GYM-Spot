<x-layout>
    @section('title', 'Reset Password')
    @if (flash()->message)
        @vite(['resource/js/script.js'])
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

    <div class="p-4 sm:ml-64">
        <div class="content-wrapper">
            <div class="max-w-6xl p-8 mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="col-sm-6">
                    <div class="flex justify-between">
                        <p class="flex items-center text-2xl">
                            Ubah Password
                        </p>
                    </div>

                    <!-- Form Reset Password -->
                    <form action="{{ route('password.reset') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <!-- Input Password Saat Ini -->
                            <div>
                                <label for="old_password" class="block text-xl font-bold text-black">Password saat ini</label>
                                <input type="password" name="old_password" id="old_password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg" placeholder="Masukkan password saat ini" value="{{ old('old_password') }}" required>
                                @error('old_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Input Password Baru -->
                            <div>
                                <label for="password" class="block text-xl font-bold text-black">Password baru</label>
                                <input type="password" name="password" id="password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg" placeholder="Masukkan password baru" value="{{ old('password') }}" required>
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Input Konfirmasi Password -->
                            <div>
                                <label for="password_confirmation" class="block text-xl font-bold text-black">Konfirmasi password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg" placeholder="Konfirmasi password baru" value="{{ old('password_confirmation') }}" required>
                                @error('password_confirmation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="px-5 py-2.5 bg-yellow-300 text-black rounded-lg">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
