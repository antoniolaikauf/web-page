<script>
import axios from "axios";
export default {
  name: "login",
  data() {
    return {
      dati: {
        // dati da inviare per creare utente
        name: "",
        email: "",
        password: "",
      },
      controllData: false,
    };
  },
  methods: {
    async form() {
      try {
        const call = await axios.post("http://localhost:8000/api/v1/UserLogin", this.dati);
        console.log(call.data);
        // controllo dati gia esistenti
        if (!call.data.chiamata) this.controllData = true;
        else this.controllData = false;
      } catch (error) {
        console.log(error);
        this.controllData = true;
      }
    },
  },
};
</script>
<template>
  <section>
    <!-- dati gia esistenti -->
    <h3 v-if="controllData" class="error">I dati presenti esistono gia</h3>
    <div class="dati_utente">
      <!-- form da riempire con dati -->
      <form @submit.prevent="form" class="my-2">
        <div>
          <label for="name">Inserire Nome</label> <br />
          <input type="text" id="name" placeholder="Nome" v-model="dati.name" />
        </div>
        <div>
          <label for="email">Inserire email</label> <br />
          <input type="email" id="email" placeholder="Email" v-model="dati.email" />
        </div>
        <div>
          <label for="password"> Inserire password</label> <br />
          <input type="password" id="password" placeholder="Password" v-model="dati.password" />
        </div>
        <input type="submit" class="btn-page" value="Registrati" />
      </form>
      <!-- <div>
        Se hai gia un account
        <div>
          <a class="btn-page" href="#"><router-link :to="{ name: 'Signin' }"> Sign in </router-link></a>
        </div>
      </div> -->
    </div>
    <div class="img-face">
      <img src="/img/face.png" alt="#" />
    </div>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;

.dati_utente {
  width: 350px;
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
}

@media screen and (max-width: 800px) {
  .dati_utente {
    width: 100%;
  }
  .img-face {
    display: none;
  }
}
.img-face {
  img {
    top: 210px;
    right: 20px;
    position: absolute;
  }
}

.error {
  opacity: 0px;
  margin-bottom: 30px;
  animation-name: errorAnimation;
  animation-duration: 2s;
}
@keyframes errorAnimation {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>
