<script>
import axios from "axios";
export default {
  name: "login",
  data() {
    return {
      dati: {
        name: "rrr",
        email: "antonio@gmial.com",
        password: "rrr",
      },
      date_user: "",
      accesso: false,
    };
  },
  methods: {
    async form() {
      try {
        const call = await axios.post("http://localhost:8000/api/v1/User", this.dati);
        console.log(call.data.name);
        this.date_user = call.data.name;
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
    <div class="name_user" v-if="accesso">{{ date_user }}cisosodisidf</div>
    <div class="dati_utente">
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
      <a class="btn-page" href="#"><router-link :to="{ name: 'Signin' }"> Sign in </router-link></a>
    </div>
    <div class="img-face">
      <img src="/img/face.png" alt="" />
    </div>
  </section>
</template>
<style lang="scss" scoped>
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
.img-face {
  text-align: end;
}
</style>
