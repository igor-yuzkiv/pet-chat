import {defineStore} from "pinia";

export const useUserStore = defineStore("user", {
    state  : () => ({
        currentUser: null,
    }),
    getters: {
        getCurrentUserId() {
            return this.currentUser?.id ?? null;
        }
    },
    actions: {
        setCurrentUser(user) {
            this.currentUser = user;
        }
    }
});
