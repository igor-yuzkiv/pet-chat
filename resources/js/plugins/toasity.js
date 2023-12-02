import Vue3Toasity, {toast} from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export const TOAST_SYMBOL = Symbol("toast");

export default function (app) {
    app.use(Vue3Toasity, {position: toast.POSITION.TOP_CENTER})
    app.provide(TOAST_SYMBOL, toast)
}
