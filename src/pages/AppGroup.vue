<script>
import { store } from "../store";
import axios from "axios";
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
    <div class="group">
      <div class="messaggi text-start">ciao</div>
      <div class="enter">
        <input type="text" />
        <button class="btn-page">Enter</button>
      </div>
    </div>
  </section>
</template>
<style scoped lang="scss">
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
* {
  color: black;
}
.group {
  margin: auto;
  width: 80%;
  height: 70vh;
  border: 1px solid black;
  border-radius: 8px;
  padding: 20px;
  backdrop-filter: blur(10px);
  overflow-y: scroll;
  .messaggi {
    height: 95%;
  }
  .enter {
    height: calc(100% - 95%);
    display: flex;
    justify-content: space-between;
    input {
      width: 70%;
    }
    button {
      width: 10%;
    }
  }
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
@media screen and (max-width: 1000px) {
  .messaggi {
    width: 100%;
  }
}
</style>
