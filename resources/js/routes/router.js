import {createRouter, createWebHistory} from 'vue-router';
import DefaultLayout from "@/layouts/default/DefaultLayout.vue";

const router = createRouter({
    history: createWebHistory(),
    routes : [
        {
            path     : "/",
            component: DefaultLayout,
            children : [
                {
                    name     : 'home',
                    path     : '/',
                    component: () => import('@/views/home/HomeView.vue'),
                }
            ],
        }
    ]
});


export default router;
