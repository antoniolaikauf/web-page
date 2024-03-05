<script>
export default {
  name: "Main",
};
</script>

<template>
  sono il main

  <div>
    <a class="nav-link active" aria-current="page" href="">
      <router-link :to="{ name: 'home' }"> home </router-link>
    </a>
  </div>
  <div>
    <a class="nav-link active" aria-current="page" href="">
      <router-link :to="{ name: 'about' }"> about us </router-link>
    </a>
  </div>
  <div>
    <a class="nav-link" href="">
      <router-link :to="{ name: 'skils' }"> tags </router-link>
    </a>
  </div>
</template>

<style lang="scss">
@use "./../style/general.scss";
</style>
