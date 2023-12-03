<script setup>
import {Icon} from "@iconify/vue";

defineEmits(['update:modelValue'])
defineProps({
    modelValue: {
        type    : Boolean,
        required: true
    }
})
</script>

<template>
    <div
        class="relative transition-all duration-400 flex items-center justify-between rounded-full w-full bg-gray-200 dark:bg-gray-600 p-1 shadow-inner"
        :class="{'flex-row-reverse': modelValue}"
    >
        <div
            class="inline-flex shrink-0 grow-0 w-6 h-6 rounded-full bg-gray-600 dark:bg-gray-200 cursor-pointer"
            @click="$emit('update:modelValue', !modelValue)"
        />
        <Icon
            class="w-6 h-6"
            :icon="modelValue ? 'line-md:moon-alt-loop' : 'humbleicons:sun'"
        />
    </div>
</template>

<style scoped>

</style>
