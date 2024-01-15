<script setup>
import { Head, Link } from "@inertiajs/vue3";
import TwitterLayout from "@/Layouts/TwitterLayout.vue";
import Tweet from "@/Components/Tweet.vue";
</script>

<template>
  <Head title="Welcome" />

  <TwitterLayout>
    <div class="text-white">
      <div class="flex">
        <Tweet
          :tweet="{
            name: 'Nico Radin',
            handle: '@nico_radin',
            image: 'https://randomuser.me/api/portraits/men/40.jpg',
            tweet:
              'We went rock climbing this weekend? Here is the video. Climbing is way more fun than',
            file: '/videos/video-city(360p).mp4',
            is_video: true,
            comments: '35',
            retweets: '54',
            likes: '44',
            analytics: '100',
          }"
        />
      </div>
      <div class="border-b border-b-gray-800 mt-2"></div>
    </div>
  </TwitterLayout>
</template>
