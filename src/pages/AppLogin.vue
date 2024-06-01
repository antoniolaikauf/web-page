<script>
import axios from "axios";
export default {
  name: "Login",
  data() {
    return {
      date: {
        // dati da inviare a database
        name: "",
        password: "",
        remember_me: "",
      },
      accesso: false,
    };
  },
  methods: {
    async access() {
      // chiamata database
      try {
        const call = await axios.put("http://localhost:8000/api/v1/UserLogin", this.date);
        console.log(call.data.remember_token);
        if (call.data.remember_token) localStorage.setItem("remember_me_L", call.data.remember_token);
        if (call.data.chiamata === true) this.accesso = true;
        else this.accesso = false;
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    // var name = window.sessionStorage.getItem("name");
  },
};
</script>
<template>
  <section class="d-flex justify-content-center">
    <div class="dati_utente">
      <!-- form da riempire con dati utente -->
      <div>
        <form @submit.prevent="access" class="my-2">
          <div>
            <label for="name">Nome</label> <br />
            <input type="text" id="name" placeholder="Nome" v-model="date.name" />
          </div>
          <div>
            <label for="password">Password</label> <br />
            <input type="password" id="password" placeholder="Password" v-model="date.password" />
          </div>
          <div>
            <label for="token">Remember me</label>
            <input type="checkbox" name="" id="token" v-model="date.remember_me" />
          </div>
          <input type="submit" class="btn-page" value="Accedi" />
        </form>
      </div>
      <!-- se utente esiste dare accesso -->
      <div v-if="accesso">
        <h2>Welcome</h2>
        <a class="btn-page" href="#"><router-link :to="{ name: 'Message' }"> Gruppo </router-link></a>
      </div>
    </div>
  </section>
</template>
<style scoped lang="scss">
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;
* {
  color: $black;
}
.dati_utente {
  width: 250px;
  border: 1px solid grey;
  border-radius: 20px;
  padding: 20px 0px;
  div {
    padding: 10px 0;
    input {
      padding: 5px;
      border-radius: 2px;
      color: $black;
    }
  }
  h2 {
    font-weight: bold;
  }
}

@media screen and (max-width: 800px) {
  .dati_utente {
    width: 100%;
  }
}
</style>
