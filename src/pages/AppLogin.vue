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
      accesso: "",
    };
  },
  methods: {
    async access() {
      window.localStorage.setItem("name", this.date.name);
      // chiamata database
      try {
        const call = await axios.put("http://localhost:8000/api/v1/UserLogin", this.date);
        if (call.data.chiamata === true) {
          // impostazione in baso a checkbox cliccato
          if (call.data.remember_token) {
            localStorage.setItem("remember_me_L", call.data.remember_token);
            window.dispatchEvent(new Event("storage")); //dispatchEvent esegue un evento su un elemento in questo caso su windows, new Event('storage_accesso') crea un evento storage
          } else {
            sessionStorage.setItem("remember_me_S", "true");
            window.dispatchEvent(new Event("storage_accesso"));
          }
          this.accesso = "correct";
        } else this.accesso = "not correct";
      } catch (error) {
        console.log(error);
      }
    },
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
    </div>
  </section>
  <div v-if="accesso === 'correct'">
    <h2>Welcome</h2>
    <a class="btn-page" href="#"><router-link :to="{ name: 'Message' }"> Gruppo </router-link></a>
  </div>
  <h5 v-if="accesso === 'not correct'" class="error">I dati insertiti sono sbagliati</h5>
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

.error
</style>
