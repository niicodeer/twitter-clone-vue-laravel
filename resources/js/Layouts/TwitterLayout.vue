<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import Twitter from "vue-material-design-icons/Twitter.vue";
import Magnify from "vue-material-design-icons/Magnify.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";
import Feather from "vue-material-design-icons/Feather.vue";
import Close from "vue-material-design-icons/Close.vue";
import ChevronDown from "vue-material-design-icons/ChevronDown.vue";
import Earth from "vue-material-design-icons/Earth.vue";
import ImageOutLine from "vue-material-design-icons/ImageOutLine.vue";
import FileGifBox from "vue-material-design-icons/FileGifBox.vue";
import Emoticon from "vue-material-design-icons/Emoticon.vue";
import ArrowLeft from "vue-material-design-icons/ArrowLeft.vue";
import MenuItem from "@/Components/MenuItem.vue";

let createTweet = ref(false);
let textarea = ref(null);
let tweet = ref("");
let file = ref("");
let showUpload = ref("");
let uploadType = ref("");
/* let randImg1 = ref(
  `https://picsum.photos/id/${(Math.random() * 200).toFixed(0)}/100`
); */
let randImg1 = ref(
  'https://yt3.ggpht.com/yti/AGOGRCrBA_DXtIytv3OSpGI2FVHohLKiRB-7eKK5ExamSg=s88-c-k-c0x00ffffff-no-rj'
);
let randImg2 = ref(
  `https://picsum.photos/id/${(Math.random() * 200).toFixed(0)}/100`
);

const textareaInput = (e) => {
  textarea.value.style.height = "auto";
  textarea.value.style.height = `${e.target.scrollHeight}px`;
};

const getFile = (e) => {
  file.value = e.target.files[0];
  showUpload.value = URL.createObjectURL(e.target.files[0]);
  uploadType.value = file.value.name.split(".").pop();
};

const addTweet = () => {
  if (!tweet.value) return;

  let data = new FormData();

  data.append("tweet", tweet.value);
  data.append("file", file.value);

  router.post("/tweets", data);

  createTweet.value = false;
  tweet.value = "";
  showUpload.value = "";
  uploadType.value = "";

  closeMessageBox();
};

const closeMessageBox = () => {
  createTweet.value = false;
  tweet.value = "";
  showUpload.value = "";
  uploadType.value = "";
};
</script>

