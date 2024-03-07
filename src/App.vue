<script>
import Main from "./components/MainComponents.vue";
import NavBar from "./components/NavComponents.vue";

export default {
  components: {
    Main,
    NavBar,
  },
};
</script>

<template>
  <div id="bg-project">
    <header>
      <NavBar />
    </header>
    <section class="text-center">
      <Main />
    </section>
  </div>
</template>

<style scoped lang="scss">
@import "./style/general.scss";

#bg-project {
  background-image: url(../public/img/sfondo.png);
  background-size: cover;
  height: 100vh;
}
</style>
