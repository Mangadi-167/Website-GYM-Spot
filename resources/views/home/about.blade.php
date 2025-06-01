<x-home-layout>

    @section('title', 'About')

    <section>

        <div class="py-8 px-3 mx-auto max-w-screen-xl  lg:grid-cols-2 row-span-3 gap-8 lg:gap-16 text-center ">
            <p class="text-5xl m-8 p-8 font-bold mt-5 "> <span class="text-yellow-300">Tentang</span> <span class="text-black">Kami</span></< /p>
        </div>


        <div class="py-8 pl-8 max-w-screen  lg:grid-cols-2 row-span-3 gap-8 lg:gap-16 p-8 h-60" style="background-color: black;">
            <p class="text-3xl text-white font-bold"> <span class="text-yellow-300">Sejarah</span> dan <span class="text-yellow-300">latar</span> Belakang</p>
            <p class="text-xl text-white text-justify mt-4">Gym Spot didirikan dengan misi menghadirkan lingkungan gym yang nyaman, modern, dan <br>engkap. Berawal dari kebutuhan akan tempat latihan yang lebih terjangkau dan mudah dijangkau, <br>kami terus tumbuh menjadi platform yang melayani berbagai kebutuhan kebugaran masyarakat.</p>
        </div>

    </section>

    <section>
        <div class="flex justify-center gap-3 flex-wrap">
        </div>
        <div class=" text-white">
            <div class="container mx-auto p-8 mt-8 h-auto rounded-lg">

                <!-- Grid Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-2 ">
                    <!-- Card 1: Hormon Kebahagiaan -->
                    <div class="rounded-lg shadow-lg p-8 flex flex-col h-auto sm:h-80 jusi" style="background-color: black;">
                        <h2 class="text-yellow-300 text-2xl sm:text-3xl font-bold mb-2">Misi <span class="text-white">dan</span> Visi</h2>
                        <p class="text-white text-xl sm:text-2xl text-justify">
                            Misi kami adalah menjadikan kebugaran sebagai gaya hidup yang dapat diakses dan dinikmati oleh semua kalangan. Visi kami adalah menjadi mitra terpercaya bagi individu dan pemilik gym dalam membangun komunitas sehat yang kuat.
                        </p>
                    </div>

                    <!-- Card 2: Musik Meningkatkan Performa -->
                    <div class="rounded-lg shadow-lg p-8 h-auto sm:h-80 flex flex-col" style="background-color: black;">
                        <h2 class="text-yellow-300 text-2xl sm:text-3xl font-bold mb-2">Layanan <span class="text-white">Utama</span></h2>
                        <p class="text-white text-xl sm:text-2xl text-justify">
                            Gym Spot menawarkan tempat gym dengan peralatan modern dan fasilitas yang nyaman. Kami juga membuka peluang bagi pemilik gym untuk mempromosikan layanan mereka, memperluas jangkauan, dan menarik lebih banyak pelanggan melalui platform kami.
                        </p>
                    </div>

                    <!-- Card 3: Keunggulan atau Nilai Tambah -->
                    <div class="rounded-lg shadow-lg p-8 h-auto sm:h-80 flex flex-col" style="background-color: black;">
                        <h2 class="text-yellow-300 text-2xl sm:text-3xl font-bold mb-2">Keunggulan <span class="text-white">atau</span> Nilai Tambah</h2>
                        <p class="text-white text-xl sm:text-2xl text-justify">
                            Kami menyediakan lingkungan kebugaran yang aman dan nyaman dengan peralatan canggih serta dukungan penuh bagi pemilik gym yang ingin mengembangkan bisnis mereka. Dengan visibilitas yang tinggi dan akses yang mudah, Gym Spot menjadi pilihan utama dalam dunia kebugaran.
                        </p>
                    </div>

                    <!-- Card 4: Informasi Tim -->
                    <div class="rounded-lg mb-4 shadow-lg p-8 h-auto sm:h-80 flex flex-col" style="background-color: black;">
                        <h2 class="text-yellow-300 text-2xl sm:text-3xl font-bold mb-2">Informasi <span class="text-white">Tim</span></h2>
                        <p class="text-white text-justify text-xl sm:text-2xl">
                            Gym Spot dikelola oleh tim profesional yang berpengalaman di dunia kebugaran dan teknologi, selalu siap memberikan layanan terbaik dan inovasi demi mendukung kebutuhan Anda.
                        </p>
                    </div>

                </div>
            </div>
    </section>

</x-home-layout>