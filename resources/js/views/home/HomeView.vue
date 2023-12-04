<script setup>
import {useConversationsList} from "@/composables/useConversationsList.js";
import {onMounted, ref} from "vue";
import ConversationsList from "@/components/converstions-list/ConversationsList.vue";
import SearchInput from "@/components/search/SearchInput.vue";
import XChat from "@/components/chat/XChat.vue";

const {
    conversations,
    conversationsToDisplay,
    loadConversations
} = useConversationsList();
onMounted(loadConversations)

const selectedConversation = ref(null);

function onClickConversation(conversation) {
    selectedConversation.value = conversation;
    conversations.value = conversations.value.map(item => ({...item, is_active: item.id === conversation.id}))
}

</script>

<template>
    <div class="flex flex-grow overflow-auto p-1 pt-3">
        <div class="flex flex-col w-2/6 lg:w-2/6 overflow-hidden">
            <search-input/>

            <ConversationsList
                @item:click="onClickConversation"
                class="mt-3 overflow-auto px-1"
                :conversations="conversationsToDisplay"
            />
        </div>

        <x-chat :conversation-id="selectedConversation?.id"/>
    </div>
</template>

<style scoped>

</style>
