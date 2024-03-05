<script>
import Main from "./components/MainComponents.vue";

export default {
  components: {
    Main,
  },
};
</script>

<template>
  <Main />
  <router-view> </router-view>
</template>

<style scoped lang="scss">
@import "./style/general.scss";
</style>
