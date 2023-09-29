<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inspektorat | Gresik</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="pt-16 bg-white">
    <nav class="fixed top-0 z-50 w-full shadow backdrop-blur-lg bg-white/70" x-data="{ navbarOpen: false }">
        <div class="container flex flex-wrap justify-between px-4 mx-auto xl:max-w-7xl md:px-8">
            <a href="{{ route('home') }}" class="py-4">
                <img src="{{ asset('/images/logo-inspektorat.svg') }}" alt="Logo" class="h-8">
            </a>
            <button class="xl:hidden" @click="navbarOpen = ! navbarOpen">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <ul class="xl:flex flex-col w-[1024px] pb-6 xl:w-auto xl:flex-row xl:place-items-center gap-4 xl:py-0 xl:gap-0 text-base xl:text-lg "
                :class=" navbarOpen ? 'flex' : 'hidden'" x-cloak x-transition>
                <li>
                    <a href="{{ route('home') }}" class="py-[19px] xl:pr-6 text-neutral-800 hover:text-teal-600">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="{{ route('docs') }}" class="py-[19px] xl:px-6 text-neutral-800 hover:text-teal-600">
                        Dokumen
                    </a>
                </li>
                @foreach ($menus as $menu)
                    <li>
                        <a href="{{ route('viewMenu', $menu) }}"
                            class="py-[19px] xl:px-6 text-neutral-800 hover:text-teal-600">
                            {{ $menu->title }}
                        </a>
                    </li>
                @endforeach
                @foreach ($dropdowns as $dropdown)
                    <li class="relative group">
                        <a class="cursor-pointer py-[19px] xl:px-6 text-neutral-800 hover:text-teal-600">
                            {{ $dropdown->title }}
                        </a>
                        <ul
                            class="left-0 hidden w-full mt-2 text-base rounded-md text-neutral-800 xl:bg-white xl:mt-4 xl:p-2 xl:w-max xl:max-w-[274px] xl:shadow-md xl:absolute group-hover:block xl:text-lg">
                            @foreach ($dropdown->dropdown_items as $dropdown_item)
                                <li class="ml-6 list-disc">
                                    <a href="{{ route('viewDropdownItem', $dropdown_item) }}"
                                        class="block w-full p-2 text-left first-of-type:rounded-t-md last-of-type:rounded-b-md hover:bg-neutral-50 disabled:text-gray-500">
                                        {{ $dropdown_item->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li class="relative group">
                    <a class="cursor-pointer py-[19px] xl:px-6 text-neutral-800 hover:text-teal-600">
                        Berita
                    </a>
                    <ul
                        class="left-0 hidden w-full mt-2 text-base rounded-md text-neutral-800 xl:bg-white xl:mt-4 xl:p-2 xl:w-max xl:max-w-[274px] xl:shadow-md xl:absolute group-hover:block xl:text-lg">
                        <li class="ml-6 list-disc">
                            <a href="{{ route('posts') }}"
                                class="block w-full p-2 text-left first-of-type:rounded-t-md last-of-type:rounded-b-md hover:bg-neutral-50 disabled:text-gray-500">
                                Pengumuman
                            </a>
                        </li>
                        <li class="ml-6 list-disc">
                            <a href="{{ route('agendas') }}"
                                class="block w-full p-2 text-left first-of-type:rounded-t-md last-of-type:rounded-b-md hover:bg-neutral-50 disabled:text-gray-500">
                                Agenda
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="relative group">
                    <a class="cursor-pointer py-[19px] xl:pl-6 font-semibold text-blue-800 hover:text-blue-600">
                        Layanan
                    </a>
                    <ul
                        class="left-0 hidden w-full mt-2 text-base rounded-md text-neutral-800 xl:bg-white xl:mt-4 xl:p-2 xl:w-max xl:max-w-[274px] xl:shadow-md xl:absolute group-hover:block xl:text-lg">
                        @foreach ($services as $service)
                            <li class="ml-6 list-disc">
                                <a href="{{ route('viewService', $service) }}"
                                    class="block w-full p-2 text-left first-of-type:rounded-t-md last-of-type:rounded-b-md hover:bg-neutral-50 disabled:text-gray-500">
                                    {{ $service->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    {{ $slot }}

    <footer>
        <section class="py-14 md:py-20">
            <div
                class="container flex flex-col items-start justify-between gap-6 px-4 mx-auto text-start xl:max-w-7xl md:px-8 md:flex-row md:items-start md:text-start">
                <img class="h-8 mt-[-2px]" src={{ asset('/images/logo-inspektorat.svg') }} alt="logo inspektorat" />

                <div class="box max-w-[320px]">
                    <div class="mb-2 text-base font-medium text-neutral-800 lg:text-xl">
                        <span class="flex items-center gap-2">
                            Kontak <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-4 h-4">
                                <path
                                    d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                <path
                                    d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                            </svg>
                        </span>
                    </div>
                    <ul class="flex flex-col gap-2 text-sm text-neutral-500 lg:text-base">
                        <li>
                            <a href="https://www.google.com/maps/search/{{ $contact->address }}" target="blank"
                                class="hover:text-teal-600">
                                Alamat:
                                <br />
                                {{ $contact->address }}
                            </a>
                        </li>
                        <li>
                            <a href="tel:+62{{ $contact->phone }}" class="hover:text-teal-600">
                                Telepon: <br />
                                {{ $contact->phone }}
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ $contact->email }}" class="hover:text-teal-600">
                                Email: <br />
                                {{ $contact->email }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box">
                    <div class="mb-2 text-base font-medium text-neutral-800 lg:text-xl">
                        <span class="flex items-center gap-2">
                            Tautan Terkait
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-4 h-4">
                                <path
                                    d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                                <path
                                    d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                            </svg>
                        </span>
                    </div>
                    <ul class="flex flex-col gap-2 text-sm text-neutral-500 lg:text-base">
                        @foreach ($links as $link)
                            <li>
                                <a href="{{ $link->link }}" target="blank" class="hover:text-teal-600">
                                    {{ $link->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="box">
                    <div class="mb-2 text-base font-medium text-neutral-800 lg:text-xl">
                        <span class="flex items-center gap-2">
                            Pengunjung
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-4 h-4">
                                <path
                                    d="M15.5 2A1.5 1.5 0 0014 3.5v13a1.5 1.5 0 001.5 1.5h1a1.5 1.5 0 001.5-1.5v-13A1.5 1.5 0 0016.5 2h-1zM9.5 6A1.5 1.5 0 008 7.5v9A1.5 1.5 0 009.5 18h1a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 6h-1zM3.5 10A1.5 1.5 0 002 11.5v5A1.5 1.5 0 003.5 18h1A1.5 1.5 0 006 16.5v-5A1.5 1.5 0 004.5 10h-1z" />
                            </svg>
                        </span>
                    </div>
                    <div class="flex flex-col gap-1 text-sm text-neutral-500 lg:text-base">
                        <div class="flex justify-between gap-2">
                            <span>Minggu ini</span><span>{{ $visitorStatistic->weekly_visitors }}</span>
                        </div>
                        <hr>
                        <div class="flex justify-between gap-2">
                            <span>Total</span><span>{{ $visitorStatistic->total_visitors }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="px-4 py-5 text-sm text-center text-white bg-teal-600 lg:text-base">
            Dinas Komunikasi dan Informatika Kabupaten Gresik © 2023. All Rights Reserved
        </div>
    </footer>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
