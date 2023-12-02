import {defineStore} from "pinia";

export const useRootStore = defineStore("root", {
    state  : () => ({
        showLoader: false,
    }),
    getters: {},
    actions: {
        toggleLoader(value) {
            this.showLoader = value;
        }
    }
});
