import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import { useAppStore } from '@/stores/index';
import appSetting from '@/app-setting';

import HomeView from '../views/index.vue';

const routes: RouteRecordRaw[] = [
    // dashboard
       { 
        path: '/',
        name: 'home',
        component: HomeView, 
        meta: {requireAuth: true},
    },

    {
        path: '/project',
        name: 'project',
        component: () => import(/* webpackChunkName: "project" */ '../views/project/index.vue'),
        meta: {requireAuth: true},
    },
    {
        path: '/task',
        name: 'task',
        component: () => import(/* webpackChunkName: "task" */ '../views/task.vue'),
        meta: {requireAuth: true},
    },
    {
        path: '/project/:id',
        name: 'tree_project',
        component: () => import(/* webpackChunkName: "tree_project" */ '../views/project/detail.vue'),
        meta: {requireAuth: true},
    },
    {
        path: '/user',
        name: 'user',
        component: () => import(/* webpackChunkName: "user" */ '../views/user.vue'),
        meta: {requireAuth: true},
    },
    {
        path: '/user/profile',
        name: 'profile',
        component: () => import(/* webpackChunkName: "profile" */ '../views/auth/profile.vue'),
        meta: {requireAuth: true},
    },

    {
        path: '/login',
        name: 'login',
        component: () => import(/* webpackChunkName: "login" */ '../views/auth/login.vue'),
        meta: { layout: 'auth' },
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

    if (to.meta.requireAuth && !store.user_token){
        next({name:'login'});
    } else if (store.user_token && to.name === 'login'){
        //store.clearToken();
        next({name:'home'})
    } else {
        next()
    }
});
router.afterEach((to, from, next) => {
    appSetting.changeAnimation();
});
export default router;
