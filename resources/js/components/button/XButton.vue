<script setup>
import {Icon} from "@iconify/vue";

defineProps({
    icon: {
        type    : String,
        required: true,
    },
})
</script>

<template>
    <button
        type="button"
        class="inline-flex shrink-0 grow-0 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 p-1.5 focus:ring-0 focus:outline-none border-none"
    >
        <slot>
            <Icon
                class="w-7 h-7"
                :icon="icon"
            />
        </slot>
    </button>
</template>

<style scoped>

</style>
