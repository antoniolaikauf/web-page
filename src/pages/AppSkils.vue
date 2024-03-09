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
      // array con dentro le risposte date all'utente da parte del programma
      risposta: [
        // la prima non cambiarla
        " hai scelto sasso carta forbice",
        " bravo hai scelto un gioco ma siccome sono io che gestisco questa pagina e ho voglia di giocare a sasso carta e forbice giochiamo a questo",
        " è inuti che ci riprovi decido io qua",
        " quello che dico è legge",
      ],
      // variabile per comparsa e scomparsa  tag
      nascondi_giochi: false,
      // variabile per gioco
      scelta_utente: "",
      // scelte del computer per gioco
      scelte: ["sasso", "carta", "forbice"],
      // variabile che serve per il gioco cosi che il programma smetta automaticamete
      conteggio: 0,
      // indice che serve per pescare le risposte dentro all'array di risposte
      indice_array_risposta: 1,
      // variabile per comparsa del bottone torna a tutti i giochi
      comparsa_tag: false,
      // scelta computer di quante volte vuole giocare
      decisione_computer: Math.floor(Math.random() * (10 - 3) + 3),
    };
  },
  methods: {
    // fuzione per scelta risposte e per seleionare il gioco
    gioco_sasso_carta_forbice(index) {
      // variabile dove verrà inserita la frase per l'utente
      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      this.nascondi_giochi = true;

      if (index === 0) {
        // fa vedere la frase base
        // PS se si cambia il posizionamento di "sasso carta forbice con CYBERIA", nell'arry giochi bisogna cambiare l'indice di this.risposta[0]
        store.transformElement(this.risposta[0], text_inizio_gioco);
        setTimeout(() => {
          this.comparsa_tag = true;
        }, this.risposta[index].length * 100);
      } else {
        // reset dell'indice
        if (this.indice_array_risposta === this.risposta.length) {
          this.indice_array_risposta = 1;
        }
        // funzione che si trova nel file store
        store.transformElement(
          this.risposta[this.indice_array_risposta],
          text_inizio_gioco
        );
        // incremento del indice array cosi da risposte diverse
        setTimeout(() => {
          this.comparsa_tag = true;
        }, this.risposta[this.indice_array_risposta].length * 100);
        this.indice_array_risposta++;
      }
      // svuotamento dello spazio dove c'è la risposta
      text_inizio_gioco.innerHTML = "";
    },

    all_giochi() {
      // variabile per far vedere i giochi
      this.nascondi_giochi = false;
      this.comparsa_tag = false;

      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      // azzerato variabile
      this.conteggio = 0;
      // svuotamento dello spazio dove c'è la risposta
      text_inizio_gioco.innerHTML = "";
    },
    // funzione sasso carta forbice
    play() {
      // decisione conteggio sarebbe quante volte ha deciso di giocare il computer
      // e se è uguale a conteggio (che sarebbero quante volte ha premuto play l'utente) il comuter riporta automaticamente alla pagina play
      if (!this.scelte.includes(this.scelta_utente)) {
        // controllo del input dove utente iserisce il dato
        alert("devi scrivere sasso carta o forbice");
      }
      // controllo se conteggio è uguale a decisione computer
      else if (this.conteggio === this.decisione_computer) {
        this.nascondi_giochi = false;
        this.conteggio = 0;
        let output_play = (document.querySelector(".output").innerHTML =
          "mi sono stancata di giocare quindi smettiamo qua");
        this.comparsa_tag = false;
      } else {
        this.conteggio++;
        // numero random del computer che pescherà una valore dentro ad array risposte
        let computer_scelta = Math.floor(Math.random() * this.scelte.length);
        // se si pareggia
        if (this.scelta_utente === this.scelte[computer_scelta]) {
          let output_play = (document.querySelector(".output").innerHTML =
            "abbiamo pareggiato");
        }
        // se si vince
        else if (
          (this.scelta_utente === "sasso" &&
            this.scelte[computer_scelta] == "forbice") ||
          (this.scelta_utente === "carta" &&
            this.scelte[computer_scelta] == "sasso") ||
          (this.scelta_utente === "forbice" &&
            this.scelte[computer_scelta] == "sasso")
        ) {
          let output_play = (document.querySelector(".output").innerHTML =
            "ti è andata bene hai vinto");
        }
        // se si perde
        else {
          let output_play = (document.querySelector(".output").innerHTML =
            " sorry , ma ho vinto ");
        }
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
  <h3 id="text-container" class="text-start text-white"></h3>
  <div class="container">
    <div class="row">
      <div
        class="col-4 text-white fs-5"
        v-if="!nascondi_giochi"
        v-for="(gioco, i) in giochi"
        @click="gioco_sasso_carta_forbice(i)"
      >
        {{ gioco }}
      </div>
      <div class="inizio_gioco fs-5"></div>
      <div v-if="nascondi_giochi">
        <div class="btn-group my-3" role="group" aria-label="Basic example">
          <button
            type="button"
            class="btn btn-primary"
            @click="all_giochi(index)"
            v-if="comparsa_tag"
          >
            torna ai giochi
          </button>
        </div>
        <div>
          <h5 class="text-white">scegli sasso carta o forbice</h5>
          <input type="text" v-model="scelta_utente" />
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary" @click="play">
              gioca
            </button>
          </div>
        </div>
      </div>
      <div class="output fs-5"></div>
    </div>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";

.inizio_gioco,
.output {
  background: radial-gradient(white, transparent);
  border-radius: 15px;
}
</style>
