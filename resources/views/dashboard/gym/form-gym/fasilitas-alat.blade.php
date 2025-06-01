<x-form-gym>
    <!-- Notifikasi sukses dengan SweetAlert -->
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
    <div class="p-8 h-full sm:ml-64 bg-white">
        <p class="text-2xl font-bold ">Fasilitas alat yang ada di gym</p>
        <p>Silahkan centang fasilitas yang ada di gym anda</p>

        <div class="mt-5">
            <h1 class="text-2xl font-bold">Fasilitas alat</h1>

            <!-- Form untuk menyimpan fasilitas alat -->
            <form action="{{ route('gym.store.fasilitas.alat', session('gym_id')) }}" method="POST">
                @csrf
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="treadmill" id="treadmill"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="treadmill" class="ml-2 text-lg font-medium text-black">Treadmill</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="sepeda_statis" id="sepeda_statis"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="sepeda_statis" class="ml-2 text-lg font-medium text-black">Sepeda statis</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="barbel" id="barbel"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="barbel" class="ml-2 text-lg font-medium text-black">Barbel</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="pull_up" id="pull_up"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="pull_up" class="ml-2 text-lg font-medium text-black">Pull up</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="dumbbel" id="dumbbel"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="dumbbel" class="ml-2 text-lg font-medium text-black">Dumbbel</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="bench_press" id="bench_press"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="bench_press" class="ml-2 text-lg font-medium text-black">Bench press</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="leg_press_machine" id="leg_press_machine"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="leg_press_machine" class="ml-2 text-lg font-medium text-black">Leg press machine</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="cable_machine" id="cable_machine"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="cable_machine" class="ml-2 text-lg font-medium text-black">Cable machine</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="pec_deck_machine" id="pec_deck_machine"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="pec_deck_machine" class="ml-2 text-lg font-medium text-black">Pec deck machine</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="battle_ropes" id="battle_ropes"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="battle_ropes" class="ml-2 text-lg font-medium text-black">Battle ropes</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="tool_facility[]" value="slam_ball" id="slam_ball"
                        class="w-5 h-5 text-yellow-500 bg-white border-2 border-yellow-400 rounded focus:ring-yellow-500 focus:ring-2">
                    <label for="slam_ball" class="ml-2 text-lg font-medium text-black">Slam ball</label>
                </div>

                <div class="mt-5 flex justify-end w-96">
                    <button type="submit"
                        class="text-gray-900 bg-yellow-300 border border-gray-300 focus:outline-none hover:bg-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                        Simpan Fasilitas Alat
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-form-gym>