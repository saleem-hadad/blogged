import Vue from "vue"
import routes from './routes'
import Router from "vue-router"

Vue.use(Router);

const router = new Router({
    base: window.base,
    routes: routes,
    mode: "history",
    linkActiveClass: 'active',
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

export default router;