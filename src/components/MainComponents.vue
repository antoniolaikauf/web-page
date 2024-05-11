<script>
export default {
  name: "Main",
};
</script>

<template>
  <div class="container">
    <div class="row">
      <section class="text-center">
        <router-view> </router-view>
      </section>
    </div>
  </div>
</template>

<style lang="scss">
@use "./../style/general.scss" as *;
</style>
