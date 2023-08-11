<template>
    <div class="flex justify-center">
        <form @submit.prevent="addNewTask">
            <div
                class="box-border h-[6rem] w-[500px] bg-gradient-to-l from-[rgba(255,255,255,0.4)] to-[rgba(255,255,255,0.4)] shadow-[0_4px_40px_rgba(0, 0, 0, 0.25)] rounded-[2rem] mb-4 flex items-center px-[30px] font-mono"
            >
                <div class="w-[400px] h-[50px] flex mr-[20px]">
                    <span
                        class="text-2xl text-white font-normal flex items-center mr-[20px] whitespace-nowrap"
                        >{{ $t("task") }}</span
                    >
                    <input
                        type="text"
                        v-model="input"
                        :placeholder="$t('task-suggest')"
                        id="new-task"
                        class="w-full rounded-xl border-none px-3.5 py-2 text-ellipsis text-base"
                    />
                </div>
                <!-- <div class="card-box-btn"> -->
                <button
                    class="transition-transform duration-200 ease-linear hover:scale-110 p-[10px] rounded-full bg-[rgba(76,207,169,0.92)] border-none"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="1.5em"
                        width="1.5em"
                        viewBox="0 0 448 512"
                        fill="#fff"
                    >
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"
                        />
                    </svg>
                </button>
                <!-- </div> -->
            </div>
        </form>
    </div>
</template>

<script>
// import CardTask from "./CardTask.vue";
import { mapState } from "vuex";
import { mapGetters } from "vuex";
// import { mapActions } from "vuex";
// import store from "../assets/store/store.js";
// import { EventBus } from "../main";
import axios from "axios";

export default {
    name: "task-itemlist",
    components: {
        // 'card-task': CardTask,
    },
    computed: {
        ...mapState(["tasks", "currentID"]),
        ...mapGetters(["getTaskItem", "getCurrentId"]),
    },
    data() {
        return {
            input: "",
            nextTodoId: null,
        };
    },
    methods: {
        async addNewTask() {
            if (this.input.trim(" ") == "") {
                console.log("error");
            } else {
                //   console.log(this.nextTodoId);
                //   this.$store.dispatch("setTask", {
                //     taskName: this.input,
                //     id: this.nextTodoId,
                //   });
                //   this.nextTodoId++;
                //   this.input = "";
                // }
                // this.nextTodoId = this.$store.getters.getCurrentId + 1;
                // console.log(this.$store.getters.getCurrentId);
                // EventBus.$emit("addNewTaskItem", {
                //   taskName: this.input,
                //   id: this.nextTodoId,
                // });
                // this.$store.state.currentID++;
                try {
                    let apiPath = "http://127.0.0.1:8000/api/tasks";
                    await axios.post(apiPath, {
                        task_name: this.input,
                    });
                    this.input = "";
                    console.log("tasks: ", this.$store.state.tasks);
                } catch (e) {
                    console.log(e);
                }
            }
            this.$store.dispatch("fetchData");
        },

        // ...mapActions({
        //   setTask: "setTask",
        // }),
        // removeTask(target) {
        //   this.$store.state.tasks.splice(target, 1);
        //   console.log(target);
        // },
        // async fetchData() {
        //   try {
        //     let apiPath = "http://127.0.0.1:8000/task";
        //     let res = (await axios.get(apiPath)).data.data;
        //     console.log(res[0]);
        //     for (let i = 0; i < res.length; i++) {
        //       this.$store.dispatch("setTask", {
        //         taskName: res[i].task_name,
        //         id: res[i].id,
        //       });
        //     }
        //   } catch (e) {
        //     console.log(e);
        //   }
        // },
    },
};
</script>

<style></style>
