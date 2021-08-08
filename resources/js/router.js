import Vue from "vue"
import Router from "vue-router"
Vue.use(Router);

import Home from "./components/frontend/Home.vue";
import Dashboard from "./components/dashboard/Dashboard";

const routes = [
    {
        path:"/",
        component:Home
    },
    {
        path:"/dashboard",
        component:Dashboard
    },
     {
        path:"/*",
        component:Home
    }
];

export default new Router({
    mode:"history",
    routes

});
