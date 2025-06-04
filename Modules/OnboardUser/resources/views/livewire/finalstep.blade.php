<x-onboarduser::layouts.master>
    <section
        class="mx-auto max-w-md rounded-2xl bg-white px-4 py-8 text-center"
    >
        <h2 class="text-3xl font-semibold text-gray-800">
            🎉 You’re Almost There!
        </h2>
        <p class="mt-4 text-gray-600">
            Just one more step to unlock your best matches.
        </p>

        <div class="mt-6 space-y-4 text-left">
            <div>
                <h3 class="text-xl font-medium text-gray-700">
                    Show the real you
                </h3>
                <p class="mt-1 text-gray-500">
                    A great profile photo can boost your matches by over 200%.
                    Upload your favorite shot—one that feels authentic and makes
                    you smile.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-medium text-gray-700">
                    Share a little flair
                </h3>
                <p class="mt-1 text-gray-500">
                    Pick three fun prompts or “icebreaker” questions that help
                    you stand out. Whether it’s your go-to karaoke song or dream
                    travel destination, these little details spark
                    conversations.
                </p>
            </div>
        </div>

        <button
            type="button"
            wire:click="goNextStep"
            class="mt-8 inline-flex w-full items-center justify-center rounded-2xl bg-blue-600 px-6 py-3 font-medium text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none"
        >
            Finish Onboarding
        </button>
    </section>
</x-onboarduser::layouts.master>
