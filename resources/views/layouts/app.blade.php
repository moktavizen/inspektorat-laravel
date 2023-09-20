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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="pt-16 bg-white">
    <nav class="fixed top-0 z-50 w-full shadow backdrop-blur-xl bg-white/80" x-data="{ navbarOpen: false }">
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
                        @foreach ($contacts as $contact)
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
                        @endforeach

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
                            Layanan
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"
                                    clip-rule="evenodd" />
                            </svg>

                        </span>
                    </div>
                    <ul class="flex flex-col gap-2 text-sm text-neutral-500 lg:text-base">
                        @foreach ($services as $service)
                            <li>
                                <a href="{{ route('viewService', $service) }}" class="hover:text-teal-600">
                                    {{ $service->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
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
