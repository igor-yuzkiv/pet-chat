<script setup>
import {ROUTES} from "@/routes/navigation.js";
import {reactive, ref} from "vue";
import * as Yup from "yup";
import axios from "axios";
import httpClient from "@/services/httpClient.js";
import {useUserStore} from "@/store/useUserStore.js";
import {useRouter} from "vue-router";

const userStore = useUserStore();
const router = useRouter();

const formValue = reactive({
    email   : "",
    password: "",
})

const errorMessage = ref("");

async function validateForm() {
    const schema = Yup.object().shape({
        email   : Yup.string().email().required('Email is required'),
        password: Yup.string().required('Password is required'),
    });

    return await schema
        .validate(formValue, {abortEarly: true})
        .then((response) => {
            errorMessage.value = "";
            return response;
        })
        .catch(({message}) => {
            errorMessage.value = message;
        })
}

async function onClickLogin() {
    if (!await validateForm()) {
        return;
    }

    const {user, token} = await axios.get("/sanctum/csrf-cookie")
        .then(() => httpClient.post("/auth/login", formValue))
        .then((response) => response?.data ?? {})
        .catch(() => ({}));

    if (!user || !token) {
        errorMessage.value = "Invalid credentials";
        return;
    }

    localStorage.setItem('token', token)
    userStore.setCurrentUser(user);

    await router.push({name: ROUTES.home.name})
}

</script>

<template>
    <section class="flex flex-col flex-grow items-center py-2 px-5">
        <h1 class="x-font-second mt-3 text-4xl font-bold text-black dark:text-white uppercase">Login</h1>
        <form @submit.prevent class="flex flex-col w-full gap-y-3 py-2">
            <input
                type="text"
                name="email"
                placeholder="Email"
                class="x-input"
                v-model="formValue.email"
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="x-input"
                v-model="formValue.password"
            />
            <div
                class="w-full items-center text-center font-bold text-red-500"
                v-if="errorMessage"
            >
                <p>
                    {{ errorMessage }}
                </p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <button
                    type="button"
                    class="x-button w-full"
                    @click="onClickLogin"
                >
                    Sign In
                </button>

                <p class="mt-2">
                    Don't have an account?
                    <router-link class="x-link" :to="{name: ROUTES.registration.name}">
                        Sign Up
                    </router-link>
                </p>
            </div>
        </form>
    </section>
</template>

<style scoped>

</style>
