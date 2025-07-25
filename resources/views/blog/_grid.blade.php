<div
    class="w-full my-10 flex flex-col sm:items-center sm:flex-row gap-6 {{ request('search') ? 'justify-between' : 'justify-end' }}">
    @if (request('search'))
        <p class="text-center text-accent-yellow text-lg mt-4">
            Showing results for: <strong>"{{ request('search') }}"</strong>
        </p>
    @endif

    <form method="GET" action="{{ route('blog.index') }}" class="w-full max-w-lg flex
        id="search-form">
        {{-- Search Input --}}
        <input type="text" name="search" value="{{ request('search') }}"
            class="flex-1 px-4 py-2 rounded-l-full border border-accent-teal bg-white text-black focus:outline-none focus:ring-2 focus:ring-accent-yellow"
            placeholder="Search posts...">
        <button type="submit"
            class="px-5 py-2 rounded-r-full bg-accent-teal text-black hover:bg-accent-yellow transition-all">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

</div>

<div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-10 gap-y-20 my-12">
    {{-- Loop through posts --}}
    @forelse ($posts as $post)
        <div>
            <img src="{{ $post->thumbnail ?? asset('img/blog/default blog thumbnail.png') }}" alt="{{ $post->title }}"
                class="w-full aspect-[243.32/162.21] object-cover rounded-lg shadow-md mb-2">
            <p class="text-accent-yellow">
                {{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}
            </p>
            <h4 class="text-3xl font-opensans font-bold tracking-[0.02rem]">{{ $post->title }}</h4>
            <a href="{{ route('blog.show', $post->slug) }}"
                class="block w-full mt-5 rounded-full border border-accent-teal hover:bg-white hover:text-black text-center transition-all duration-200 py-1">
                Read now
            </a>
        </div>
    @empty
        <div class="col-span-full text-center text-accent-yellow text-xl font-semibold">
            No blog posts found.
        </div>
    @endforelse
</div>


{{-- Pagination --}}
@if ($pagination['last_page'] > 1)
    <div class="mt-16 flex justify-center space-x-2 pagination">
        @if ($pagination['prev'])
            <a href="{{ $pagination['prev'] }}"
                class="px-4 py-2 text-sm bg-accent-teal text-black hover:bg-accent-yellow rounded-full transition-all flex items-center justify-center">
                <i class="fa-solid fa-chevron-left w-3.5 flex items-center justify-center"></i>
            </a>
        @else
            <span class="px-4 py-2 text-sm text-gray-400 bg-gray-800 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-chevron-left w-3.5 flex items-center justify-center"></i>
            </span>
        @endif

        @for ($page = 1; $page <= $pagination['last_page']; $page++)
            @php $url = request()->fullUrlWithQuery(['page' => $page]) @endphp
            @if ($page == $pagination['current_page'])
                <span
                    class="px-4 py-2 text-sm bg-accent-yellow text-black font-bold rounded-full">{{ $page }}</span>
            @else
                <a href="{{ $url }}"
                    class="px-4 py-2 text-sm bg-accent-teal text-black hover:bg-accent-yellow rounded-full transition-all">{{ $page }}</a>
            @endif
        @endfor

        @if ($pagination['next'])
            <a href="{{ $pagination['next'] }}"
                class="px-4 py-2 text-sm bg-accent-teal text-black hover:bg-accent-yellow rounded-full transition-all flex items-center justify-center">
                <i class="fa-solid fa-chevron-right w-3.5 flex items-center justify-center"></i>
            </a>
        @else
            <span class="px-4 py-2 text-sm text-gray-400 bg-gray-800 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-chevron-right w-3.5 flex items-center justify-center"></i>
            </span>
        @endif
    </div>
@endif
