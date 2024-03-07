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
  <NavBar />
  <Main />
  <router-view> </router-view>
</template>

<style scoped lang="scss">
@import "./style/general.scss";
</style>
