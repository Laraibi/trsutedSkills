import { createRouter, createWebHistory } from "vue-router";
import Home from "../pages/Home.vue"
import customers from "../pages/customers.vue"
import prospects from "../pages/prospects.vue"
import rappels from "../pages/rappels.vue"
const routes = [
    {
        path: "/Home",
        name: "Home",
        component: Home,
    },
    {
        path: "/customers",
        name: "customers",
        component: customers,
    },
    {
        path: "/prospects",
        name: "prospects",
        component: prospects,
    },
    {
        path: "/rappels",
        name: "rappels",
        component: rappels,
    },
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: "active",
});

export default router;
