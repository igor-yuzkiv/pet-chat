import {defineStore} from "pinia";

export const useRootStore = defineStore("root", {
    state  : () => ({
        showLoader: false,
    }),
    getters: {
        getLoaderState() {
            return this.showLoader;
        }
    },
    actions: {
        toggleLoader(value) {
            this.showLoader = value;
        }
    }
});
