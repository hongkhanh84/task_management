import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import { useAppStore } from '@/stores/index';
import appSetting from '@/app-setting';

import HomeView from '../views/index.vue';

const routes: RouteRecordRaw[] = [
    // dashboard
    { path: '/', name: 'home', component: HomeView },
    {
        path: '/project',
        name: 'project',
        component: () => import(/* webpackChunkName: "project" */ '../views/project.vue'),
    },
    {
        path: '/task',
        name: 'task',
        component: () => import(/* webpackChunkName: "task" */ '../views/task.vue'),
    },
    {
        path: '/project/:id',
        name: 'tree_project',
        component: () => import(/* webpackChunkName: "tree_project" */ '../views/tree_project.vue'),
    },
    {
        path: '/user',
        name: 'user',
        component: () => import(/* webpackChunkName: "user" */ '../views/user.vue'),
    },
    {
        path: '/user/profile',
        name: 'profile',
        component: () => import(/* webpackChunkName: "profile" */ '../views/profile.vue'),
    },
];

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'active',
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { left: 0, top: 0 };
        }
    },
});

router.beforeEach((to, from, next) => {
    const store = useAppStore();

    if (to?.meta?.layout == 'auth') {
        store.setMainLayout('auth');
    } else {
        store.setMainLayout('app');
    }
    next(true);
});
router.afterEach((to, from, next) => {
    appSetting.changeAnimation();
});
export default router;
