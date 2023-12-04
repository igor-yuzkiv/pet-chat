<script setup>
import {Icon} from "@iconify/vue";
</script>

<template>
    <div class="absolute top-0 w-full  h-screen bg-gray-100/60 dark:bg-gray-900/60 z-50">
        <div class="flex flex-col items-center justify-center flex-grow h-screen">
            <Icon
                icon="uil:spinner"
                class="w-[3rem] h-[3rem] mr-2 text-green-500 animate-spin"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
