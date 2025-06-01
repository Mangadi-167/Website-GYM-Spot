<x-home-layout>

    @section('title', 'Welcome to Gym Spot!')


    <section>
        <div class="bg-gray-100 flex items-center justify-center h-screen">

            <!-- Background yang besar -->
            <div class=" w-[90%] h-[90%] rounded-2xl shadow-2xl flex items-center justify-center z-40">
                <!-- Card Container -->
                <div class="w-96 bg-gray-900 rounded-lg p-8 text-center">
                    <!-- Login Title -->
                    <h1 class="text-yellow-400 text-3xl font-bold mb-8">Login</h1>

                    <!-- Input Fields -->
                    <form action="{{route('admin.login.process')}}" method="post">
                        {{csrf_field()}}

                        @if ($errors->any())
                        <div class="alert alert-danger bg-red-500 text-white p-4 rounded-md mb-4">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="mb-6">

                            <input
                                type="text"
                                name="email"
                                id="email"
                                placeholder="email"
                                class="w-full px-4 py-3 rounded-md text-gray-800 border focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>
                        <div class="mb-8">
                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="Password"
                                class="w-full px-4 py-3 rounded-md text-gray-800 border focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                        </div>

                        <!-- Login Button -->
                        <button
                            type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-6 w-full rounded-md transition duration-300">
                            Log in
                        </button>
                </div>
                </form>
            </div>

        </div>
    </section>
</x-home-layout>