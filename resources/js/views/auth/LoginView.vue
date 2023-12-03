<script setup>
import {ROUTES} from "@/routes/navigation.js";
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
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="x-input"
            />

            <div class="flex flex-col items-center justify-center mt-4">
                <button
                    type="button"
                    class="x-button w-full"
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
