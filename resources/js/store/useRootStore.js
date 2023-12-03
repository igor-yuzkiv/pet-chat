import {defineStore} from "pinia";

export const useRootStore = defineStore("root", {
    state  : () => ({
        darkMode  : true,
        showLoader: false,
    }),
    getters: {},
    actions: {
        toggleLoader(value) {
            this.showLoader = value;
        }

    }
});
