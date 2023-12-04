import {ref} from "vue";
import {messagesApi} from "@/api/messages.js";

export function useMessagesList() {
    const messages = ref([]);
    const pagination = ref({
        total       : 0,
        count       : 0,
        per_page    : 100,
        current_page: 1,
        total_pages : 1
    });

    async function loadConversationMessages(conversationId, page = null) {
        if (Number.isFinite(page) && page > 0) {
            pagination.value.current_page = page;
        }

        const response = await messagesApi
            .getList({
                query  : {
                    pagination: true,
                    page      : pagination.value.current_page,
                    per_page  : pagination.value.per_page,
                },
                filters: [`conversation(${conversationId})`]
            })
            .then(({data}) => data)
            .catch(console.error)

        if (!response?.data || !Array.isArray(response.data) || !response?.meta) {
            messages.value = [];
            return;
        }

        messages.value = response.data;
        if (response.meta?.pagination) {
            pagination.value = response.meta.pagination;
        }
    }

    return {
        messages,
        pagination,
        loadConversationMessages,
    }
}
