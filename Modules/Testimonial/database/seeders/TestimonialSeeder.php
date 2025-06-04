<?php

declare(strict_types=1);

namespace Modules\Testimonial\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

final class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('testimonials')->insert([
            [
                'firstname' => 'Bonnie',
                'lastname' => 'Green',
                'match' => 1,
                'amount' => 2,
                'time' => 'd',
                'short' => 'Two days in and I met someone who truly gets me.',
                'long' => 'After bouncing around other apps for months, I finally found a genuine connection here in just two days someone who understands me and shares my sense of humor.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],
            // 2
            [
                'firstname' => 'Helene',
                'lastname' => 'Engels',
                'match' => 1,
                'amount' => 1,
                'time' => 'd',
                'short' => 'One day of chatting led to our first date!',
                'long' => 'I never expected to go from sign-up to first date in under 24 hours, but here we are laughing over coffee and already planning our next adventure.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],
            // 3
            [
                'firstname' => 'Neil',
                'lastname' => 'Sims',
                'match' => 1,
                'amount' => 5,
                'time' => 'd',
                'short' => 'Five days until I found my perfect swipe right.',
                'long' => 'It only took five days to swipe right on my ideal partner someone with the same passions and quirks. I couldn’t be happier.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 4
            [
                'firstname' => 'Lucas',
                'lastname' => 'Martinez',
                'match' => 0,
                'amount' => 0,
                'time' => 'h',
                'short' => 'Still exploring so many interesting people here!',
                'long' => 'I’ve only just started browsing, but the honesty and authenticity on this platform are so refreshing. Excited to see where it leads.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 5
            [
                'firstname' => 'Aisha',
                'lastname' => 'Khan',
                'match' => 1,
                'amount' => 7,
                'time' => 'd',
                'short' => 'A week in and already planning our next outing.',
                'long' => 'After seven days filled with amazing conversations, we’ve already planned our first weekend getaway. This platform truly works!',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 6
            [
                'firstname' => 'Oliver',
                'lastname' => 'Smith',
                'match' => 0,
                'amount' => 0,
                'time' => 'h',
                'short' => 'So far, everyone seems sincere—love the vibe!',
                'long' => 'I appreciate that there are no hidden fees and no bots. Even though I haven’t matched yet, I can already tell this place is different.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 7
            [
                'firstname' => 'Sofia',
                'lastname' => 'Rodriguez',
                'match' => 1,
                'amount' => 4,
                'time' => 'd',
                'short' => 'Met my new best friend and something more in four days.',
                'long' => 'First we bonded over hiking stories, then sparks flew. Now our weekends are spent exploring together. All in just four days!',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 8
            [
                'firstname' => 'Ethan',
                'lastname' => 'Nguyen',
                'match' => 1,
                'amount' => 6,
                'time' => 'd',
                'short' => 'No paywalls, no fake profiles, just real connection in six days.',
                'long' => 'I was skeptical at first, but six days later I’m meeting someone who feels like we click on every level. Couldn’t be more pleased.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 9
            [
                'firstname' => 'Emma',
                'lastname' => 'Williams',
                'match' => 0,
                'amount' => 0,
                'time' => 'h',
                'short' => 'Genuinely enjoying the community, even before a match!',
                'long' => 'Between honest profiles and friendly messages, I’m having fun getting to know new people. Looking forward to making that perfect connection.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 10
            [
                'firstname' => 'Noah',
                'lastname' => 'Brown',
                'match' => 1,
                'amount' => 8,
                'time' => 'd',
                'short' => 'Eight days later, and she’s my weekend date.',
                'long' => 'After eight days of great chats, our first date was last Saturday—and it felt like we’d known each other forever.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 11
            [
                'firstname' => 'Mia',
                'lastname' => 'Davis',
                'match' => 1,
                'amount' => 5,
                'time' => 'd',
                'short' => 'Five days in, and my heart feels full.',
                'long' => 'Meeting someone so kind and genuine within five days has completely restored my faith in online dating.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 12
            [
                'firstname' => 'Liam',
                'lastname' => 'Garcia',
                'match' => 0,
                'amount' => 0,
                'time' => 'h',
                'short' => 'Browsing profiles and enjoying meaningful convos.',
                'long' => 'There’s something here for everyone, and the conversations feel real. Can’t wait for what’s next.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 13
            [
                'firstname' => 'Isabella',
                'lastname' => 'Martinez',
                'match' => 1,
                'amount' => 3,
                'time' => 'd',
                'short' => 'Three days until I found my person.',
                'long' => 'In just three days, I connected with someone who shares my passions and values. It’s been incredible.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 14
            [
                'firstname' => 'William',
                'lastname' => 'Lopez',
                'match' => 1,
                'amount' => 7,
                'time' => 'd',
                'short' => 'A week later, and my match surprise me every day.',
                'long' => 'Seven days in, we’re already planning our next getaway. I never imagined finding someone this compatible.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 15
            [
                'firstname' => 'Charlotte',
                'lastname' => 'Gonzalez',
                'match' => 1,
                'amount' => 1,
                'time' => 'd',
                'short' => 'One day was all it took for me to say yes.',
                'long' => 'Signed up in the morning, matched by evening, and by the next day I knew I’d made the right choice.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 16
            [
                'firstname' => 'James',
                'lastname' => 'Wilson',
                'match' => 0,
                'amount' => 0,
                'time' => 'h',
                'short' => 'Getting to know people organically—love it so far.',
                'long' => 'No rush or pressure, just genuine conversations that could lead anywhere. Excited for the future.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 17
            [
                'firstname' => 'Amelia',
                'lastname' => 'Anderson',
                'match' => 1,
                'amount' => 6,
                'time' => 'd',
                'short' => 'Six days until plans for our first trip.',
                'long' => 'After six amazing days chatting, we’ve already booked our first weekend adventure together. Couldn’t be happier.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 18
            [
                'firstname' => 'Benjamin',
                'lastname' => 'Taylor',
                'match' => 1,
                'amount' => 2,
                'time' => 'd',
                'short' => 'Two days of laughter and shared stories.',
                'long' => 'In just two days, we discovered a shared love for travel and cuisine—and already planned our culinary tour of the city.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 19
            [
                'firstname' => 'Sophia',
                'lastname' => 'Lee',
                'match' => 0,
                'amount' => 0,
                'time' => 'h',
                'short' => 'Still searching, but the journey is fun!',
                'long' => 'Though I haven’t matched yet, every message is an opportunity to learn something new about someone special.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],

            // 20
            [
                'firstname' => 'Daniel',
                'lastname' => 'Patel',
                'match' => 1,
                'amount' => 9,
                'time' => 'd',
                'short' => 'Nine days of genuine connection.',
                'long' => 'Nine days of meaningful conversations led to the most memorable first date. So thankful for this platform.',
                'created_at' => $now,
                'updated_at' => $now,
                'show' => true,
                'review' => 9,
            ],
        ]);

        DB::table('pending_testimonials')->insert([
            [
                'firstname' => 'Bonnie',
                'lastname' => 'Green',
                'match' => 1,
                'amount' => 2,
                'time' => 'd',
                'short' => 'Two days in and I met someone who truly gets me.',
                'long' => 'After bouncing around other apps for months, I finally found a genuine connection here in just two days – someone who understands me and shares my sense of humor.',
                'reviewed' => 0,    // has been reviewed
                'review' => 0,    // rating out of 5
                'show' => 0,    // should appear in the carousel
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'firstname' => 'Helene',
                'lastname' => 'Engels',
                'match' => 1,
                'amount' => 1,
                'time' => 'd',
                'short' => 'One day of chatting led to our first date!',
                'long' => 'I never expected to go from sign-up to first date in under 24 hours, but here we are – laughing over coffee and already planning our next adventure.',
                'reviewed' => 0,
                'review' => 0,
                'show' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'firstname' => 'Neil',
                'lastname' => 'Sims',
                'match' => 1,
                'amount' => 5,
                'time' => 'd',
                'short' => 'Five days until I found my perfect swipe right.',
                'long' => 'It only took five days to swipe right on my ideal partner – someone with the same passions and quirks. I couldn’t be happier.',
                'reviewed' => 0,
                'review' => 0,
                'show' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
