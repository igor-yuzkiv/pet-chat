<script setup>
import {useConversations} from "@/composables/useConversations.js";
import {onMounted} from "vue";
import ConversationsList from "@/components/converstions-list/ConversationsList.vue";
import {Icon} from "@iconify/vue";

const {conversations, loadConversations} = useConversations();


onMounted(loadConversations)
</script>


<template>
    <div class="flex flex-grow overflow-auto p-1">
        <div class="flex flex-col w-2/6 lg:w-1/6">
            <div class="relative flex items-center justify-center mt-3">
                <input
                    class="x-input w-full !py-2.5 !pl-10"
                    placeholder="Search..."
                />
                <Icon
                    icon="material-symbols:search"
                    class="absolute left-2 w-6 h-6"
                />
            </div>

            <ConversationsList
                class="mt-3"
                :conversations="conversations"
            />
        </div>

        <div class="flex flex-col w-full h-full">

        </div>
    </div>
</template>

<style scoped>

</style>
