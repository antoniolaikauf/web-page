<script>
export default {
  name: "NotFound",
};
</script>

<template>
  <section class="d-flex">
    <div>
      <h1>Torna indietro se no CYBERIA si arrabbia !!</h1>
    </div>
    <div>
      <img src="/public/img/face1.jpg" alt="" class="face" />
    </div>
  </section>
</template>

<style scoped lang="scss">
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;

section {
  h1 {
    font-family: $font_cyberia;
  }
  div {
    width: 50%;
  }
  .face {
    width: 50%;
  }
}
</style>
