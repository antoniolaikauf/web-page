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
    <main class="container">
      <div class="row">
        <section class="text-center">
          <Main />
        </section>
      </div>
    </main>
  </div>
</template>

<style scoped lang="scss">
@import "./style/general.scss";

#bg-project {
  background-image: url(../public/img/sfondo.png);
  background-size: cover;
  height: 100vh;
  overflow-y: scroll;
}
// nasconde la scroll bar
::-webkit-scrollbar {
    display: none;
}
</style>
