<script>
import { store } from "../store";

export default {
  name: "AppHome",
  data() {
    return {
      text: "salve sono cyberia l'intelligenza artificiale di antonio si trova nella sezione home",
    };
  },
  mounted() {
    const place_text = document.getElementById("text-container");
    store.transformElement(this.text, place_text);
  },
};
</script>

<template>
  <div class="d-inline-block">
    <h3 id="text-container"></h3>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";
</style>
