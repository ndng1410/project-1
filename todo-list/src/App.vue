<template>
  <div id="app" class="min-h-screen relative">
    <!-- <Header></Header> -->
    <router-view />
    <!-- <Newsletter></Newsletter>
    <Footer></Footer> -->
  </div>
</template>

<script>
// import Header from "./components/Header.vue"
// import Footer from "./components/Footer.vue"
// import Newsletter from "./components/Newsletter.vue";

import { EventBus } from "./main"

export default {
  name: "App",
  components: {
    // Header,
    // Footer,
    // Newsletter,
  },
  mounted() {
    EventBus.$on("addNewTaskItem", (object) => this.onReceive(object));
  },
  methods: {
    onReceive(object) {
      if (object.taskName.trim(" ") == "") {
        console.log("error");
        alert(this.$t("warning"));
      } else {
        // console.log(object.taskName);
        this.$store.dispatch("setTask", {
          taskName: object.taskName,
          id: object.id,
        });
      }
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /* text-align: center; */
  color: #2c3e50;
  /* margin-top: 60px; */
}
</style>
