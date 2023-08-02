<template>
  <div>
    <Header />
    <Breadcrumb />
    <div
      class="mx-auto max-w-2xl p-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"
    >
      <h2 class="text-2xl font-bold tracking-tight text-white font-mono">
        Danh sách
      </h2>
      <div
        class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
      >
        <div class="group relative" v-for="item in products" :key="item.id">
          <div
            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-80 lg:h-80 transition duration-300 group-hover:scale-105"
          >
            <img
              :src="item.url_img"
              class="h-full w-full object-cover object-center lg:h-full lg:w-full "
            />
          </div>
          <div class="mt-4 flex justify-between text-white font-mono font-bold">
            <div>
                <a href="#" class="no-underline text-white text-base">
                  <span aria-hidden="true" class="absolute inset-0"></span>
                  {{ item.products_name }}
                </a>
              <p class="mt-1 text-xs">Black</p>
            </div>
            <p class="mt-1 text-sm">${{ item.price }}</p>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import axios from "axios";
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import Breadcrumb from "./trashcan/Breadcrumb.vue";

export default {
  name: "marketPage",
  components: {
    Header,
    Footer,
    Breadcrumb,
  },
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const res = (await axios.get("http://127.0.0.1:8000/api/product")).data;
        this.products = res;
      } catch (e) {
        console.log(e);
      }
    },
  },
};
</script>

<style></style>
