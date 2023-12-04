<script setup>
import XButton from "@/components/button/XButton.vue";
import {computed, nextTick, reactive, ref, watch} from "vue";
import {useUserStore} from "@/store/useUserStore.js";
import {prepareConversationName} from "@/services/helpUtil.js";
import XChatSkeleton from "@/components/chat/XChatSkeleton.vue";
import {useRootStore} from "@/store/useRootStore.js";
import {useConversation} from "@/composables/useConversation.js";
import {useMessagesList} from "@/composables/useMessagesList.js";
import XAvatar from "@/components/avatar/XAvatar.vue";
import XChatMessage from "@/components/chat/XChatMessage.vue";
import XChatForm from "@/components/chat/XChatForm.vue";

const props = defineProps({
    conversationId: {
        type   : String,
        default: null,
    },
})

const rootStore = useRootStore();
const userStore = useUserStore();


const messagesContainerRef = ref(null);
const flags = reactive({isLoaded: false});

const {conversation, loadConversation} = useConversation();
const {messages, loadConversationMessages} = useMessagesList();

const otherMembers = computed(() => {
    if (!conversation.value?.members) {
        return [];
    }
    return conversation.value.members.filter(member => member.id !== userStore.getCurrentUserId);
})

const conversationName = computed(() => {
    return prepareConversationName(conversation.value, otherMembers.value);
})

const messagesGroups = computed(() => {
    const conversationMembers = conversation.value?.members;

    return messages.value.reduce((acc, item) => {
        const isCurrentUser = item.from_id === userStore.getCurrentUserId;
        if (!acc.length) {
            acc.push({
                messages: [item],
                isCurrentUser,
                from_id : item.from_id,
                user    : conversationMembers.find(member => member.id === item.from_id),
            });
            return acc;
        }

        const lastGroup = acc.pop();
        if (lastGroup.from_id === item.from_id) {
            lastGroup.messages.push(item);
            acc.push(lastGroup);
        } else {
            acc.push(lastGroup);
            acc.push({
                messages: [item],
                from_id : item.from_id,
                user    : conversationMembers.find(member => member.id === item.from_id),
                isCurrentUser,
            });
        }
        return acc;
    }, [])
})

function toggleLoading(value = null) {
    if (typeof value === "boolean") {
        flags.isLoaded = value;
    } else {
        flags.isLoaded = !flags.isLoaded;
    }
    rootStore.toggleLoader(flags.isLoaded);
}

function onMsgContainerMounted(el) {
    messagesContainerRef.value = el;
    nextTick(() => scrollMsgContainerToBottom())
}

function scrollMsgContainerToBottom() {
    if (messagesContainerRef.value) {
        messagesContainerRef.value.scrollTop = messagesContainerRef.value.scrollHeight;
    }
}

watch(() => props.conversationId, (value) => {
    toggleLoading();
    Promise
        .all([loadConversation(value), loadConversationMessages(value)])
        .finally(() => {
            toggleLoading(false);
        })
})
</script>

<template>
    <x-chat-skeleton v-if="flags.isLoaded"/>
    <div v-else class="flex flex-col h-full w-full overflow-hidden">
        <div
            class="flex flex-col h-full w-full overflow-hidden"
            v-if="conversationId"
        >
            <!--Header-->
            <div class="flex items-center justify-between px-3">
                <div class="flex flex-col">
                    <h1 class="text-xl font-medium">
                        {{ conversationName }}
                    </h1>
                    <div
                        v-if="otherMembers?.length === 1"
                        class="flex items-center justify-start gap-x-2 x-subtitle"
                    >
                        <div class="bg-green-500 h-2 w-2 inline-flex shrink-0 grow-0 rounded-full"/>
                        <span class="font-semibold">Online</span>
                        <span> - </span>
                        <span>Last seen 2 hours ago</span>
                    </div>
                    <div
                        v-else
                        class="flex items-center justify-start gap-x-2 x-subtitle"
                    >
                        <span>{{ otherMembers?.length }} members</span>
                        <span>2 Online</span>
                    </div>
                </div>

                <div class="flex items-center justify-en gap-x-3">
                    <x-button icon="material-symbols:search"/>
                    <x-button icon="material-symbols:call"/>
                    <x-button icon="solar:siderbar-bold-duotone"/>
                    <x-button icon="pepicons-pop:dots-y"/>
                </div>
            </div>


            <div
                class="flex flex-col flex-grow overflow-auto"
                :ref="(el) => onMsgContainerMounted(el)"
            >
                <div
                    v-for="(group, index) in messagesGroups"
                    class="flex flex-col w-full my-2"
                    :key="`message-group-${index}`"
                    :class="{'items-end': group.isCurrentUser, 'items-start': !group.isCurrentUser}"
                >
                    <div
                        class="flex items-end"
                        :class="{'flex-row': group.isCurrentUser, 'flex-row-reverse': !group.isCurrentUser}"
                    >
                        <div class="flex flex-col">
                            <x-chat-message
                                v-for="message in group.messages"
                                :key="message.id"
                                :message="message"
                                :is-current-user="group.isCurrentUser"
                            />
                        </div>

                        <x-avatar class="mx-2" size="lg" :src="group.user.avatar_url">
                            {{ group.user.name }}
                        </x-avatar>
                    </div>
                </div>
            </div>

            <x-chat-form

            />
        </div>

        <div class="flex items-center justify-center w-full h-full" v-else>
            <p>
                Select a chat to start messaging
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>
