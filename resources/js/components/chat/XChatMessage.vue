<script setup>
import XTextMessage from "@/components/chat/message-types/XTextMessage.vue";
import {MESSAGE_TYPE} from "@/config/enums.js";


defineProps({
    message      : {
        type    : Object,
        required: true,
    },
    isCurrentUser: {
        type   : Boolean,
        default: false,
    },
})

const messageTypes = {
    [MESSAGE_TYPE.text.value]: XTextMessage,
};

</script>

<template>
    <div
        class="flex flex-col w-full p-2 rounded-xl mt-1"
        :class="{'bg-blue-500 text-white dark:text-white': isCurrentUser, 'bg-shark-300 dark:bg-shark-800': !isCurrentUser}"
    >
        <component
            :is="messageTypes[message.type]"
            :message="message"
        />
        <div
            class="flex items-center text-xs mt-1"
            :class="{'justify-start text-gray-200 dark:text-gray-50': isCurrentUser,'justify-end  text-gray-600 dark:text-gray-50': !isCurrentUser}"
        >
            <span>{{ message.time }}</span>
        </div>
    </div>
</template>

<style scoped>

</style>
