<script>
import { store } from "../store";
export default {
  name: "AppSkils",
  data() {
    return {
      text: "benvenuto , se sei qua presumo che tu voglia sfidarmi",
      giochi: [
        // questo indice lasciare sullo 0 se si vuole cambiare cambiare anche la funzione gioco_sasso_carta_forbice
        "sasso carta forbice con CYBERIA",
        "indovina il numero che sta pensando CYBERIA in meno di 5 tentativi",
        "pari o dispari contro CYBERIA",
      ],
      risposta: [
        "ok hai scelto sasso carta forbice",
        "bravo hai scelto un gioco ma siccome sono io che gestisco questa pagina e ho voglia di giocare a sasso carta e forbice giochiamo a questo",
      ],
      nascondi_giochi: false,
    };
  },
  methods: {
    gioco_sasso_carta_forbice(index) {
      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      this.nascondi_giochi = true;
      // let tentativi_utente = 1;
      if (index > 1) {
        store.transformElement(this.risposta[0], text_inizio_gioco);
      } else {
        store.transformElement(this.risposta[1], text_inizio_gioco);
      }
    },
  },
  mounted() {
    const place_text = document.getElementById("text-container");
    store.transformElement(this.text, place_text);
  },
};
</script>

<template>
  <h3 id="text-container" class="text-start"></h3>
  <div class="container">
    <div class="row">
      <div
        class="col-4"
        v-if="!nascondi_giochi"
        v-for="(gioco, i) in giochi"
        @click="gioco_sasso_carta_forbice(i)"
      >
        {{ gioco }}
        
      </div>

    </div>
    <div class="inizio_gioco"></div>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";
</style>
