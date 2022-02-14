import { createRouter, createWebHistory } from "vue-router";
import Home from "../pages/Home.vue"
import customers from "../pages/customers.vue"
import prospects from "../pages/prospects.vue"
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
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: "active",
});

export default router;
