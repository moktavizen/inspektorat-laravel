<article class="relative group">
    <div
        class="absolute -inset-y-2.5 -inset-x-4 md:-inset-y-4 md:-inset-x-6 sm:rounded-2xl group-hover:bg-neutral-50/70 ">
    </div><svg viewBox="0 0 9 9"
        class="hidden absolute right-full mr-6 top-2 text-neutral-200 md:mr-12 w-[calc(0.5rem+1px)] h-[calc(0.5rem+1px)] overflow-visible sm:block">
        <circle cx="4.5" cy="4.5" r="4.5" stroke="currentColor" class="fill-white" stroke-width="2">
        </circle>
    </svg>
    <div class="relative">
        <h3 class="pt-8 text-base font-semibold tracking-tight text-neutral-900 lg:pt-0">
            {{ $agenda->title }}</h3>
        <div class="mt-2 mb-4 prose prose-neutral prose-a:relative prose-a:z-10 line-clamp-2 max-w-none max-h-14">
            {{ $agenda->description }}
        </div>
        <dl class="absolute left-0 top-0 lg:left-auto lg:right-full lg:mr-[calc(6.5rem+1px)]">
            <dt class="sr-only">Date</dt>
            <dd class="text-sm leading-6 whitespace-nowrap">
                <time>{{ \Carbon\Carbon::parse($agenda->agenda_date)->format('F Y') }}</time>
            </dd>
        </dl>
    </div>
    <a class="flex items-center text-sm font-medium text-teal-600" href="{{ route('viewAgenda', $agenda) }}">
        <span class="absolute -inset-y-2.5 -inset-x-4 md:-inset-y-4 md:-inset-x-6 sm:rounded-2xl">
        </span>
        <span class="relative">Buka
            <span class="sr-only">, {{ $agenda->title }}
            </span>
        </span>
        <svg class="relative mt-px overflow-visible ml-2.5 text-teal-400" width="3" height="6"
            viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M0 0L3 3L0 6"></path>
        </svg>
    </a>
</article>
