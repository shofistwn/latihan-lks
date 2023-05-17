import { createRouter, createWebHistory } from "vue-router";
import store from "@/store";

const routes = [
  {
    path: "/",
    name: "login",
    component: () => import("../views/Login.vue"),
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: () => import("../views/Dashboard.vue"),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: "/consultation",
    name: "consultation",
    component: () => import("../views/Consultation.vue"),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: "/vaccination-spot",
    name: "VaccinationSpot",
    component: () => import("../views/vaccination-spot/Index.vue"),
    meta: {
      requiresAuth: true,
    },
  },
  {
    path: "/vaccination-spot/:spot_id",
    name: "DetailVaccinationSpot",
    component: () => import("../views/vaccination-spot/Detail.vue"),
    meta: {
      requiresAuth: true,
    },
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (store.getters.isLoggedIn) {
      next();
      return;
    }
    next("/");
  } else {
    next();
  }
});

export default router;
