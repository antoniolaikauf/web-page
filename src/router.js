import { createRouter, createWebHistory } from "vue-router";
// importazione file per rotte 
import AppGioco from './pages/AppGioco.vue'
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
      path: "/gioco",
      name: "gioco",
      component:AppGioco
    },
  ],
});
export { router };