<template>
  <div>
    <Header></Header>
    <div>
      <div class="lg:max-w-full m-4">
        <h1 class="flex justify-center mb-4">
          <img
            src="../assets/banner1.jpg"
            class="aspect-[16/9] w-full max-w-3xl"
          />
        </h1>
        <p class="text-xl font-mono text-white">Deploy faster</p>
        <h1 class="mt-2 text-3xl font-mono font-bold tracking-tight text-white">
          A better workflow
        </h1>
        <p class="mt-4 text-xl leading-8 text-white font-mono">
          Aliquet nec orci mattis amet quisque ullamcorper neque, nibh sem. At
          arcu, sit dui mi, nibh dui, diam eget aliquam. Quisque id at vitae
          feugiat egestas.
        </p>
      </div>
      <div class="grid grid-cols-2 gap-4 m-4">
        <div class="text-base leading-7 text-white font-mono">
          <p>
            Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus
            enim. Mattis mauris semper sed amet vitae sed turpis id. Id dolor
            praesent donec est. Odio penatibus risus viverra tellus varius sit
            neque erat velit. Faucibus commodo massa rhoncus, volutpat.
            Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae
            sed turpis id.
          </p>
          <ul role="list" class="mt-8 space-y-8 text-white">
            <li class="flex gap-x-3">
              <svg
                class="mt-1 h-5 w-5 flex-none text-white"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z"
                  clip-rule="evenodd"
                />
              </svg>
              <span
                ><strong class="font-semibold text-white"
                  >Push to deploy.</strong
                >
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Maiores impedit perferendis suscipit eaque, iste dolor
                cupiditate blanditiis ratione.</span
              >
            </li>
            <li class="flex gap-x-3">
              <svg
                class="mt-1 h-5 w-5 flex-none text-white"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                  clip-rule="evenodd"
                />
              </svg>
              <span
                ><strong class="font-semibold text-white"
                  >SSL certificates.</strong
                >
                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui
                lorem cupidatat commodo.</span
              >
            </li>
            <li class="flex gap-x-3">
              <svg
                class="mt-1 h-5 w-5 flex-none text-white"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z"
                />
                <path
                  fill-rule="evenodd"
                  d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z"
                  clip-rule="evenodd"
                />
              </svg>
              <span
                ><strong class="font-semibold text-white"
                  >Database backups.</strong
                >
                Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus.
                Et magna sit morbi lobortis.</span
              >
            </li>
          </ul>
        </div>
        <div class="max-w-fit">
          <img src="../assets/banner2.jpg" />
        </div>
      </div>
      <div class="m-4 text-white font-mono">
        <div>
          <p class="mt-8">
            Et vitae blandit facilisi magna lacus commodo. Vitae sapien duis
            odio id et. Id blandit molestie auctor fermentum dignissim. Lacus
            diam tincidunt ac cursus in vel. Mauris varius vulputate et ultrices
            hac adipiscing egestas. Iaculis convallis ac tempor et ut. Ac lorem
            vel integer orci.
          </p>
          <h2 class="mt-16 text-2xl font-bold tracking-tight">
            No server? No problem.
          </h2>
          <p class="mt-6">
            Id orci tellus laoreet id ac. Dolor, aenean leo, ac etiam consequat
            in. Convallis arcu ipsum urna nibh. Pharetra, euismod vitae interdum
            mauris enim, consequat vulputate nibh. Maecenas pellentesque id sed
            tellus mauris, ultrices mauris. Tincidunt enim cursus ridiculus mi.
            Pellentesque nam sed nullam sed diam turpis ipsum eu a sed convallis
            diam.
          </p>
        </div>
        <div class="flex justify-center">
          <button
            class="flex-none rounded-md bg-[rgba(76,207,169,0.92)] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[rgba(76,207,169)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
            @click="onStateChange"
            v-if="!state"
          >
            Click for more!
          </button>
          <iframe
            class="w-2/4 aspect-[16/9]"
            src="https://www.youtube.com/embed/dQw4w9WgXcQ"
            title="Rick Astley - Never Gonna Give You Up (Official Music Video)"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen
            v-if="state"
          ></iframe>
        </div>
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

export default {
  name: "postPage",
  components: {
    Header,
    Footer,
  },
  data() {
    return {
      state: false,
    };
  },
  methods: {
    onStateChange() {
      this.state = !this.state;
    },
  },
};
</script>

<style></style>
