<script setup>

import NavBar from "@/components/nav-bar/NavBar.vue";
</script>

<template>
    <div
        class="flex flex-col relative h-screen w-full overflow-hidden bg-white text-black dark:bg-woodsmoke-950 dark:text-white"
    >
        <nav-bar/>
        <main
            class="flex ml-20 flex-col flex-grow overflow-hidden rounded-l-3xl p-1 bg-gray-100 dark:bg-gray-800 shadow-sm"
        >
            <router-view></router-view>
        </main>
    </div>
</template>

<style scoped>

</style>
