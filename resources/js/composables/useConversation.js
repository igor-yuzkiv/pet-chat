import {ref} from "vue";
import {conversationsApi} from "@/api/conversations.js";

export function useConversation() {
    const conversation = ref(null);

    async function loadConversation(conversationId) {
        if (!conversationId) {
            return;
        }

        const response = await conversationsApi
            .getById(conversationId, [conversationsApi.availableIncludes.members])
            .then(({data}) => data)
            .catch(console.error)

        if (response?.id) {
            conversation.value = response;
        }
    }


    return {
        conversation,
        loadConversation,
    }
}
