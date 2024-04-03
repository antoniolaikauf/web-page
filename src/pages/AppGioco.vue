<script>
import { callWithAsyncErrorHandling } from "vue";
import { store } from "../store";
export default {
  name: "AppGioco",
  data() {
    return {
      giochi: [
        // questo indice lasciare sullo 0 se si vuole cambiare cambiare anche la funzione gioco_sasso_carta_forbice
        "Sasso Carta Forbice con CYBERIA",
        "Tris con CYBERIA",
      ],
      // variabile conrisposta
      Risposta: "giochiamo!!",
      // variabile per comparsa e scomparsa  tag
      gioco_SCF_nascosto: false,
      nascondi_gioco_tris: false,
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
      // output risultato
      output: "",
      // gioco tris
      gioco_tris: [
        {
          bg_user: false,
          bg_computer: false,
          number: 1,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 2,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 3,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 4,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 5,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 6,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 7,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 8,
        },
        {
          bg_user: false,
          bg_computer: false,
          number: 9,
        },
      ],
      // counter per bloccare il ciclo nel gioco se raggiunge 5
      counter_block: "",
      // possibili combinazione di vittoria
      array_winners: [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
      ],
      // array dove si mette i square selezionati
      array_check_user: [],
      array_check_computer: [],
    };
  },
  methods: {
    // fuzione per scelta risposte e per seleionare il gioco
    Game(index) {
      this.output = "";
      // variabile dove verrà inserita la frase per l'utente
      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      if (this.giochi[index] === "Sasso Carta Forbice con CYBERIA") {
        // azzeramento dello score
        this.score_computer = 0;
        this.score_user = 0;
        this.scelta_utente = "";
        // queste all'interno della funzione sono le variabili e messe cosi perche variabili boolena farà una copia non prenderà le variabili nei data
        this.scelta_gioco(
          "gioco_SCF_nascosto",
          "nascondi_gioco_tris",
          this.Risposta,
          text_inizio_gioco,
          "comparsa_tag"
        );
        // svuotamento dello spazio dove c'è la risposta
        text_inizio_gioco.innerHTML = "";
      } else if (this.giochi[index] === "Tris con CYBERIA") {
        this.scelta_gioco(
          "nascondi_gioco_tris",
          "gioco_SCF_nascosto",
          this.Risposta,
          text_inizio_gioco,
          "comparsa_tag"
        );
      }
    },

    all_giochi() {
      // variabile per far vedere i giochi
      this.output = "";
      // let  = (document.querySelector(".output").innerHTML = "");
      this.gioco_SCF_nascosto = false;
      this.nascondi_gioco_tris = false;
      this.comparsa_tag = false;
      // // svuotamento dello spazio dove c'è la risposta
      const text_inizio_gioco = (document.querySelector(
        ".inizio_gioco"
      ).innerHTML = "");
      // azzerato variabile
      this.conteggio = 0;
    },
    // funzione sasso carta forbice
    play_SCF() {
      this.scelta_utente = this.scelta_utente.toLowerCase();
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
        this.gioco_SCF_nascosto = false;
        this.conteggio = 0;
        if (this.score_computer > this.score_user) {
          this.output =
            "Ah, la dolce vittoria! Spero tu abbia preso appunti. A presto, campione... in seconda posizione!" +
            " CYBERIA " +
            this.score_computer +
            " umano " +
            this.score_user;
        } else {
          this.output = "mi sono stancata di giocare quindi smettiamo qua";
        }
        this.comparsa_tag = false;
      } else {
        this.conteggio++;
        // numero random del computer che pescherà una valore dentro ad array risposte
        let computer_scelta = Math.floor(Math.random() * this.scelte.length);
        // se si pareggia
        if (this.scelta_utente === this.scelte[computer_scelta]) {
          this.output = ` ho scelto ${this.scelte[computer_scelta]} abbiamo pareggiato`;
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
          this.output = ` ho scelto ${this.scelte[computer_scelta]} ti è andata bene hai vinto`;
        }
        // se si perde
        else {
          this.score_computer++;
          this.output = ` ho scelto ${this.scelte[computer_scelta]} sorry , ma ho vinto e godo`;
        }
      }
    },
    indexsquare(index) {
      // controllo se caselle finiscono
      this.counter_block++;
      // cambio variabile in true per utente
      this.gioco_tris[index].bg_user = true;
      // messo cella in array
      this.array_check_user.push(index);
      // controllo se ritorna una combinazione corretta
      // controlla le variabili se quelle di user sono gia attive e se ci sono gia alcune del computer attive
      if (
        this.controller_tris(this.array_winners, this.array_check_user) === true
      ) {
        this.reset_tris(
          this.gioco_tris,
          this.array_check_user,
          this.array_check_computer
        );
        alert("hai vinto");
        this.counter_block = "";
      } else if (this.counter_block === 5) {
        // se caselle finiscono
        this.reset_tris(
          this.gioco_tris,
          this.array_check_user,
          this.array_check_computer
        );
        alert("parita");
        this.counter_block = "";
      } else {
        while (true) {
          // crea un numero random
          let computer_scelta_tris = Math.floor(
            Math.random() * this.gioco_tris.length
          );
          // controlla le variabili se quelle di user sono gia attive e se ci sono gia alcune del computer attive
          if (
            this.gioco_tris[computer_scelta_tris].bg_user !== true &&
            this.gioco_tris[computer_scelta_tris].bg_computer !== true
          ) {
            // metti scelte computer in array
            this.array_check_computer.push(computer_scelta_tris);
            // controllo se ci sono delle corrispondenze
            if (
              this.controller_tris(
                this.array_winners,
                this.array_check_computer
              ) === true
            ) {
              // metodo per pulire il gioco
              alert("ha vinto CYBERIA");
              this.reset_tris(
                this.gioco_tris,
                this.array_check_user,
                this.array_check_computer
              );

              this.counter_block = "";
            } else {
              setTimeout(() => {
                this.gioco_tris[computer_scelta_tris].bg_computer = true;
              }, 1000);
            }
            // fine ciclo
            break;
          }
        }
      }
    },
    controller_tris(array_win, array_player) {
      // controlla se uno degli array in array_winner contiene tutti gli elementi di arraycheck
      // non fare contrario , tutti gli elementi in array_check_user devono essere in in arraywinter[i] se no ritorna false perchè
      //  es la combinazione 0, 1, 2, 5 non è presente in nessun array[i]
      return array_win.some((combinations) =>
        combinations.every((element) => array_player.includes(element))
      );
    },
    reset_tris(reset_gioco, reset_player, reset_computer) {
      // reset di tutto il gioco
      reset_player.length = 0;
      reset_computer.length = 0;
      reset_gioco.forEach(
        (element) => ((element.bg_computer = false), (element.bg_user = false))
      );
    },
    scelta_gioco(game_SCF, game_tris, computer_message, text_start, button) {
      this[game_SCF] = true;
      this[game_tris] = false;
      // fa vedere la frase base
      // PS se si cambia il posizionamento di "sasso carta forbice con CYBERIA", nell'arry giochi bisogna cambiare l'indice di this.risposta[0]
      store.transformElement(computer_message, text_start);
      setTimeout(() => {
        this[button] = true;
      }, computer_message.length * 100);
    },
  },
};
</script>

