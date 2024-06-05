import { createRouter, createWebHistory } from "vue-router";
// importazione file per rotte 
import AppGioco from './pages/AppGioco.vue';
import AppHome from "./pages/AppHome.vue";
import NotFound from "./pages/NotFound.vue";
import calculator from "./pages/appCalcolatrice.vue";
import Traslate from "./pages/AppTranslate.vue";
import login from "./pages/AppLogin.vue";
import Signin from "./pages/AppSignin.vue";
import Message from "./pages/AppGroup.vue";

 
// creazione delle rotte e il loro 'percorso'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: AppHome,
      meta: { backgroundImage: 'url(/img/background.jpg)' }
    },
    {
      path: "/gioco",
      name: "gioco",
      component: AppGioco,
      meta: { backgroundImage: 'url(/img/sfondo.png)' }
    },
    {
      path: "/calcolatrice",
      name: "calcolatrice",
      component: calculator,
      meta: { backgroundImage: 'url(/img/hand.png)' }
    },
    {
      path: "/Traslate",
      name: "Traslate",
      component: Traslate,
      meta: { backgroundImage: 'url(/img/chip.png)' }
    },
    // {
    //   path: "/login",
    //   name: 'login',
    //   component: login,
    //   meta: { backgroundImage: 'url(/img/background1.jpg)' }
    // },
    // {
    //   path: '/Signin',
    //   name: 'Signin',
    //   component: Signin,
    //   meta:{backgroundImage:' url(/img/matrix.jpeg)'},
    // },
    //  {
    //    path: '/Message',
    //    name: 'Message',
    //    component:Message,
    //    meta:{backgroundImage:'url(/img/background1.jpg)'}
    // },
    {
      // The /:pathMatch(.*)* syntax is a special route configuration that captures any path and performs route redirection.
      path: "/:pathMatch(.*)*",
      name: 'Notfound',
      component: NotFound,
      meta:{backgroundImage:'url(/img/background.jpg)'}
    },
  ],
});

router.beforeResolve((to, from, next) => {
  // to fa riferimento alla rotta che si va
  if (to.name === 'Traslate' && to.meta.backgroundImage) Img(to.meta.backgroundImage)
  else if (to.name === 'home' && to.meta.backgroundImage) Img(to.meta.backgroundImage)
  else if (to.name === 'gioco' || to.name === 'Notfound' && to.meta.backgroundImage) Img(to.meta.backgroundImage)
  else if (to.name === 'login' && to.meta.backgroundImage) Img(to.meta.backgroundImage)
  else if (to.name==='Signin' && to.meta.backgroundImage) Img(to.meta.backgroundImage)
  else Img(to.meta.backgroundImage)
  next()

  function Img(backImg) {
    document.body.style.backgroundImage = backImg
    document.body.style.backgroundSize = 'cover'
    document.body.style.backgroundPosition='center'
  }
})
export { router };