import Vue from "vue"
import Router from "vue-router"
Vue.use(Router);

import Home from "./pages/frontend/Home";
// import Home from "./components/frontend/HeaderComponent";
import Dashboard from "./pages/dashboard/Dashboard";
import Search from "./pages/frontend/Search"

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
