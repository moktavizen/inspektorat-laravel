<x-app-layout>
    <section class="py-8 bg-neutral-50 md:py-20">
        <div class="container px-4 mx-auto text-center xl:max-w-7xl md:px-8 min-h-[30vh]">
            <h2 class="text-2xl font-bold lg:text-4xl text-neutral-800">
                Pengumuman Inspektorat
            </h2>
            <div class="grid grid-cols-1 gap-3 text-white md:grid-cols-3 md:gap-8 text-start mt-7 md:mt-9">
                @foreach ($posts as $post)
                    <x-post-item :post="$post"></x-post-item>
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </section>
</x-app-layout>
