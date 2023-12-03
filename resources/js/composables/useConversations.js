import {ref} from "vue";
import {conversationsApi} from "@/api/conversations.js";

export function useConversations() {
    const conversations = ref([]);
    const pagination = ref({
        total       : 0,
        count       : 0,
        per_page    : 9,
        current_page: 1,
        total_pages : 1
    });

    async function loadConversations(page = null) {
        if (Number.isFinite(page) && page > 0) {
            pagination.value.current_page = page;
        }

        const response = await conversationsApi.getList({
            query: {
                pagination: true,
                page      : pagination.value.current_page,
                per_page  : pagination.value.per_page,
            },
            includes: [
                conversationsApi.availableIncludes.members,
            ],
        })
            .then(({data}) => data)
            .catch(console.error)

        if (!response?.data || !Array.isArray(response.data) || !response?.meta) {
            conversations.value = [];
            return;
        }

        conversations.value = response.data;
        if (response.meta?.pagination) {
            pagination.value = response.meta.pagination;
        }
    }

    return {
        conversations,
        pagination,
        loadConversations
    }
}
