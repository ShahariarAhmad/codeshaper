// Lazy Loading [Will load when first called. Then will be stored in cache memory]




import { createRouter, createWebHistory } from "vue-router";

// Lazy Loading [Will load when first called. Then will be stored in cache memory]

// Components
// const SideBar = () => import("./src/components/SideBar.vue");

// Auth

// const login = () => import("./auth/LoginPage.vue");
// const register = () => import("./auth/RegisterPage.vue");


// Views
const Dashboard = () => import("./src/layouts/DashboardPage.vue");
const home = () => import("./src/layouts/HomePage.vue");
const Index = () => import("./src/views/home/IndexPage.vue");
const Login = () => import("./src/views/LoginPage.vue");
const Register = () => import("./src/views/RegisterPage.vue");
const DashboardIndex = () => import("./src/views/dashboard/DashboardIndex.vue");
const MembershipPlan = () => import("./src/views/dashboard/MembershipPlan.vue");
const PublishArticle = () => import("./src/views/dashboard/PublishArticle.vue");
const PublishedArticles = () => import("./src/views/dashboard/PublishedArticles.vue");


const routes = [


    {
        path: "/",
        component: home,
        children: [
            {
                path: "",
                name: "Home",
                component: Index
            },

            {
                path: "register",
                name: "Register",
                component: Register
            },
            {
                path: "login",
                name: "Login",
                component: Login
            }


        ]
    },


    {
        path: "/dashboard",
        component: Dashboard,
        children: [
            {
                path: "",
                name: "Dashboard",
                component: DashboardIndex
            },
            {
                path: "/write",
                name: "Write",
                component: PublishArticle
            },
            {
                path: "/published",
                name: "Published",
                component: PublishedArticles
            },
            {
                path: "/membership",
                name: "Membership",
                component: MembershipPlan
            }
        ]
    },


];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
