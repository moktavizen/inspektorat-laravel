<x-app-layout>
    <section class="py-8 md:py-20 bg-neutral-50">
        <div class="text-center container sm:px-4 md:px-8 mx-auto xl:max-w-7xl min-h-[30vh]">
            <h2 class="text-2xl font-bold lg:text-4xl text-neutral-800 mb-7 md:mb-9">
                Agenda Inspektorat
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
            {{ $agendas->links() }}
        </div>
    </section>
</x-app-layout>
