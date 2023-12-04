<script setup>
import XAvatar from "@/components/avatar/XAvatar.vue";

defineProps({
    conversation: {
        type    : Object,
        required: true
    }
})
</script>

<template>
    <div
        class="flex items-center p-3 rounded-2xl cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700"
        :class="{'bg-gray-200 dark:bg-gray-700' : conversation?.is_active}"
    >
        <x-avatar size="lg" :src="conversation?.logo_url"/>

        <div class="ml-2 flex flex-col w-full truncate">
            <div class="flex">
                <h2 class="font-semibold truncate w-full">{{ conversation.name }}</h2>
                <span
                    v-if="conversation?.created_at_formatted"
                    class="x-subtitle"
                >
                    {{ conversation.created_at_formatted }}
                </span>
            </div>

            <p class="x-subtitle">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                the industry's standard dummy text ever since the 1500
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>
