<script setup>
import {useConversations} from "@/composables/useConversations.js";
import {onMounted}        from "vue";
import ConversationsList  from "@/components/converstions-list/ConversationsList.vue";
import SearchInput        from "@/components/search/SearchInput.vue";
import XChat              from "@/components/chat/XChat.vue";

const {conversations, loadConversations} = useConversations();

onMounted(loadConversations)
</script>


<template>
    <div class="flex flex-grow overflow-auto p-1 pt-3">
        <div class="flex flex-col w-2/6 lg:w-1/6 overflow-hidden">
            <search-input/>

            <ConversationsList
                class="mt-3 overflow-auto"
                :conversations="conversations"
            />
        </div>

        <x-chat></x-chat>
    </div>
</template>

<style scoped>

</style>
