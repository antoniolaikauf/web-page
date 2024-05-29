<script>
import axios from "axios";
import { store } from "../store";
export default {
  name: "Signin",
  data() {
    return {
      date: {
        // dati da inviare a database
        name: "rrr",
        password: "rrr",
      },
      accesso: false,
    };
  },
  methods: {
    async deleteAccaunt() {
      try {
        const call = await axios.post("http://localhost:8000/api/v1/DeleteAccount", this.date);
        console.log(call.data);
      } catch (error) {
        console.log(error);
      }
    },
    async access() {
      // chiamat database
      try {
        const call = await axios.post("http://localhost:8000/api/v1/UserSignin", this.date);
        store.name = call.data.dati[0].name;
        // console.log(call.data);
        this.accesso = true;
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
          <input type="submit" class="btn-page" value="Accedi" />
        </form>
      </div>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">deleteAccaunt</button>

      <!-- Modal -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Sei sicuro di voler eliminare l'account</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" @click="deleteAccaunt" data-bs-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>
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
