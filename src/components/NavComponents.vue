<script>
import axios from "axios";
export default {
  name: "NavBar",
  data() {
    return {
      // variabile può avere il token impostato da applogin o può essere nulla impostata da appgroup
      isRemembered: localStorage.getItem("remember_me_L") !== "null", // controlla della variabile attualmente
      remember_signin: sessionStorage.getItem("remember_me_S") === "true", // controlla variabile senza check
    };
  },
  mounted() {
    // montati eventi al caricamento della pagina
    window.addEventListener("storage", this.updateVerification_L);
    window.addEventListener("storage_accesso", this.updateVerification_S);
    this.check_token();
  },
  beforeDestroy() {
    // togliere gli eventi  prima della distruzione dell componente (distruzione si intende per cambio pagina)
    // in modo tale che non continui ad esserci il codice
    window.removeEventListener("storage", this.updateVerification_L);
    window.removeEventListener("storage_accesso", this.updateVerification_S);
  },
  methods: {
    updateVerification_L() {
      this.isRemembered = localStorage.getItem("remember_me_L") !== "null"; // controlla della variabile attualmente
      this.check();
    },
    updateVerification_S() {
      this.remember_signin = sessionStorage.getItem("remember_me_S") !== "null";
      this.check();
    },
    check() {
      if (this.isRemembered || this.remember_signin) return true; // controllo due variabili
      else return false;
    },
    async check_token() {
      // chiamata per controllo se il token all'interno del localstore e valido
      if (localStorage.getItem("remember_me_L") !== "null") {
        const call = await axios.get("http://localhost:8000/api/v1/Token_check", {
          headers: { Authorization: localStorage.getItem("remember_me_L") },
        });
        try { 
          // se token ha corrispondenza allora fai vedere group
          if (call.data.value === localStorage.getItem("remember_me_L")) {
            this.check = true;
          } else {
            this.check = false;
          }
        } catch (error) {
          console.log(error);
        }
      }
    },
  },
};
</script>

<template>
  <section>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mb-5">
      <div class="container-fluid">
        <a class="navbar-brand container-img" href="#"> <img src="../../public/img/logo.png" alt="#" class="logo-img" /></a>
        <button
          class="navbar-toggler button"
          id="drop-bottone"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'home' }"> Home </router-link></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'Traslate' }"> Traslate </router-link></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'calcolatrice' }"> Calculator </router-link></a>
            </li>
            <!-- verifica se il remember_token -->
            <!-- <li class="nav-item" v-if="!check()">
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'Signin' }">Signin</router-link></a>
            </li>
            <li class="nav-item" v-else>
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'Message' }">Group</router-link></a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"> <router-link :to="{ name: 'gioco' }"> Games </router-link></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-4 text-white" aria-current="page" target="_blank" href="https://github.com/antoniolaikauf"> Github </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active text-white fs-4"
                aria-current="page"
                target="_blank"
                href="https://www.linkedin.com/in/antonio-laikauf-8239892b8/"
                >Linkedin
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
</template>

<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
.container-img {
  width: 100px;
  height: 100px;

  .logo-img {
    width: 100%;
  }
}

#drop-bottone {
  background-color: ghostwhite;
}
</style>
