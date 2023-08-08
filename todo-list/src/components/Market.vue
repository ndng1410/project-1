<template>
  <div>
    <Header />
    <Breadcrumb />
    <div class="mx-auto max-w-2xl p-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="text-2xl font-bold tracking-tight text-white font-mono">
        Danh sách
      </h2>
      <div class="columns-2 md:columns-3 lg:columns-4">
        <div
          class="inline-flex mb-4 w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700"
          v-for="(date, index) in Object.keys(taskAll)"
          :key="'date' + index"
        >
          <div class="relative inset-0">
            <h5
              class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400 font-mono"
            >
              Standard plan
            </h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
              <span class="text-3xl font-bold font-mono tracking-tight">{{
                date
              }}</span>
            </div>
            <ul role="list" class="space-y-5 my-7 p-0">
              <li
                class="flex space-x-3"
                v-for="(item, index) in taskAll[date]"
                :key="'item' + index"
              >
                <svg
                  class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                  />
                </svg>
                <span
                  class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 font-mono"
                  >{{ item.task_name }}</span
                >
              </li>
            </ul>
            <button
              @click="redirectDataByDate(date)"
              type="button"
              class="font-mono font-bold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center"
            >
              Choose plan
            </button>
          </div>
        </div>
      </div>
      <nav>
        <ul class="inline-flex -space-x-px text-sm p-0 m-0">
          <li>
            <a
              @click="previousClick"
              href="#"
              class="no-underline font-bold font-mono flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >Previous</a
            >
          </li>
          <li v-for="page in page_numb" :key="'p' + page">
            <a
              @click="fetchData(page)"
              href="#"
              class="no-underline font-bold font-mono flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >{{ page }}</a
            >
          </li>
          <li>
            <a
              @click="nextClick"
              href="#"
              class="no-underline font-bold font-mono flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >Next</a
            >
          </li>
        </ul>
      </nav>
      <div class="block mt-4">
        <span
          class="demonstration text-base font-bold tracking-tight text-white font-mono"
          >Sort by:
        </span>
        <el-date-picker
          v-model="date_value"
          type="date"
          placeholder="Pick a Date"
          format="yyyy-MM-dd"
          value-format="yyyy-MM-dd"
          @change="fetchDataByDate"
          class="font-mono"
        />
      </div>
      <div
        class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
      >
        <div class="group relative" v-for="item in tasks" :key="item.id">
          <div
            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-80 lg:h-80 transition duration-300 group-hover:scale-105"
          >
            <img
              src="https://www.pockettactics.com/wp-content/sites/pockettactics/2023/02/honkai-star-wallpaper-astral-express.jpg"
              class="h-full w-full object-cover object-center lg:h-full lg:w-full"
            />
          </div>
          <div class="mt-4 text-white font-mono font-bold">
            <div>
              <a href="#" class="no-underline text-white text-base">
                <span aria-hidden="true" class="absolute inset-0"></span>
                {{ item.task_name }}
              </a>
            </div>
            <p class="mt-1 text-sm">{{ item.created_at }}</p>
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
      taskAll: [],
      page_numb: 0,
      page_index: 1,
      date_value: null,
      tasks: [],
    };
  },
  created() {
    this.fetchPageNumber();
  },
  mounted() {
    this.fetchData();
    this.fetchDataByDate();
  },
  methods: {
    // async fetchData(index) {
    //   try {
    //     const res = (
    //       await axios.get(`http://127.0.0.1:8000/api/product?page=${index}`)
    //     ).data;
    //     this.products = res.data;
    //     console.log(this.products);
    //     this.page_index = index;
    //   } catch (e) {
    //     console.log(e);
    //   }
    // },
    async fetchData() {
      try {
        const res = (await axios.get(`http://127.0.0.1:8000/api/taskAll`)).data;
        console.log(res);
        this.taskAll = res;
        console.log("task: " + this.taskAll);
      } catch (e) {
        console.log(e);
      }
    },
    async fetchDataByDate() {
      try {
        const res = (
          await axios.get(
            `http://127.0.0.1:8000/api/task-date?created_at=${this.date_value}`
          )
        ).data;
        console.log(res);
        this.tasks = res;
      } catch (e) {
        console.log(e);
      }
    },
    redirectDataByDate(date) {
      this.date_value = date;
      this.fetchDataByDate()
    },
    async fetchPageNumber() {
      try {
        const res = (await axios.get("http://127.0.0.1:8000/api/product")).data;
        console.log(res.last_page);
        this.page_numb = res.last_page;
        this.page_index = 1;
      } catch (e) {
        console.log(e);
      }
    },
    previousClick() {
      if (this.page_index > 1) {
        this.fetchData(this.page_index - 1);
      }
    },
    nextClick() {
      console.log(this.page_index, this.page_numb);
      if (this.page_index < this.page_numb) {
        this.fetchData(this.page_index + 1);
      }
    },
  },
};
</script>

<style></style>
