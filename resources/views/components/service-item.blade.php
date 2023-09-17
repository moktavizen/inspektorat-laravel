<a href="{{ route('viewService', $service) }}">
    <div
        class="p-3 text-teal-600 transition duration-300 ease-in-out bg-white rounded-md shadow-md md:p-9 hover:shadow-2xl hover:bg-teal-600 hover:text-white hover:scale-110">
        <div class="overflow-hidden">
            <div class="grid gap-5 mb-5 place-items-center">
                <img src="/storage/{{ $service->thumbnail }}" class="h-[40px] rounded" />
                <img src="{{ asset('/images/divider.svg') }}" alt="divider" class="h-[2px] " />
            </div>
            <h3 class="text-sm font-semibold text-center lg:text-xl line-clamp-1">
                {{ $service->title }}
            </h3>
        </div>
    </div>
</a>
