<script setup>

import {Icon} from "@iconify/vue";
</script>

<template>
    <div class="absolute top-0 w-full  h-screen bg-gray-100/60 z-50">
        <div class="flex flex-col items-center justify-center flex-grow h-screen">
            <Icon
                icon="uil:spinner"
                class="w-32 h-32 mr-2 text-blue-600 animate-spin"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
