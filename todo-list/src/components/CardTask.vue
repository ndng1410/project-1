<template>
    <div>
        <div v-for="task in tasks" :key="task.id" class="flex justify-center">
            <div
                class="box-border h-[6rem] w-[500px] bg-gradient-to-l from-[rgba(255,255,255,0.4)] to-[rgba(255,255,255,0.4)] shadow-[0_4px_40px_rgba(0, 0, 0, 0.25)] rounded-[2rem] mb-4 flex items-center px-[30px] font-mono"
            >
                <div class="w-[400px] h-[50px] flex">
                    <input
                        class="bg-[#ABABAB] w-full rounded-xl border-none px-4 text-ellipsis text-base placeholder:text-[rgba(0,0,0,0.98)]"
                        disabled
                        :placeholder="task.task_name"
                        type="text"
                    />
                </div>
                <button
                    type="submit"
                    data-bs-toggle="modal"
                    data-bs-target="#modal"
                    class="transition-transform duration-200 ease-linear hover:scale-110 p-[10px] rounded-full bg-[rgba(244,121,31,0.92)] border-none ml-4"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="1.5em"
                        width="1.5em"
                        viewBox="0 0 512 512"
                        fill="#fff"
                    >
                        <path
                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                        />
                    </svg>
                </button>

                <div
                    class="modal fade"
                    id="modal"
                    tabindex="-1"
                    aria-labelledby="modalLabel"
                    aria-hidden="true"
                    ref="modal"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <input
                                    type="text"
                                    :placeholder="task.task_name"
                                    v-model="input"
                                    class="w-full rounded-xl px-4 text-ellipsis text-base border-solid border-2 focus:border-solid focus:border-2"
                                />
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-dismiss="modal"
                                    @click="onEdit(task.id, input)"
                                >
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <button
                    @click="onDelete(task.id)"
                    class="transition-transform duration-200 ease-linear hover:scale-110 p-[10px] rounded-full bg-[rgba(244,121,31,0.92)] border-none ml-2"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="1.5em"
                        width="1.5em"
                        viewBox="0 0 448 512"
                        fill="#fff"
                    >
                        <path
                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
// import store from "../assets/store/store.js";
import { mapState } from "vuex";
import axios from "axios";

export default {
    props: {
        taskName: String,
        taskId: Number,
    },
    data() {
        return {
            input: "",
        };
    },
    // created() {
    //   this.$store.dispatch('fetchData');
    // },
    mounted() {
        this.$store.dispatch("fetchData");
    },
    computed: {
        ...mapState({
            tasks: (state) => state.tasks,
        }),
    },
    methods: {
        async onDelete(index) {
            try {
                this.$store.dispatch("removeTask", index);
                console.log(index);
                let apiPath = `http://127.0.0.1:8000/api/task/delete/${index}`;
                await axios.delete(apiPath);
            } catch (e) {
                console.log(e);
            }
            this.$store.dispatch("fetchData");
        },
        async onEdit(index, content) {
            try {
                await axios.put(`http://127.0.0.1:8000/api/tasks/${index}`, {
                    task_name: content,
                });
                console.log(index, content);
                this.input = "";
            } catch (e) {
                console.log(e);
            }
            this.$store.dispatch("fetchData");
        },
    },
};
</script>

<style></style>
