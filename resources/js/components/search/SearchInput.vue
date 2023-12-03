<script setup>
import {Icon} from "@iconify/vue";
</script>

<template>
    <div class="relative flex items-center justify-center">
        <input
            class="x-input w-full !py-2.5 !pl-10"
            placeholder="Search..."
        />
        <Icon
            icon="material-symbols:search"
            class="absolute left-2 w-6 h-6"
        />
    </div>
</template>

<style scoped>

</style>
