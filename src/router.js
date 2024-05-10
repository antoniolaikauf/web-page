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
      component: Traslate,
      meta:{backgroundImage:'url(../public/img/chip.jpg)'}
    },
    {
      // The /:pathMatch(.*)* syntax is a special route configuration that captures any path and performs route redirection.
      path: "/:pathMatch(.*)*",
      name: 'Notfound',
      component: NotFound
    },
  ],
});

router.beforeResolve((to, from, next) => {
  if (to.name === 'Traslate' && to.meta.backgroundImage) {
    document.body.style.backgroundImage = to.meta.backgroundImage
    document.body.style.backgroundSize = 'cover'
    document.body.style.backgroundPosition='center'
  } else {
    document.body.style.backgroundImage = 'url(../public/img/12.jpg)'
    document.body.style.backgroundSize='cover'
    document.body.style.backgroundPosition='center'
  }
  next()
})
export { router };