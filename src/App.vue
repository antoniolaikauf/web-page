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
    <NavBar />
    <div class="container">
      <div class="row">
        <Main />
        <router-view> </router-view>
      </div>
    </div>
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
