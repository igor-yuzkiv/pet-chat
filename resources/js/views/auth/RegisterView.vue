<script setup>
import {ROUTES} from "@/routes/navigation.js";
import {inject, reactive} from "vue";
import {TOAST_SYMBOL} from "@/plugins/toasity.js";
import * as Yup from "yup";
import httpClient from "@/services/httpClient.js";
import {useRouter} from "vue-router";

const toast = inject(TOAST_SYMBOL);
const router = useRouter();

const formValue = reactive({
    name                 : "",
    email                : "",
    password             : "",
    password_confirmation: "",
});

async function validateForm() {
    const schema = Yup.object().shape({
        name                 : Yup.string().required('Name is required'),
        email                : Yup.string().required().email('Email is required'),
        password             : Yup.string().required('Password is required'),
        password_confirmation: Yup.string().required().oneOf([Yup.ref('password'), null], 'Password must match'),
    });

    return await schema
        .validate(formValue, {abortEarly: true})
        .then((response) => {
            return response;
        })
        .catch(({message}) => {
            toast.error(message);
        })
}

async function onClickRegister() {
    const validated = await validateForm();
    if (!validated) {
        return;
    }

    await httpClient
        .post('/auth/register', formValue)
        .then(() => {
            toast.success("Registration successful");
            router.push({name: ROUTES.login.name})
        })
        .catch(({response}) => {
            const {status, data} = response;
            let message = "Something went wrong, please try again later";
            if (status === 422 && data?.message) {
                message = data.message;
            }
            toast.error(message);
        })
}

</script>

<template>
    <section class="flex flex-col flex-grow items-center py-2 px-5">
        <h1 class="x-font-second mt-3 text-4xl font-bold text-black dark:text-white uppercase">
            Register
        </h1>
        <form @submit.prevent class="flex flex-col w-full gap-y-3 py-2">
            <input
                type="text"
                name="name"
                placeholder="Name"
                class="x-input"
                v-model="formValue.name"
            >

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

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                class="x-input"
                v-model="formValue.password_confirmation"
            />

            <div class="flex flex-col items-center justify-center mt-4">
                <button
                    type="button"
                    class="x-button w-full"
                    @click="onClickRegister"
                >
                    Sign In
                </button>

                <p class="mt-2">
                    Already have an account?
                    <router-link class="x-link" :to="{name: ROUTES.login.name}">
                        Sign In
                    </router-link>
                </p>
            </div>
        </form>
    </section>
</template>

<style scoped>

</style>
