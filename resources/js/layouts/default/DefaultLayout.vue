<script setup>

import NavBar from "@/components/nav-bar/NavBar.vue";
</script>

<template>
    <div class="x-layout-container">
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