<template>
  <div class="container">
    <div class="row">
      <div
        class="col-12 col-sm-6 text-white fs-5 my-3 justify-content-center d-flex"
        v-if="!gioco_SCF_nascosto && !nascondi_gioco_tris"
        v-for="(gioco, i) in giochi"
      >
        <div
          class="card bg-transparent"
          style="width: 18rem; min-height: 300px"
        >
          <img
            src="../../public/img/Progetto senza titolo (2).png"
            class="card-img-top"
            :alt="i"
          />
          <div class="card-body">
            <a href="#" class="btn-page" @click="Game(i)">play</a>
            <h5 class="card-title mt-3">{{ gioco }}</h5>
          </div>
        </div>
      </div>
      <div class="inizio_gioco fs-5 my-4 text-start"></div>
      <div v-if="nascondi_gioco_tris" class="col-12">
        <h5>gioca del tris</h5>
        <div
          class="btn-group my-3"
          role="group"
          aria-label="Basic example"
          v-if="comparsa_tag"
        >
          <button type="button" class="btn-page" @click="all_giochi()">
            torna ai giochi
          </button>
        </div>
        <!-- gioco tris la condizione se bg_user vero aggiunge classe se falso controlla se bg_computer è vero aggiunge classe se no niente  -->
        <div class="container-tris">
          <div
            v-for="(number, i) in gioco_tris"
            :key="i"
            class="square d-flex justify-content-center align-items-center"
            @click="indexsquare(i)"
            :class="
              number.bg_user
                ? 'backgroud-tris-user-js'
                : number.bg_computer
                ? 'backgroud-tris-computer-js'
                : ''
            "
          >
            <div v-if="number.bg_user">User</div>
            <div v-if="number.bg_computer">CYBERIA</div>
          </div>
        </div>
      </div>
      <div v-if="gioco_SCF_nascosto" class="col-12">
        <div
          class="btn-group my-3"
          role="group"
          aria-label="Basic example"
          v-if="comparsa_tag"
        >
          <button type="button" class="btn-page" @click="all_giochi()">
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
            <div class="btn-group px-4" role="group" aria-label="Basic example">
              <button type="button" class="btn-page" @click="play_SCF">
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
        <span class="output fs-5 text-start">
          {{ output }}
        </span>
      </div>
      <h4>quando mi verrà voglia metterò altri giochi</h4>
    </div>
  </div>
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
.container-tris {
  width: 50%;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  .square {
    width: calc(100% / 3);
    height: 200px;
    backdrop-filter: blur(10px);
    border: 1px solid black;
  }
}

.backgroud-tris-user-js {
  background-color: green;
  opacity: 0.7;
}

.backgroud-tris-computer-js {
  background-color: blue;
  font-family: $font_cyberia;
  opacity: 0.7;
}

.card-body {
  background-color: $background_text;
  // backdrop-filter: blur(10px);
  color: white;
}

@media screen and (max-width: 870px) {
  .container-tris {
    width: 100%;
  }
}
</style>
