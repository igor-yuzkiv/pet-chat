import {createRouter, createWebHistory} from 'vue-router';

import AuthLayout from "@/layouts/auth/AuthLayout.vue";
import DefaultLayout from "@/layouts/default/DefaultLayout.vue";
import {ROUTES} from "@/routes/navigation.js"

const router = createRouter({
    history: createWebHistory(),
    routes : [
        {
            path     : "/",
            component: DefaultLayout,
            children : [
                {
                    ...ROUTES.home,
                    component: () => import('@/views/home/HomeView.vue'),
                }
            ],
        },

        {
            path     : '/auth',
            component: AuthLayout,
            children : [
                {
                    ...ROUTES.login,
                    component: () => import('@/views/auth/LoginView.vue'),
                },
                {
                    ...ROUTES.registration,
                    component: () => import('@/views/auth/RegisterView.vue'),
                },
            ],
        }
    ]
});


export default router;
