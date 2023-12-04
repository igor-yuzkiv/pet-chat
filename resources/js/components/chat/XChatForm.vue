<script setup>

import {Icon} from "@iconify/vue";
import {ref} from "vue";

defineEmits(['message:send']);

const messageText = ref('');

function onInputMessage(e) {
    const element = e.target;
    if (element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }
    messageText.value = e.target.value;
}

function onKeyupEnter(e) {
    if (e?.shiftKey) {
        return;
    }
    e.preventDefault();
    console.log('send message', messageText.value);
}
</script>

<template>
    <div class="flex items-end justify-end px-1 gap-x-2">
        <button type="button" class="x-chat-button">
            <Icon icon="lucide:paperclip" class="x-chat-button-icon"/>
        </button>
        <textarea
            type="text"
            class="x-chat-input w-full"
            @input="onInputMessage"
            @keydown.enter="onKeyupEnter"
        />
        <button type="button" class="x-chat-button">
            <Icon icon="ion:mic" class="x-chat-button-icon"/>
        </button>
    </div>
</template>

<style scoped>
.x-chat-input {
    @apply bg-transparent border-none outline-none focus:ring-0 placeholder-gray-500 dark:placeholder-gray-400;
}

.x-chat-input {
    resize: none;
    overflow: auto;
    min-height: 30px;
    height: 20px;
    max-height: 100px;
}

.x-chat-button {
    @apply bg-transparent border-none outline-none focus:ring-0 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 p-1
}

.x-chat-button-icon {
    @apply w-6 h-6 text-gray-500 dark:text-gray-400;
}
</style>
