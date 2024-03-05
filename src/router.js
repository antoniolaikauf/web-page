import { createRouter, createWebHistory } from "vue-router";
// importazione file per rotte 
import AppAbout from "./pages/AppAbout.vue";
import AppSkils from './pages/AppSkils.vue'
import AppHome from "./pages/AppHome.vue";
 
// creazione delle rotte e il loro 'percorso'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: AppHome
    },
    {
      path: "/about",
      name: "about",
      component: AppAbout
    },
    {
      path: "/skils",
      name: "skils",
      component:AppSkils
    },
  ],
});
export { router };