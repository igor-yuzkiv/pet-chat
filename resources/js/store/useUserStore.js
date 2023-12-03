import {defineStore} from "pinia";

export const useUserStore = defineStore("user", {
    state  : () => ({
        currentUser: null,
    }),
    getters: {},
    actions: {
        setCurrentUser(user) {
            this.currentUser = user;
        }
    }
});
