<script setup>
import ConversationsListItem from "@/components/converstions-list/ConversationsListItem.vue";

defineEmits(['item:click'])
defineProps({
    conversations: {
        type    : Array,
        required: true
    }
})
</script>

<template>
    <ul class="space-y-4">
        <li
            v-for="conversation in conversations"
            :key="conversation.id"
            class="rounded-2xl"
            @click="$emit('item:click', conversation)"
        >
            <conversations-list-item :conversation="conversation"/>
        </li>
    </ul>
</template>

<style scoped>

</style>
