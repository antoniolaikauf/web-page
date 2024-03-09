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
        "è inuti che ci riprovi decido io qua",
        "quello che dico è legge",
      ],
      nascondi_giochi: false,
      scelta_utente: "",
      scelte: ["sasso", "carta", "forbice"],
      conteggio: 0,
      indice_array_risposta: 1,
    };
  },
  methods: {
    gioco_sasso_carta_forbice(index) {
      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      this.nascondi_giochi = true;
      if (index === 0) {
        store.transformElement(this.risposta[0], text_inizio_gioco);
      } else {
        if (this.indice_array_risposta === this.risposta.length) {
          this.indice_array_risposta = 1;
        }
        store.transformElement(
          this.risposta[this.indice_array_risposta],
          text_inizio_gioco
        );
        this.indice_array_risposta++;
      }
      text_inizio_gioco.innerHTML = "";
    },
    all_giochi() {
      this.nascondi_giochi = false;
      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      this.conteggio = 0;
      text_inizio_gioco.innerHTML = "";

      // let ciao = 1;
      // const text_inizio_gioco = document.querySelector(".inizio_gioco");
      // store.transformElement(this.risposta[indice], text_inizio_gioco, ciao);
    },
    play() {
      let decisione_computer = Math.floor(Math.random() * (10 - 3) + 3);
      if (!this.scelte.includes(this.scelta_utente)) {
        alert("devi scrivere sasso carta o forbice");
      } else if (this.conteggio === decisione_computer) {
        this.nascondi_giochi = false;
        this.conteggio = 0;
        let output_play = (document.querySelector(".output").innerHTML =
          "mi sono stancata di giocare quindi smettiamo qua");
      } else {
        this.conteggio++;
        let computer_scelta = Math.floor(Math.random() * this.scelte.length);
        if (this.scelta_utente === this.scelte[computer_scelta]) {
          let output_play = (document.querySelector(".output").innerHTML =
            "abbiamo pareggiato");
        } else if (
          (this.scelta_utente === "sasso" &&
            this.scelte[computer_scelta] == "forbice") ||
          (this.scelta_utente === "carta" &&
            this.scelte[computer_scelta] == "sasso") ||
          (this.scelta_utente === "forbice" &&
            this.scelte[computer_scelta] == "sasso")
        ) {
          let output_play = (document.querySelector(".output").innerHTML =
            "ti è andata bene hai vinto");
        } else {
          let output_play = (document.querySelector(".output").innerHTML =
            "ho vinto ");
        }
        console.log(this.scelte[computer_scelta]);
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
      <div class="inizio_gioco"></div>
      <div v-if="nascondi_giochi">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button
            type="button"
            class="btn btn-primary"
            @click="all_giochi(index)"
          >
            torna ai giochi
          </button>
        </div>
        <div>
          <h5>scegli sasso carta o forbice</h5>
          <input type="text" v-model="scelta_utente" />
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" @click="play">
              gioca
            </button>
          </div>
        </div>
      </div>
      <div class="output"></div>
    </div>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";
</style>
