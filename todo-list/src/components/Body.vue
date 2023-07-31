<template>
  <div>
    <Header></Header>
    <div class="p-8 flex justify-between">
      <div class="flex flex-col font-light text-4xl font-mono pb-8 text-left">
        <h1 class="text-white font-semibold text-2xl">{{ $t("heading") }}</h1>
        <p class="text-white text-lg">
          Over 500+ professionally designed, fully responsive, expertly crafted
          component examples you can drop into your Tailwind projects and
          customize to your heart’s content.
        </p>
        <div class="flex items-center">
          <ChangeLang></ChangeLang>
          <GetAPI></GetAPI>
        </div>
      </div>
      <div>
        <CardAdd></CardAdd>
        <CardTask></CardTask>
      </div>
    </div>
    <Newsletter></Newsletter>
    <Footer></Footer>
  </div>
</template>

<script>
import CardAdd from "./CardAdd.vue";
import CardTask from "./CardTask.vue";
import ChangeLang from "./ChangeLang.vue";
import GetAPI from "./GetAPI.vue";
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import Newsletter from "./Newsletter.vue";

export default {
  name: "mainPage",
  components: {
    CardAdd,
    CardTask,
    ChangeLang,
    GetAPI,
    Header,
    Footer,
    Newsletter,
  },
};
</script>

<style></style>
