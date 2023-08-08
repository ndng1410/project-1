<template>
  <div>
    <Header />
    <Breadcrumb />
    <div class="mx-auto max-w-2xl p-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="text-2xl font-bold tracking-tight text-white font-mono">
        Danh sách
      </h2>
      <!-- <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px text-sm p-0 m-0">
          <li>
            <a
              @click="previousClick"
              href="#"
              class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >Previous</a
            >
          </li>
          <li v-for="page in page_numb" :key="'p' + page">
            <a
              @click="fetchData(page)"
              href="#"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >{{ page }}</a
            >
          </li>
          <li>
            <a
              @click="nextClick"
              href="#"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >Next</a
            >
          </li>
        </ul>
      </nav> -->
      <div>
        <ul>
          <li v-for="(date, index) in Object.keys(taskAll)" :key="'date' + index">
            <div class="text-base text-white">{{ date }}</div>
            <a v-for="(item, index) in taskAll[date]" :key="'item' + index" class="text-base flex">{{ item.task_name }}</a>
          </li>
        </ul>
      </div>
      <div class="block">
      <span class="demonstration text-base font-bold tracking-tight text-white font-mono">Sort by: </span>
      <el-date-picker
        v-model="date_value"
        type="date"
        placeholder="Pick a Date"
        format="yyyy-MM-dd"
        value-format="yyyy-MM-dd"
        @change="fetchDataByDate"
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
        const res = (await axios.get(`http://127.0.0.1:8000/api/taskAll`)).data
        console.log(res)
        this.taskAll = res;
        console.log('task: ' + this.taskAll)
      } catch (e) {
        console.log(e)
      }
    },
    async fetchDataByDate() {
      try {
        const res = (await axios.get(`http://127.0.0.1:8000/api/task-date?created_at=${this.date_value}`)).data;
        console.log(res)
        this.tasks = res;
      } catch (e) { 
        console.log(e);
      }
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
