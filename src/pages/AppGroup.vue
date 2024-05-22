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
    <div class="messaggi">ggggggggggggg</div>
  </section>
</template>
<style scoped lang="scss">
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
.messaggi {
  margin: auto;
  width: 80%;
  height: 70vh;
  overflow-y: scroll;
  border: 1px solid black;
  border-radius: 8px;
  padding: 20px;
  backdrop-filter: blur(10px);
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 8px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: purple;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000;
}
</style>
