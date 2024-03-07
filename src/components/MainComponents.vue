<script>
export default {
  name: "Main",
};
</script>

<template>
  <router-view> </router-view>
</template>

<style lang="scss">
@import "./../style/general.scss";

// animazione per testo
@keyframes type {
  0% {
    width: 0%;
  }
  100% {
    width: 100%;
  }
}
</style>
