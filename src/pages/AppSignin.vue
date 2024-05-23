<script>
import axios from "axios";
import { store } from "../store";
export default {
  name: "Signin",
  data() {
    return {
      date: {
        name: "rrr",
        password: "rrr",
      },
      accesso: false,
    };
  },
  methods: {
    async access() {
      try {
        const call = await axios.post("http://localhost:8000/api/v1/UserSignin", this.date);
        store.name = call.data.dati[0].name;
        console.log(store.name);
        console.log(call.data);
        this.accesso = true;
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
<template>
  <section>
    <div class="dati_utente">
      <form @submit.prevent="access" class="my-2">
        <div>
          <label for="name">Inserire Nome</label> <br />
          <input type="text" id="name" placeholder="Nome" v-model="date.name" />
        </div>
        <div>
          <label for="password"> Inserire password</label> <br />
          <input type="password" id="password" placeholder="Password" v-model="date.password" />
        </div>
        <input type="submit" class="btn-page" value="Accedi" />
      </form>
    </div>
    <!-- <div v-if="accesso">
      <a class="btn-page" href="#"><router-link :to="{ name: 'Message' }"> Gruppo </router-link></a>
    </div> -->
  </section>
</template>
<style scoped lang="scss">
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;
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
      color: black;
    }
  }
}

@media screen and (max-width: 800px) {
  .dati_utente {
    width: 100%;
  }
}
</style>
