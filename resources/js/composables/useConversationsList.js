import {computed, ref} from "vue";
import {conversationsApi} from "@/api/conversations.js";
import {useUserStore} from "@/store/useUserStore.js";
import {prepareConversationName} from "@/services/helpUtil.js";

export function useConversationsList() {
    const conversations = ref([]);
    const pagination = ref({
        total       : 0,
        count       : 0,
        per_page    : 100,
        current_page: 1,
        total_pages : 1
    });

    const userStore = useUserStore();

    async function loadConversations(page = null) {
        if (Number.isFinite(page) && page > 0) {
            pagination.value.current_page = page;
        }

        const response = await conversationsApi.getList({
            query   : {
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

    const conversationsToDisplay = computed(() => {
        return conversations.value
            .map(item => {
                const {members, ...rest} = item;
                const otherMembers = members.filter(member => member.id !== userStore.getCurrentUserId);
                const logo_url = item?.logo_url ?? otherMembers[0]?.avatar_url;

                return {
                    ...rest,
                    name    : prepareConversationName(item, otherMembers),
                    logo_url: logo_url ?? null,
                }
            });
    })

    return {
        conversations,
        conversationsToDisplay,
        pagination,
        loadConversations,
    }
}
