<x-layout>
    @section('title', 'Data Gym')

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

    <div class="p-4 sm:ml-64">
        <div class="flex flex-col lg:flex-row justify-between mb-3 mr-3 space-y-3  lg:space-y-0 lg:space-x-3">
            <a href="{{ route('gym.add') }}"
                class=" inline-flex items-center justify-center px-6 py-2 text-sm font-bold text-black bg-yellow-400 rounded-lg shadow-md hover:bg-yellow-500 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2 transition-transform transform hover:scale-105">
                + Add Gym
            </a>

            @if (session('userdata')->role === 'admin')
            <form action="{{ route('gyms.searchD') }}" method="GET">
                <div class="flex items-center w-full max-w-xs p-0 space-x-2 bg-gray-100 rounded-lg">
                    <input type="text" name="query" placeholder="Cari sesuatu..." value="{{ request('query') }}"
                        class="w-full px-4 py-2">
                    <button type="submit" class="px-4 py-3 text-black bg-yellow-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </div>
            </form>
            @endif
        </div>

        <!-- Looping untuk menampilkan setiap gym -->
        <div class="flex-wrap flex gap-3 mt-6 h-full justify-start">

            @foreach ($gyms as $gym)
            <div
                class="w-full max-w-sm overflow-hidden bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
             
                <a href="{{ route('gym-detail', $gym->slug) }}">
                    <!-- Menampilkan foto gym pertama (foto_gym1) -->
                    @if($gym->fotoGym->first() && $gym->fotoGym->first()->foto_gym1)
                    <img src="{{ asset('storage/' . $gym->fotoGym->first()->foto_gym1) }}" alt="product image"
                        class="w-full h-56 object-cover">
                    @else
                    <img src="{{ asset('images/default-gym.jpg') }}" alt="product image"
                        class="w-full h-56 object-cover">
                    @endif
                </a>

                <div class="flex justify-between gap-4 px-5 mt-3">
                    <div class="pb-5">
                        <!-- Nama Gym -->
                        <a href="{{ route('detail.gym', parameters: ['gym_id' => $gym->gym_id]) }}">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $gym->gym_name }}
                            </h5>
                        </a>

                        <!-- Harga Gym -->
                        <div class="">
                            <span
                                class="text-3xl font-bold text-red-600 dark:text-white">Rp.{{ number_format($gym->price, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <!-- Tombol Edit -->
                        <a href="{{ route('gym.edit.data', ['gym_id' => $gym->gym_id]) }}"
                            class="flex items-center gap-2 p-0 btn btn-link text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            </svg>
                        </a>


                        <!-- Tombol Delete -->
                        <form action="{{ route('gym.delete', ['gym_id' => $gym->gym_id]) }}" method="POST"
                            class="d-inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this gym?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-2 p-0 bg-transparent border-0 btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="text-red-600 bi bi-trash3-fill hover:text-red-700" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>