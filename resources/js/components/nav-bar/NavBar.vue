<script setup>
import NavItem        from "@/components/nav-bar/NavItem.vue";
import ThemeToggle    from "@/components/theme-toggle/ThemeToggle.vue";
import {useRootStore} from "@/store/useRootStore.js";

const rootStore = useRootStore();

function toggleDarkMode() {
    rootStore.setDarkMode(!rootStore.darkMode);
}

</script>

<template>
    <nav class="top-0 w-20 fixed h-screen overflow-hidden bg-white dark:bg-woodsmoke-950">
        <div class="flex flex-col items-center justify-start h-full py-2 text-woodsmoke-600 dark:text-woodsmoke-200">
            <h1 class="x-font-second mt-3 text-4xl font-bold text-black dark:text-white">CH</h1>
            <div class="flex flex-col items-center h-full">
                <div class="space-y-4 mt-5">
                    <nav-item text="All Chats" icon="majesticons:chats-2"/>
                    <nav-item text="Folders" icon="material-symbols:folder"/>
                    <nav-item text="Meets" icon="material-symbols:folder"/>
                    <div class="w-full border-t border-shark-100 dark:border-shark-900"/>
                    <nav-item text="Calendar" icon="fluent:calendar-32-filled"/>
                </div>
            </div>

            <div class="w-full px-2 mb-2">
                <theme-toggle
                    :model-value="rootStore.darkMode"
                    @update:model-value="toggleDarkMode"
                />
            </div>
        </div>
    </nav>
</template>

<style scoped>

</style>
