<script>
import { store } from "../store";
export default {
  name: "Message",
  data() {
    return {};
  },
  methods: {},
  mounted() {
    console.log(store.name.dati[0].name);
  },
};
</script>
<template>
  <section>
    <h3>Gruppo generale</h3>
    <div class="messaggi"></div>
  </section>
</template>
<style scoped lang="scss">
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
.messaggi {
  width: 70%;
  height: 70vh;
  overflow-y: scroll;
}

::-webkit-scrollbar {
  display: none;
}
</style>
