<template>
  <button @click="fetchData">get API info</button>
</template>

<script>
// import axios from "axios";
// import { EventBus } from "../main";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "laravel",
  data() {
    return {
      items: [],
    };
  },
  methods: {
    // async fetchData() {
    //   try {
    //     let apiPath = "http://127.0.0.1:8000/task";
    //     let res = (await axios.get(apiPath)).data.data;
    //     console.log(res[0])
    //     for (let i = 0; i < res.length; i++) {
    //         EventBus.$emit("addNewTaskItem", {
    //           taskName: res[i].task_name,
    //           id: res[i].id,
    //         });
    //       }
    //   } catch (e) {
    //     console.log(e);
    //   }
    // },
  },
};
</script>

<style></style>
