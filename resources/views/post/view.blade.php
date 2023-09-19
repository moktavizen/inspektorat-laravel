<x-app-layout>
    <div class="overflow-hidden">
        <div class="py-8 md:py-20 bg-neutral-50 min-h-[50vh]">
            <div class="p-4 sm:p-6 md:p-14 max-w-[880px] mx-auto bg-white shadow-sm rounded-xl ring-1 ring-gray-950/5">
                <div class="max-w-3xl mx-auto ">
                    <main>
                        <article class="relative pt-10">
                            <h1 class="text-2xl font-extrabold tracking-tight text-neutral-800 sm:text-3xl">
                                {{ $post->title }}
                            </h1>
                            <div class="text-sm leading-6">
                                <dl>
                                    <dt class="sr-only">Date</dt>
                                    <dd class="absolute inset-x-0 top-0 text-neutral-800">
                                        <time>{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }}</time>
                                    </dd>
                                </dl>
                            </div>
                            <div class="mt-6">
                                <ul class="flex flex-wrap -mx-5 -mt-6 text-sm leading-6">
                                    <li class="flex items-center px-5 mt-6 font-medium whitespace-nowrap">
                                        <img class="mr-3 rounded-full w-9 h-9" src="{{ asset('/images/profile.jpg') }}"
                                            alt="profile" />
                                        <div class="text-sm leading-4">
                                            <div class="text-neutral-800">{{ $post->user->name }}</div>
                                            <div class="mt-1">
                                                <div class="text-sky-700">{{ $post->user->email }}</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <img class="object-cover w-full my-12 border aspect-video rounded-xl border-neutral-900/10"
                                src="/storage/{{ $post->thumbnail }}" alt="cover" />
                            <div
                                class="overflow-auto prose prose-neutral prose-img:rounded-xl prose-img:border prose-img:border-neutral-900/10 prose-img:w-full prose-figcaption:hidden max-w-none">
                                {!! $post->body !!}
                            </div>
                        </article>
                    </main>
                </div>
            </div>
        </div>
</x-app-layout>
