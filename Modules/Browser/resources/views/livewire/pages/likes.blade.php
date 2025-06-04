<section class="bg-gray-50 antialiased dark:bg-gray-900">
    <div
        class="mx-auto w-full max-w-5xl px-5 py-3 xl:max-w-7xl 2xl:max-w-[90rem]"
    >
        <div class="mb-10">
            <h3>You liked ({{ $likes->total() }})</h3>

            <ul class="list-inside list-disc">
                @foreach ($likes as $like)
                    <li>
                        <a href="{{ route('browser.show', $like->ulid) }}" wire:navigate.hover>
                            {{ $like->first_name }} {{ $like->last_name[0] }}.
                        </a>
                    </li>
                @endforeach
            </ul>

            {{ $likes->links() }}
        </div>

        <div class="mb-10">
            <h3>Likes you ({{ $likesYou->total() }})</h3>

            <ul class="list-inside list-disc">
                @foreach ($likesYou as $like)
                    <li>
                        <a href="{{ route('browser.show', $like->ulid) }}"  wire:navigate.hover>
                            {{ $like->first_name }} {{ $like->last_name[0] }}.
                        </a>
                    </li>
                @endforeach
            </ul>
            @php
            ray($likes)
            @endphp
            {{ $likesYou->links() }}
        </div>

        <div class="mb-10">
            <h3>You passed on these people ({{ $passes->total() }})</h3>

            <ul class="list-inside list-disc">
                @foreach ($passes as $pass)
                    <li>
                        <button>
                            {{ $pass->first_name }} {{ $pass->last_name[0] }}.
                        </button>
                    </li>
                @endforeach
            </ul>
            {{ $passes->links() }}
        </div>
    </div>
</section>
