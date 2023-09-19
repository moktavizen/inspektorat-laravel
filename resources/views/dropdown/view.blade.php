<x-app-layout>
    <section class="py-8 md:py-20 bg-neutral-50">
        <div class="container mx-auto lg:max-w-[880px] min-h-[50vh] sm:px-4 md:px-8 lg:px-0">
            <h2 class="px-4 text-2xl font-bold text-center sm:px-0 lg:text-4xl text-neutral-800 mb-7 md:mb-9">
                {{ $dropdown_item->title }}
            </h2>
            <div class="p-4 mx-auto bg-white shadow-sm sm:p-6 md:p-14 rounded-xl ring-1 ring-gray-950/5">
                <div class="max-w-3xl mx-auto">
                    <div
                        class="overflow-auto prose prose-neutral prose-img:rounded-xl prose-img:border prose-img:border-neutral-900/10 prose-img:w-full prose-figcaption:hidden max-w-none">
                        {!! $dropdown_item->body !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