<template>
  <div class="fixed w-full">
    <div class="max-w-[1440px] flex mx-auto">
      <div
        class="lg:w-3/12 w-[60px] h-[100vh] max-w-[350px] lg:px-4 lg:mx-auto"
      >
        <div class="p-2 px-3 mb-4">
          <Twitter fillColor="#fff" :size="37" />
        </div>
        <MenuItem iconString="Home" />
        <MenuItem iconString="Explore" />
        <MenuItem iconString="Notifications" />
        <MenuItem iconString="Messages" />
        <MenuItem iconString="Profile" />

        <button
          @click="createTweet = true"
          class="lg:w-full mt-8 ml-2 text-white font-extrabold text-[22px] bg-[#1C9CEF] p-3 px-3 rounded-full cursor-pointer"
        >
          <span class="lg:block hidden">Tweet</span>
          <span class="block lg:hidden"><Feather /></span>
        </button>
      </div>
      <div class="lg:w-7/12 w-11/12 border-x border-gray-800 relative">
        <div
          class="bg-black bg-opacity-50 backdrop-blur-md z-10 absolute w-full"
        >
          <div class="border-gray-800 border-b w-full">
            <div class="w-full text-white text-[22px] font-extrabold p-4">
              Home
            </div>
            <div class="flex">
              <div
                class="flex items-center justify-center w-full h-[60px] text-white text-lg font-extrabold p-4 hover:bg-gray-500 hover:bg-opacity-30 cursor-pointer transition duration-200 ease-in-out"
              >
                <div
                  class="inline-block text-center border-b-4 border-b-[#1C9CEF] h-[60px]"
                >
                  <div class="my-auto mt-4">For you</div>
                </div>
              </div>
              <div
                class="w-full h-[60px] text-gray-500 text-lg font-extrabold p-4 hover:bg-gray-500 hover:bg-opacity-30 cursor-pointer transition duration-200 ease-in-out"
              >
                <div class="text-center">Following</div>
              </div>
            </div>
          </div>
        </div>
        <div class="absolute top-0 z-0 h-full overflow-auto scrollbar-hide">
          <div class="mt-[126px]"></div>
          <slot />
          <div class="pb-4"></div>
        </div>
      </div>
      <div
        class="lg:block hidden lg:w-4/12 h-screen border-l border-gray-800 pl-4"
      >
        <div
          class="w-full p-1 mt-2 px-4 lg:flex items-center rounded-full hidden bg-[#212327]"
        >
          <Magnify fillColor="#5e5c5c" :size="25" />
          <input
            type="text"
            placeholder="Search Twitter"
            class="appearance-none w-full border-0 py-2 bg-[#212327] text-gray-100 placeholder-gray-500 leading-tight focus:ring-0"
          />
        </div>
        <div class="w-full mt-4 rounded-lg lg:block hidden bg-[#212327]">
          <div class="w-full p-4 text-white font-extrabold mb-6 text-[20px]">
            What's happening
          </div>
          <div
            class="h-20 hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out"
          >
            <div class="flex p-3 justify-between h-20 py-3">
              <div>
                <div class="text-sm text-gray-400">Tennis Tournament LIVE</div>
                <div class="w-full text-white font-extrabold mb-6 text-lg">
                  Australian Open 2024
                </div>
              </div>
              <img class="rounded-xl" :src="randImg2" alt="" />
            </div>
          </div>
          <div
            class="hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out"
          >
            <div class="flex p-3 justify-between">
              <div>
                <div class="text-sm text-gray-400">Tendencia en Argentina</div>
                <div class="w-full text-white font-extrabold text-lg">
                  Messi
                </div>
                <div class="text-sm text-gray-400">7.621 Tweets</div>
              </div>
              <DotsHorizontal fillColor="#5e5c5c" />
            </div>
          </div>
          <div
            class="hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out"
          >
            <div class="flex p-3 justify-between">
              <div>
                <div class="text-sm text-gray-400">Política · Tendencia</div>
                <div class="w-full text-white font-extrabold text-lg">
                  Milei
                </div>
                <div class="text-sm text-gray-400">17.621 Tweets</div>
              </div>
              <DotsHorizontal fillColor="#5e5c5c" />
            </div>
          </div>
          <div
            class="hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out"
          >
            <div class="flex p-3 justify-between">
              <div>
                <div class="text-sm text-gray-400">Fútbol · Tendencia</div>
                <div class="w-full text-white font-extrabold text-lg">
                  Boca Juniors
                </div>
                <div class="text-sm text-gray-400">23.621 Tweets</div>
              </div>
              <DotsHorizontal fillColor="#5e5c5c" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div
    id="OverlaySection"
    v-if="createTweet"
    class="fixed top-0 left-0 w-full h-screen bg-black md:bg-gray-400 md:bg-opacity-30 md:p-3"
  >
    <div class="md:max-w-2xl md:mx-auto md:mt-10 md:rounded-xl bg-black">
      <div
        class="flex items-center justify-between md:inline-block p-2 m-2 rounded-full cursor-pointer"
      >
        <div
          @click="closeMessageBox"
          class="hover:bg-gray-800 inline-block p-2 rounded-full cursor-pointer"
        >
          <Close fillColor="#fff" :size="28" class="md:block hidden" />
          <ArrowLeft fillColor="#fff" :size="28" class="md:hidden block" />
        </div>
        <button
          @click="addTweet()"
          :disabled="!tweet"
          :class="
            tweet ? 'bg-[#1c9cef] text-white' : 'bg-[#124d77] text-gray-400'
          "
          class="md:hidden font-extrabold text-base p-1.5 px-4 rounded-full cursor-pointer"
        >
          Tweet
        </button>
      </div>
      <div class="w-full flex">
        <div class="ml-3.5 mr-2">
          <img :src="randImg1" alt="" width="55" class="rounded-full" />
        </div>
        <div class="w-[calc(100%-100px)]">
          <div class="inline-block">
            <div class="flex items-center border border-gray-700 rounded-full">
              <span class="text-[#1c9cef] p-0.5 pl-3.5 font-extrabold"
                >Everyone</span
              >
              <ChevronDown class="pr-2" fillColor="#1c9cef" :size="25" />
            </div>
          </div>
          <div>
            <textarea
              :onInput="textareaInput"
              cols="30"
              rows="4"
              placeholder="What's happening?"
              v-model="tweet"
              ref="textarea"
              class="w-full bg-black border-0 mt-2 focus:ring-0 text-white text-xl font-extrabold min-h-[120px] resize-none"
            ></textarea>
          </div>
          <div class="w-full">
            <video
              controls
              v-if="uploadType === 'mp4'"
              :src="showUpload"
              class="rounded-xl overflow-auto"
            />
            <img v-else :src="showupload" class="rounded-xl min-w-full" />
          </div>
          <div class="flex py-2 items-center text-[#1c9cef] font-extrabold">
            <Earth class="pr-2" fillColor="#1c9cef" :size="20" />Everyone can
            reply
          </div>
          <div class="border-b border-b-gray-700"></div>
          <div class="flex items-center justify-between py-2">
            <div class="flex items-center">
              <div
                class="hover:bg-gray-800 inline-block p-2 rounded-full cursor-pointer"
              >
                <label for="fileUpload" class="cursor-pointer">
                  <ImageOutLine fillColor="#1c9cef" :size="25" />
                </label>
                <input
                  type="file"
                  name="fileUpload"
                  id="fileUpload"
                  @change="getFile"
                  class="hidden"
                />
              </div>
              <div
                class="hover:bg-gray-800 inline-block p-2 rounded-full cursor-pointer"
              >
                <FileGifBox fillColor="#1c9cef" :size="25" />
              </div>
              <div
                class="hover:bg-gray-800 inline-block p-2 rounded-full cursor-pointer"
              >
                <Emoticon fillColor="#1c9cef" :size="25" />
              </div>
            </div>
            <button
              @click="addTweet()"
              :disabled="!tweet"
              :class="
                tweet ? 'bg-[#1c9cef] text-white' : 'bg-[#124d77] text-gray-400'
              "
              class="hidden md:block font-extrabold text-base p-1.5 px-4 rounded-full cursor-pointer"
            >
              Tweet
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
body {
  background-color: black;
}
</style>
