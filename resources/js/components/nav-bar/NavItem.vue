<script setup>
    import {Icon} from "@iconify/vue";

    defineProps({
        icon: {
            type: String,
            required: true
        },
        text: {
            type: String,
            required: true
        },
        tag: {
            type: String,
            default: "li"
        }
    })
</script>

<template>
   <component :is="tag">
       <div
           class="flex flex-col w-full h-full gap-y-1 items-center text-alabaster-600 dark:text-alabaster-300 hover:text-woodsmoke-950 dark:hover:text-white cursor-pointer">
           <Icon
               :icon="icon"
               class="w-6 h-6"
           />
           <span class="text-sm">{{text}}</span>
       </div>
   </component>
</template>

<style scoped>

</style>
