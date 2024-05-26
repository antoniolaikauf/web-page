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
    <main>
      <Main />
    </main>
  </div>
</template>

<style scoped lang="scss">
@use "./style/partials/mixins" as *;
@use "./style/partials/variable" as *;
@use "./style/general.scss" as *;

#bg-project {
  height: 100vh;
  overflow-y: scroll;
}
// nasconde la scroll bar
::-webkit-scrollbar {
  display: none;
}
</style>
