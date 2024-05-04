import { createRouter, createWebHistory } from "vue-router";
// importazione file per rotte 
import AppGioco from './pages/AppGioco.vue';
import AppHome from "./pages/AppHome.vue";
import NotFound from "./pages/NotFound.vue";
import calculator from "./pages/appCalcolatrice.vue";
import Traslate from "./pages/AppTraslate.vue";

 
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
      path: "/gioco",
      name: "gioco",
      component:AppGioco
    },
    {
      path: "/calcolatrice",
      name: "calcolatrice",
      component:calculator
    },
    {
      path: "/Traslate",
      name: "Traslate",
      component:Traslate
    },
    {
      // The /:pathMatch(.*)* syntax is a special route configuration that captures any path and performs route redirection.
      path: "/:pathMatch(.*)*",
      name: 'Notfound',
      component: NotFound
    },
  ],
});
export { router };