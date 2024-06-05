<script>
import axios from "axios";
import Main from "./components/MainComponents.vue";
import NavBar from "./components/NavComponents.vue";

export default {
  components: {
    Main,
    NavBar,
  },
  data() {
    return {
      token: localStorage.getItem("remember_me_L"),
    };
  },
  methods: {
    async check_token() {
      const call = await axios.get("http://localhost:8000/api/v1/Token_check", {
        headers: { Authorization: this.token },
      });
      try {
        console.log(call.data);
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    this.check_token();
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
