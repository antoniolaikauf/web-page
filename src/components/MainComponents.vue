<script>
export default {
  name: "Main",
};
</script>

<template>
  <div class="container-fluid">
    <div class="row">
      <section class="text-center">
        <router-view> </router-view>
      </section>
    </div>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";
</style>
