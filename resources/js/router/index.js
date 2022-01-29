import { createRouter, createWebHistory } from "vue-router";
import Home from "../pages/Home.vue"
const routes = [
    {
        path: "/Home",
        name: "Home",
        component: Home,
    },
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: "active",
});

export default router;
