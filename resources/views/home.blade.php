<x-app-layout>
    <section class="bg-hero bg-cover bg-center h-[640px] py-14 md:py-20">
        <div
            class="container flex items-center justify-center h-full px-4 mx-auto xl:max-w-7xl md:px-8 md:justify-start">
            <h1
                class="font-semibold text-4xl lg:text-6xl lg:leading-[4.5rem] text-center md:text-start text-neutral-800">
                Inspektorat <br /> Kabupaten Gresik
            </h1>
        </div>
    </section>
    <section class="py-14 md:py-20">
        <div class="container px-4 mx-auto xl:max-w-7xl md:px-8">
            <h2 class="text-2xl font-bold text-center lg:text-4xl text-neutral-800 mb-7 md:mb-9">
                Tugas
            </h2>

            <div class="flex flex-col sm:flex-row justify-between gap-3 max-w-[398px] sm:max-w-5xl mx-auto">
                <div class="p-5 border-2 rounded-md sm:max-w-[300px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 mb-4 text-blue-800">
                        <path
                            d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                    </svg>

                    <h3 class="mb-4 text-sm font-semibold lg:text-xl text-neutral-800">
                        Membantu
                    </h3>
                    <div class="text-sm text-neutral-500 lg:text-base">
                        Membantu bupati dalam urusan pemerintahan.
                    </div>
                </div>
                <div class="p-5 border-2 rounded-md sm:max-w-[300px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 mb-4 text-blue-800">
                        <path d="M8.25 10.875a2.625 2.625 0 115.25 0 2.625 2.625 0 01-5.25 0z" />
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.125 4.5a4.125 4.125 0 102.338 7.524l2.007 2.006a.75.75 0 101.06-1.06l-2.006-2.007a4.125 4.125 0 00-3.399-6.463z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="mb-4 text-sm font-semibold lg:text-xl text-neutral-800">
                        Mengawasi
                    </h3>
                    <div class="text-sm text-neutral-500 lg:text-base">
                        Mengawasi pelakasanaan urusan pemerintahan.
                    </div>
                </div>
                <div class="p-5 border-2 rounded-md sm:max-w-[300px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 mb-4 text-blue-800">
                        <path fill-rule="evenodd"
                            d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="mb-4 text-sm font-semibold lg:text-xl text-neutral-800">
                        Membina
                    </h3>
                    <div class="text-sm text-neutral-500 lg:text-base">
                        Membina pelakasanaan urusan pemerintahan.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about py-14 md:py-20">
        <div class="container flex flex-col items-center justify-center px-4 mx-auto xl:max-w-7xl md:px-8 md:flex-row">
            <img class="rounded-lg w-full md:w-[74.5%] object-cover shadow-xl" src={{ asset('/images/about.webp') }} />
            <div class="w-[90%] bg-teal-600 p-4 sm:p-8 lg:p-10 rounded-lg mt-[-14.5%] md:mt-0 md:ml-[-14.5%] shadow-xl">
                <div class="text-white content">
                    <h2 class="text-2xl font-bold lg:text-4xl">Profil</h2>
                    <p class="mt-2 text-sm lg:mt-6 lg:text-xl">
                        Inspektorat Daerah merupakan unsur pengawas penyelenggaraan pemerintahan daerah, yang dipimpin
                        oleh seorang Inspektur yang dalam melaksanakan tugas dan fungsinya bertanggung jawab kepada
                        Bupati melalui Sekretaris Daerah. Inspektorat Daerah mempunyai tugas membantu Bupati membina &
                        mengawasi Pemerintahan.
                    </p>

                </div>
            </div>
        </div>
    </section>
    <section id="services" class="px-0 services bg-neutral-50 md:px-8 py-14 md:py-20">
        <div class="container px-4 mx-auto text-center lg:max-w-5xl md:px-0">
            <h2 class="text-2xl font-bold lg:text-4xl text-neutral-800">
                Layanan
            </h2>
            <div class="grid grid-cols-2 gap-3 mx-auto md:grid-cols-3 md:gap-x-24 md:gap-y-12 text-start my-7 md:my-9">
                @foreach ($services as $service)
                    <x-service-item :service="$service"></x-service-item>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-center bg-cover bg-contact py-14 md:py-20">
        <div class="container px-4 mx-auto xl:max-w-7xl md:px-8">
            <div
                class="flex flex-col items-center justify-between text-center text-white md:flex-row gap-7 md:gap-14 md:text-start">
                <div>
                    <h2 class="mb-4 text-2xl font-bold lg:text-4xl md:mb-7">
                        Dokumen Inspektorat
                    </h2>
                    <div class="text-base lg:text-xl">
                        <a href="{{ route('docs') }}" class="hover:underline">
                            Dokumen atau berkas yang berisi <u>informasi publik</u>
                        </a>
                    </div>
                </div>
                <div>
                    <a href="{{ route('docs') }}">
                        <button
                            class="px-4 py-3 text-sm font-semibold border border-white border-solid rounded-md shadow-md lg:text-lg md:px-5 md:py-4 whitespace-nowrap hover:bg-white hover:text-neutral-800">
                            Lihat Dokumen
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 md:py-20 bg-neutral-50">
        <div class="container mx-auto text-center xl:max-w-7xl sm:px-4 md:px-8">
            <h2 class="text-2xl font-bold lg:text-4xl text-neutral-800 mb-7 md:mb-9">
                Agenda
            </h2>
            <div
                class="px-4 py-4 bg-white shadow-sm text-start md:py-12 md:px-14 rounded-xl ring-1 ring-gray-950/5 mb-7 md:mb-9">
                <div
                    class="relative sm:pb-12 sm:ml-[calc(2rem+1px)] md:ml-[calc(3.5rem+1px)] lg:ml-[max(calc(14.5rem+1px),calc(100%-57rem))]">
                    <div
                        class="hidden absolute top-3 bottom-0 right-full mr-7 md:mr-[3.25rem] w-px bg-neutral-200 sm:block">
                    </div>
                    <div class="space-y-16">
                        @foreach ($agendas as $agenda)
                            <x-agenda-item :agenda="$agenda"></x-agenda-item>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('agendas') }}">
                <button
                    class="px-4 py-3 text-sm font-semibold text-white rounded-md shadow-md lg:text-lg md:px-5 md:py-4 bg-neutral-800 hover:bg-neutral-800/80">
                    Selengkapnya
                </button>
            </a>
        </div>
    </section>

    <section class="posts py-14 md:py-20 ">
        <div class="container px-4 mx-auto text-center xl:max-w-7xl md:px-8">
            <h2 class="text-2xl font-bold lg:text-4xl text-neutral-800">
                Pengumuman
            </h2>
            <div
                class="grid grid-cols-1 gap-3 text-white md:grid-cols-3 place-items-center text-start my-7 md:my-9 md:gap-8">
                @foreach ($posts as $post)
                    <x-post-item :post="$post"></x-post-item>
                @endforeach
            </div>
            <a href="{{ route('posts') }}">
                <button
                    class="px-4 py-3 text-sm font-semibold text-white rounded-md shadow-md lg:text-lg md:px-5 md:py-4 bg-neutral-800 hover:bg-neutral-800/80">
                    Selengkapnya
                </button>
            </a>
        </div>
    </section>
    <section class="bg-neutral-50 py-14 md:py-20">
        <div class="container px-4 mx-auto xl:max-w-7xl md:px-8">
            <div class="max-w-[592px] mx-auto text-center text-neutral-800">
                <h2 class="mb-5 text-2xl font-bold lg:text-4xl">Ada pertanyaan untuk kami?</h2>
                <div class="text-base lg:text-xl">
                    Hubungi <a href="tel:+62{{ $contact->phone }}" class="hover:underline">
                        {{ $contact->phone }}</a>
                    atau isi formulir berikut untuk mengirim pesan ke email kami!
                </div>
                <form action="mailto:{{ $contact->email }}" method="post" encType="text/plain">
                    <div class="grid grid-cols-1 text-sm md:grid-cols-2 gap-x-8 gap-y-2 md:gap-y-5 my-9 lg:text-lg">
                        <input
                            class="p-2 border border-gray-200 rounded form-input focus:border-teal-600 focus:ring focus:ring-teal-500 focus:ring-opacity-50"
                            type="text" name="nama" id="nama" placeholder="Nama" />
                        <input
                            class="p-2 border border-gray-200 rounded form-input focus:border-teal-600 focus:ring focus:ring-teal-500 focus:ring-opacity-50"
                            type="text" name="email" id="email" placeholder="Email" />
                        <input
                            class="p-2 border border-gray-200 rounded form-input focus:border-teal-600 focus:ring focus:ring-teal-500 focus:ring-opacity-50"
                            type="text" name="perihal" id="perihal" placeholder="Perihal" />
                        <input
                            class="p-2 border border-gray-200 rounded form-input focus:border-teal-600 focus:ring focus:ring-teal-500 focus:ring-opacity-50"
                            type="text" name="no.telp." id="no.telp." placeholder="No. Telp." />
                        <textarea
                            class="p-2 border border-gray-200 rounded form-textarea md:col-span-2 focus:border-teal-600 focus:ring focus:ring-teal-500 focus:ring-opacity-50"
                            name="pesan" id="pesan" placeholder="Pesan" rows="4"></textarea>
                    </div>
                    <input type="submit" value="Kirim"
                        class="px-20 py-3 text-sm font-semibold text-white bg-teal-600 rounded-md shadow-md cursor-pointer lg:text-lg md:py-4 md:px-24 hover:bg-teal-600/70" />
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
