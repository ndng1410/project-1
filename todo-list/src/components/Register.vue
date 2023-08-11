<template>
    <div class="flex justify-center items-center min-h-screen">
        <div
            class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700"
        >
            <form class="space-y-6" @submit.prevent="proceedLogin">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                    Proceed to register
                </h5>
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Your email</label
                    >
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name@company.com"
                        required
                        v-model="inputEmail"
                    />
                </div>
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Your username</label
                    >
                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name"
                        required
                        v-model="inputUsername"
                    />
                </div>
                <div>
                    <label
                        for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Your password</label
                    >
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required
                        v-model="inputPassword"
                    />
                </div>
                <div>
                    <label
                        for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Re-enter password</label
                    >
                    <input
                        type="password"
                        name="repassword"
                        id="repassword"
                        placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required
                        v-model="inputRePassword"
                    />
                </div>
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input
                                id="remember"
                                type="checkbox"
                                value=""
                                required
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                            />
                        </div>
                        <label
                            for="remember"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >Đồng ý với điều khoản sử dụng</label
                        >
                    </div>

                    <a
                        href="#"
                        class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500"
                        ><router-link to="/404-not-found">
                            Điều khoản sử dụng</router-link
                        >
                    </a>
                </div>
                <button
                    type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Create
                </button>
                <div
                    class="text-sm font-medium text-gray-500 dark:text-gray-300"
                >
                    Có tài khoản ?
                    <router-link to="/login">
                        <a
                            href="#"
                            class="text-blue-700 hover:underline dark:text-blue-500"
                            >Trở về đăng nhập</a
                        >
                    </router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "registerPage",
    data() {
        return {
            inputEmail: "",
            inputUsername: "",
            inputPassword: "",
            inputRePassword: "",
        };
    },
    methods: {
        async proceedLogin() {
            if (this.inputRePassword != this.inputPassword) {
                alert("Password không trùng nhau");
            } else {
                try {
                    await axios.post("http://127.0.0.1:8000/api/register", {
                        email: this.inputEmail,
                        name: this.inputUsername,
                        password: this.inputPassword,
                    });
                    alert("đăng ký thành công");
                    this.$router.push("/login");
                } catch (e) {
                    console.log(e);
                }
            }
        },
    },
};
</script>

<style></style>
