<x-form-edit>
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
    <div class="p-8 sm:ml-64">
        <p class="text-2xl font-bold">Edit Foto Gym Anda</p>
        <p>Perbarui foto gym Anda agar lebih menarik bagi calon pelanggan.</p>

        <div class="mt-5">
            <form action="{{ route('gym.update.foto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="gym_id" value="{{ session('gym_id') }}">

                {{-- Foto pertama --}}
                <h1 class="text-2xl font-bold">Foto pertama</h1>
                <div class="flex flex-col items-center justify-center w-1/2 mt-2">
                    <div class="relative w-full h-48">
                        @if($gym->fotoGym->isNotEmpty() && isset($gym->fotoGym[0]->foto_gym1))
                        <img src="{{ asset('storage/' . $gym->fotoGym[0]->foto_gym1) }}" id="preview_foto1" class="absolute inset-0 object-cover w-full h-full" alt="Pratinjau Foto Pertama" />
                        @else
                        <img id="preview_foto1" class="absolute inset-0 object-cover w-full h-full hidden" alt="Pratinjau Foto Pertama" />
                        @endif
                        <label for="foto_gym1" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 4h3.5l2-2h7l2 2H19a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Zm9 3a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Tambahkan foto yang menarik</span></p>
                                <p class="text-xs text-gray-500">PNG, JPG (maks. 2MB)</p>
                            </div>
                            <input id="foto_gym1" type="file" name="foto_gym1" class="hidden" accept="image/*" onchange="previewImage(event, 'preview_foto1')" />
                        </label>
                    </div>
                    <button type="button" onclick="document.getElementById('foto_gym1').click()" class="mt-2 text-gray-900 bg-yellow-300 border border-gray-300 rounded-lg text-sm px-4 py-2 hover:bg-gray-100">Ubah Foto</button>
                    @error('foto_gym1')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto kedua --}}
                <h1 class="text-2xl font-bold mt-5">Foto kedua</h1>
                <div class="flex flex-col items-center justify-center w-1/2 mt-2">
                    <div class="relative w-full h-48">
                    @if($gym->fotoGym->isNotEmpty() && isset($gym->fotoGym[0]->foto_gym2))
                        <img src="{{ asset('storage/' . $gym->fotoGym[0]->foto_gym2) }}" id="preview_foto2" class="absolute inset-0 object-cover w-full h-full" alt="Pratinjau Foto Kedua" />
                        @else
                        <img id="preview_foto2" class="absolute inset-0 object-cover w-full h-full hidden" alt="Pratinjau Foto Kedua" />
                        @endif
                        <label for="foto_gym2" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 4h3.5l2-2h7l2 2H19a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Zm9 3a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Tambahkan foto yang menarik</span></p>
                                <p class="text-xs text-gray-500">PNG, JPG (maks. 2MB)</p>
                            </div>
                            <input id="foto_gym2" type="file" name="foto_gym2" class="hidden" accept="image/*" onchange="previewImage(event, 'preview_foto2')" />
                        </label>
                    </div>
                    <button type="button" onclick="document.getElementById('foto_gym2').click()" class="mt-2 text-gray-900 bg-yellow-300 border border-gray-300 rounded-lg text-sm px-4 py-2 hover:bg-gray-100">Ubah Foto</button>
                    @error('foto_gym2')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto ketiga --}}
                <h1 class="text-2xl font-bold mt-5">Foto ketiga</h1>
                <div class="flex flex-col items-center justify-center w-1/2 mt-2">
                    <div class="relative w-full h-48">
                    @if($gym->fotoGym->isNotEmpty() && isset($gym->fotoGym[0]->foto_gym3))
                        <img src="{{ asset('storage/' . $gym->fotoGym[0]->foto_gym3) }}" id="preview_foto3" class="absolute inset-0 object-cover w-full h-full" alt="Pratinjau Foto Ketiga" />
                        @else
                        <img id="preview_foto3" class="absolute inset-0 object-cover w-full h-full hidden" alt="Pratinjau Foto Ketiga" />
                        @endif
                        <label for="foto_gym3" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16" aria-hidden="true">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 4h3.5l2-2h7l2 2H19a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Zm9 3a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Tambahkan foto yang menarik</span></p>
                                <p class="text-xs text-gray-500">PNG, JPG (maks. 2MB)</p>
                            </div>
                            <input id="foto_gym3" type="file" name="foto_gym3" class="hidden" accept="image/*" onchange="previewImage(event, 'preview_foto3')" />
                        </label>
                    </div>
                    <button type="button" onclick="document.getElementById('foto_gym3').click()" class="mt-2 text-gray-900 bg-yellow-300 border border-gray-300 rounded-lg text-sm px-4 py-2 hover:bg-gray-100">Ubah Foto</button>
                    @error('foto_gym3')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 flex justify-between w-1/2">
                    <a href="{{ route('gym.edit.data',['gym_id' => $gym->gym_id]) }}"
                        class="text-gray-900 bg-transparent border border-yellow-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">Kembali</a>
                    <button type="submit"
                        class="text-gray-900 bg-yellow-300 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-form-edit>