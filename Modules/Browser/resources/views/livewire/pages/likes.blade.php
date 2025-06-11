<div>
    <x-customtheme::page-layouts.page-with-image-banner
        :title="__('Likes and passes')"
        :description="__('Work in progress')"
        :image="false"
    >
        <x-slot name="body">
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
        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>
</div>
