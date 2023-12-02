import pinia from "@/plugins/pinia.js";
import router from '@/routes/router.js';
import toasity from "@/plugins/toasity.js";

export function registerPlugins(app) {
    pinia(app);
    toasity(app);
    app.use(router)
}
