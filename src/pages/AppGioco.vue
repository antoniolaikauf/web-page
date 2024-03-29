<script>
import { store } from "../store";
export default {
  name: "AppGioco",
  data() {
    return {
      text: "Benvenuto, se sei qua presumo che tu voglia sfidarmi",
      giochi: [
        // questo indice lasciare sullo 0 se si vuole cambiare cambiare anche la funzione gioco_sasso_carta_forbice
        "Sasso Carta Forbice con CYBERIA",
        "Indovina il numero che sta pensando CYBERIA in meno di 5 tentativi",
        "Pari o dispari contro CYBERIA",
      ],
      // array con dentro le risposte date all'utente da parte del programma
      risposta: [
        // la prima non cambiarla
        "giochiamo!!",
        "Hai scelto un gioco ma siccome sono io che gestisco questa pagina giochiamo a sasso carta forbice",
        " è inuti che ci riprovi decido io qua",
        " Quello che dico è legge",
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
      // conteggio per utente
      score_user: 0,
      // conteggio computer
      score_computer: 0,
    };
  },
  methods: {
    // fuzione per scelta risposte e per seleionare il gioco
    gioco_sasso_carta_forbice(index) {
      // variabile dove verrà inserita la frase per l'utente
      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      this.nascondi_giochi = true;
      // azzeramento dello score
      this.score_computer = 0;
      this.score_user = 0;
      this.scelta_utente = "";
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
      let output_play = (document.querySelector(".output").innerHTML = "");
      // let  = (document.querySelector(".output").innerHTML = "");
      this.nascondi_giochi = false;
      this.comparsa_tag = false;
      // // svuotamento dello spazio dove c'è la risposta
      const text_inizio_gioco = (document.querySelector(
        ".inizio_gioco"
      ).innerHTML = "");
      // azzerato variabile
      this.conteggio = 0;
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
        const text_inizio_gioco = (document.querySelector(
          ".inizio_gioco"
        ).innerHTML = "");
        this.nascondi_giochi = false;
        this.conteggio = 0;
        if (this.score_computer > this.score_user) {
          let output_play = (document.querySelector(".output").innerHTML =
            "Ah, la dolce vittoria! Spero tu abbia preso appunti. A presto, campione... in seconda posizione!" +
            " CYBERIA " +
            this.score_computer +
            " umano " +
            this.score_user);
        } else {
          let output_play = (document.querySelector(".output").innerHTML =
            "mi sono stancata di giocare quindi smettiamo qua");
        }
        this.comparsa_tag = false;
      } else {
        this.conteggio++;
        // numero random del computer che pescherà una valore dentro ad array risposte
        let computer_scelta = Math.floor(Math.random() * this.scelte.length);
        // se si pareggia
        if (this.scelta_utente === this.scelte[computer_scelta]) {
          let output_play = (document.querySelector(
            ".output"
          ).innerHTML = ` ho scelto ${this.scelte[computer_scelta]} abbiamo pareggiato`);
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
          this.score_user++;
          let output_play = (document.querySelector(
            ".output"
          ).innerHTML = ` ho scelto ${this.scelte[computer_scelta]} ti è andata bene hai vinto`);
        }
        // se si perde
        else {
          this.score_computer++;
          let output_play = (document.querySelector(
            ".output"
          ).innerHTML = ` ho scelto ${this.scelte[computer_scelta]} sorry , ma ho vinto e godo`);
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
  <section>
    <h3 id="text-container" class="text-start text-white"></h3>
    <div class="container">
      <div class="row">
        <div
          class="col-12 col-sm-4 text-white fs-5 my-3"
          v-if="!nascondi_giochi"
          v-for="(gioco, i) in giochi"
          @click="gioco_sasso_carta_forbice(i)"
          style="cursor: pointer"
        >
          {{ gioco }}
        </div>
        <div class="inizio_gioco fs-5 my-4 text-start"></div>
        <div v-if="nascondi_giochi">
          <div class="btn-group my-3" role="group" aria-label="Basic example">
            <button
              type="button"
              class="btn-page"
              @click="all_giochi(index)"
              v-if="comparsa_tag"
            >
              torna ai giochi
            </button>
          </div>
          <div class="mb-5 mt-2">
            <h5 class="text-white">scrivi sasso carta o forbice</h5>
            <div
              class="d-flex justify-content-center py-2 gioco align-items-center"
            >
              <div>
                <b> score CYBERIA</b>
                {{ score_computer }}
              </div>
              <div
                class="btn-group px-4"
                role="group"
                aria-label="Basic example"
              >
                <button type="button" class="btn-page" @click="play">
                  gioca
                </button>
              </div>
              <div>
                score utente
                {{ score_user }}
              </div>
            </div>
            <input
              type="text"
              class="my-3 rounded border-0 p-2 text-black"
              v-model="scelta_utente"
              placeholder="scrivi il tuo valore "
            />
          </div>
        </div>
        <div>
          <span class="output fs-5 text-start"></span>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;

.inizio_gioco,
.output,
.gioco,
.text-start {
  font-weight: bold;
  font-family: $font_cyberia;
}

.gioco {
  background-color: $background_text;
  backdrop-filter: blur(10px);
  // background: radial-gradient(white, transparent);
  border-radius: 15px;
}
</style>
