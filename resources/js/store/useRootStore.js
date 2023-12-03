import {defineStore} from "pinia";

export const useRootStore = defineStore("root", {
    state  : () => ({
        darkMode  : localStorage.getItem('darkMode') === 'true',
        showLoader: false,
    }),
    getters: {},
    actions: {
        toggleLoader(value) {
            this.showLoader = value;
        },
        setDarkMode(value) {
            this.darkMode = value;
            localStorage.setItem('darkMode', this.darkMode.toString());
        }
    }
});
