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
    <div class="p-4 sm:ml-64"></div>

    <body class="bg-gray-100">
        <!-- Table Section -->
        <div class="p-8 sm:ml-64">
            <form action="{{ route('gym.store.trainer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- @method('PUT') ini perlu dihapus karena kita menggunakan POST -->

                <div class="relative p-12 ml-64 overflow-x-auto shadow-md sm:rounded-lg bg-white mt-5">
                    <div
                        class="flex flex-wrap items-center justify-between pb-4 space-y-4 bg-white flex-column md:flex-row md:space-y-0">
                        <div class="container mt-5">
                            <!-- Header Section -->
                            <div class="flex justify-between p-2 mb-2 mr-2">
                                <p class="text-3xl font-bold">Data Trainer</p>
                                <a href="{{ route('add.trainer') }}"
                                    class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                    + Add Trainer
                                </a>
                            </div>
                        </div>

                        <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Foto</th>
                                    <th scope="col" class="px-6 py-3">Nama Trainer</th>
                                    <th scope="col" class="px-6 py-3">No HP</th>
                                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($trainers as $trainer)
                                    <tr>
                                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-3">
                                            <img src="{{ asset('storage/' . $trainer->foto_trainer) }}"
                                                class="w-16 h-16 rounded-full" alt="Foto Trainer">
                                        </td>
                                        <td class="px-6 py-3">{{ $trainer->trainer_name }}</td>
                                        <td class="px-6 py-3">{{ $trainer->no_hptrainer }}</td>
                                        <td class="px-6 py-3">{{ $trainer->gender_trainer }}</td>
                                        <td class="px-6 py-3">
                                            <div class="flex gap-3">
                                                <!-- Tombol Edit dan Delete -->
                                                <a href="{{ route('gym.edit.trainer') }}" class="text-gray-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('gym.delete.trainer', $trainer->trainer_id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus trainer ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-700 bg-transparent border-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-trash3-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data trainer.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div
                    class="flex flex-wrap items-center justify-between pb-4 space-y-4 bg-white flex-column md:flex-row md:space-y-0 mt-3">
                    <a href="{{ route('gym.data') }}" type="button"
                        class="text-gray-900 bg-transparent border border-yellow-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Simpan
                    </a>
                </div>
            </form>
        </div>
    </body>
</x-form-gym>