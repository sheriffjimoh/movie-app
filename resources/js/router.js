import Vue from "vue"
import Router from "vue-router"
Vue.use(Router);

import Home from "./components/frontend/pages/Home";
// import Home from "./components/frontend/HeaderComponent";
import Dashboard from "./components/dashboard/Dashboard";
import Search from "./components/frontend/pages/Search"

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
        path:"/search",
        component:Search
    },
     {
        path:"/*",
        component:Home
    },
    
];

export default new Router({
    mode:"history",
    routes

});
