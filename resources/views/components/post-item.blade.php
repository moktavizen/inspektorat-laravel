<a href="{{ route('viewPost', $post) }}">
    <div
        class="bg-teal-600 overflow-hidden shadow-md rounded-lg max-w-[384px] hover:shadow-2xl border border-teal-600 transition duration-300 hover:scale-105 ease-in-out">
        <img class="w-[384px] aspect-video object-cover" src="/storage/{{ $post->thumbnail }}" />
        <div class="px-3 pt-1 pb-3">
            <h3 class="font-semibold text-sm lg:text-xl mb-1 md:mb-3 line-clamp-2 min-h-[40px] md:min-h-[56px]">
                {{ $post->title }}
            </h3>
            <div class="text-sm lg:text-lg md:mb-1">
                Diterbitkan: <span
                    class="whitespace-nowrap">{{ \Carbon\Carbon::parse($post->updated_at)->format('d/m/Y') }}</span>
            </div>
        </div>
    </div>
</a>
