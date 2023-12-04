<script setup>
import assets from "@/config/assets.js";

defineProps({
    size: {
        type   : String,
        default: 'md',
        validator(value) {
            return ['sm', 'md', 'lg', 'xl', '2xl'].includes(value);
        }
    },
    src : {
        type   : String,
        default: null,
    },
    name: {
        type   : String,
        default: "Avatar",
    },
})

const sizeClasses = {
    sm   : "w-8 h-8",
    md   : "w-10 h-10",
    lg   : "w-12 h-12",
    xl   : "w-14 h-14",
    "2xl": "w-24 h-24",
};
</script>

<template>
    <div :title="name" class="relative inline-flex shrink-0 grow-0 items-center justify-center">
        <img
            :class="sizeClasses[size ?? 'md']"
            class="rounded-xl"
            :src="src ?? assets.defaultAvatar"
            :alt="`${name} avatar`"
        />
    </div>
</template>

<style scoped>

</style>
