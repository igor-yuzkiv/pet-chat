<script setup>
import NavItem from "@/components/nav-bar/NavItem.vue";
</script>

<template>
    <nav class="top-0 w-20 fixed h-screen overflow-hidden bg-white dark:bg-woodsmoke-950">
        <div class="flex flex-col items-center justify-start h-full py-2 text-woodsmoke-600 dark:text-woodsmoke-200">
            <h1 class="logo">CH</h1>

            <div class="flex flex-col items-center h-full">
                <div class="space-y-4 mt-5">
                    <nav-item text="All Chats" icon="majesticons:chats-2"/>
                    <nav-item text="Folders" icon="material-symbols:folder"/>
                    <nav-item text="Meets" icon="material-symbols:folder"/>
                    <div class="w-full border-t border-shark-100 dark:border-shark-900"/>
                    <nav-item text="Calendar" icon="fluent:calendar-32-filled"/>
                </div>
            </div>

            <nav-item tag="div" text="Calendar" icon="mdi:cog"/>
        </div>
    </nav>
</template>

<style scoped>
.logo {
    font-family: 'Nova Square', sans-serif;
}

.logo {
    @apply mt-3 text-4xl font-bold text-black dark:text-white;
}
</style>
