<x-layout>
    @section('title', 'Membership GYM')
    @if (flash()->message)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 4000,
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
    @if ($errors->has('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });

            Toast.fire({
                icon: 'error',  // Icon 'error' untuk pesan kesalahan
                title: "{{ $errors->first('error') }}",  // Menampilkan pesan error pertama
            });
        });
    </script>
@endif


    <div class="p-4 sm:ml-64 ">
        <div class="relative p-12 ml-64 overflow-x-auto shadow-md sm:rounded-lg">

            <div class="flex flex-wrap items-center justify-between pb-4 space-y-4 bg-white flex-column md:flex-row md:space-y-0 dark:bg-gray-900">
                <div class="container mt-5">
                    <div class="p-2 mr-2 flex items-center justify-between mb-2 space-x-5">
                        <p class="text-3xl font-bold">Membership</p>
                        <div class="flex items-center gap-2.5 ">
                        <form action="{{ route('membership.data') }}" method="GET">
                                <div class="flex items-center w-full max-w-xs p-0 space-x-2 bg-gray-100 rounded-lg">
                                    <input type="text" name="search" placeholder="Cari sesuatu..." class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" />
                                    <button type="submit" class="px-4 py-3 text-black bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">No hp</th>
                        <th scope="col" class="px-6 py-3">Email member</th>
                        <th scope="col" class="px-6 py-3">Gym name</th>
                        <th scope="col" class="px-6 py-3">No hp owner gym </th>
                        <th scope="col" class="px-6 py-3">Bukti pembayaran</th>
                        <th scope="col" class="px-6 py-3">Verifikasi</th>
                    </tr>
                </thead>
                @foreach ($members->sortByDesc(function ($membership) {
                return $membership->status === 'pending' ? 1 : 0;
                }) as $index => $membership)
                <tr>
                    <td class="px-6 py-3">{{ $index + 1 }}</td>
                    <td class="px-6 py-3">{{ $membership->name }}</td>
                    <td class="px-6 py-3">{{ $membership->no_hp }}</td>
                    <td class="px-6 py-3">{{ $membership->email }}</td>
                    <td class="px-6 py-3">{{ $membership->gym->gym_name }}</td>
                    <td class="px-6 py-3">{{ $membership->gym->no_hpowner }}</td>
                    <td class="px-6 py-3">
                        <a href="{{ asset('storage/' . $membership->pembayaran) }}" target="_blank">
                            <img src="{{ asset('storage/' . $membership->pembayaran) }}" alt="Bukti Pembayaran" class="w-16 h-16 rounded-lg cursor-pointer" />
                        </a>
                    </td>
                    <td class="px-6 py-3">
                        <div class="flex gap-3">
                            @if ($membership->status === 'pending')
                            <a href="{{ route('membership.approve', ['id' => $membership->id]) }}" class="p-0 btn btn-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill text-green-500 hover:text-green-500" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            </a>
                            <a href="{{ route('membership.reject', $membership->id) }}" class="p-0 btn btn-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle-fill text-red-500" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                </svg>
                            </a>
                            @else
                            <span class="text-gray-500">Sudah diverifikasi</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
        </div>
    </div>
</x-layout>