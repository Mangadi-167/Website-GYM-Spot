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
    <div class="p-8 h-full sm:ml-64 bg-white">
        <p class="text-2xl font-bold">Fasilitas alat yang ada di gym</p>
        <p>Silahkan centang fasilitas yang ada di gym Anda</p>

        <div class="mt-5">
            <h1 class="text-2xl font-bold">Fasilitas alat</h1>

            <!-- Form untuk menyimpan fasilitas alat -->
            <form action="{{ route('gym.update.fasilitas.alat') }}" method="POST">
                @csrf
                @method('PUT')

                @foreach (['treadmill', 'sepeda_statis', 'barbel', 'pull_up', 'dumbbel', 'bench_press', 'leg_press_machine', 'cable_machine', 'pec_deck_machine', 'battle_ropes', 'slam_ball'] as $tool)
                    <div class="flex items-center mt-2">
                        <input type="checkbox" name="tool_facility[]" value="{{ $tool }}" id="{{ $tool }}"
                            class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2"
                            @if(in_array($tool, $toolFacilitiesArray)) checked @endif>
                        <label for="{{ $tool }}" class="ml-2 text-lg font-medium text-black">{{ ucwords(str_replace('_', ' ', $tool)) }}</label>
                    </div>
                @endforeach

                <div class="mt-5 flex justify-between w-96">
                    <a href="{{ route('gym.edit.fasilitas.umum') }}"
                        class="text-gray-900 bg-transparent border border-yellow-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                        Kembali
                    </a>
                    <button type="submit"
                        class="text-gray-900 bg-yellow-300 border border-gray-300 focus:outline-none hover:bg-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan Fasilitas Alat
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-form-edit>
