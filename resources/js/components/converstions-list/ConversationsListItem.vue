<script setup>
import {computed} from "vue";
import {useUserStore} from "@/store/useUserStore.js";
import assets from "@/config/assets.js";
import XAvatar from "@/components/avatar/XAvatar.vue";

const props = defineProps({
    conversation: {
        type    : Object,
        required: true
    }
})

const userStore = useUserStore();

const members = computed(() => {
    if (!Array.isArray(props.conversation?.members) || !props.conversation.members.length) {
        return [];
    }

    return props.conversation.members.filter((member) => member.id !== userStore.getCurrentUserId)
})

const conversationName = computed(() => {
    if (props.conversation?.name) {
        return props.conversation.name;
    }

    if (!members.value.length) {
        return "Untitled";
    }

    if (members.value.length === 1) {
        return members.value[0].name;
    }

    return `${members.value[0].name} and ${members.value.length - 1} others`;
})

const conversationLogo = computed(() => {
    if (members.value.length === 1) {
        return members.value[0]?.avatar_url ?? assets.defaultAvatar;
    }
    //TODO: add group avatar
    return assets.defaultAvatar;
})

</script>

<template>
    <div
        class="flex items-center p-3 rounded-2xl cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700"
        :class="{'bg-gray-200 dark:bg-gray-700' : conversation?.is_active}"
    >
        <x-avatar size="lg" :src="conversationLogo"/>

        <div class="ml-2 flex flex-col w-full truncate">
            <div class="flex">
                <h2 class="font-semibold truncate w-full">{{ conversationName }}</h2>
                <span
                    v-if="conversation?.created_at_formatted"
                    class="text-xs text-gray-300"
                >
                    {{ conversation.created_at_formatted }}
                </span>
            </div>

            <p class="text-xs text-gray-400 truncate">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                the industry's standard dummy text ever since the 1500
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>
