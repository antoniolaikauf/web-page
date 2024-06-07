<script>
import { store } from "../store";
export default {
  name: "AppGioco",
  data() {
    return {
      game_for_user: [
        // questo indice lasciare sullo 0 se si vuole cambiare cambiare anche la funzione gioco_sasso_carta_forbice
        "Sasso Carta Forbice con CYBERIA",
        "Tris con CYBERIA",
        "Indovina il numero con CYBERIA",
      ],
      // variabile conrisposta
      answer: "giochiamo!!",
      // variabile per comparsa e scomparsa  tag
      variable_game_SCF: false,
      variable_game_tris: false,
      variable_game_indovino: false,
      // variabile per gioco
      choise_user: "",
      // scelte del computer per gioco
      choises: ["sasso", "carta", "forbice"],
      // variabile che serve per il gioco cosi che il programma smetta automaticamete
      count: 0,
      // scelta computer di quante volte vuole giocare
      choise_computer: Math.floor(Math.random() * (10 - 3) + 3),
      // conteggio per utente
      score_user: 0,
      // conteggio computer
      score_computer: 0,
      // output risultato
      output: "",
      // gioco tris
      game_tris: [
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
      // variabili per gioco indovio
      number_CYBERIA: 0,
      number_user: "",
      output_indovino: "",
    };
  },
  methods: {
    // fuzione per scelta risposte e per seleionare il gioco
    Game(index) {
      this.output = "";
      // variabile dove verrà inserita la frase per l'utente
      const text_inizio_gioco = document.querySelector(".inizio_gioco");
      if (this.game_for_user[index] === "Sasso Carta Forbice con CYBERIA") {
        // azzeramento dello score
        this.score_computer = 0;
        this.score_user = 0;
        this.choise_user = "";
        // queste all'interno della funzione sono le variabili e messe cosi perche variabili boolena farà una copia non prenderà le variabili nei data
        this.scelta_gioco("variable_game_SCF", "variable_game_tris", "vvariable_game_indovino", this.answer, text_inizio_gioco);
        // svuotamento dello spazio dove c'è la risposta
        text_inizio_gioco.innerHTML = "";
      } else if (this.game_for_user[index] === "Tris con CYBERIA")
        this.scelta_gioco("variable_game_tris", "variable_game_SCF", "variable_game_indovino", this.answer, text_inizio_gioco);
      else if (this.game_for_user[index] === "Indovina il numero con CYBERIA") {
        this.number_CYBERIA = Math.floor(Math.random() * 50) + 1;
        this.scelta_gioco("variable_game_indovino", "variable_game_SCF", "variable_game_tris", this.answer, text_inizio_gioco);
      }
    },
    all_giochi() {
      // variabile per far vedere i giochi e resettare tutti i parametri
      this.output = "";
      this.variable_game_SCF = false;
      this.variable_game_tris = false;
      this.variable_game_indovino = false;
      this.output_indovino = "";
      // // svuotamento dello spazio dove c'è la risposta
      const text_inizio_gioco = (document.querySelector(".inizio_gioco").innerHTML = "");
      // azzerato variabile
      this.count = 0;
    },
    // funzione sasso carta forbice
    play_SCF() {
      this.choise_user = this.choise_user.toLowerCase();
      // decisione conteggio sarebbe quante volte ha deciso di giocare il computer
      // e se è uguale a conteggio (che sarebbero quante volte ha premuto play l'utente) il comuter riporta automaticamente alla pagina play
      if (!this.choises.includes(this.choise_user)) alert("devi scrivere sasso carta o forbice"); // controllo del input dove utente iserisce il dato
      // controllo se conteggio è uguale a decisione computer
      else if (this.count === this.choise_computer) {
        const text_inizio_gioco = (document.querySelector(".inizio_gioco").innerHTML = "");
        this.variable_game_SCF = false;
        this.count = 0;
        // se ha vinto CYBERIA
        if (this.score_computer > this.score_user) {
          this.output =
            "Ah, la dolce vittoria! Spero tu abbia preso appunti. A presto, campione... in seconda posizione!" +
            " CYBERIA " +
            this.score_computer +
            " umano " +
            this.score_user;
        } else this.output = "Mi sono stancata di giocare quindi smettiamo qua"; // se ha vinto user
      } else {
        this.count++;
        // numero random del computer che pescherà una valore dentro ad array risposte
        let computer_scelta = Math.floor(Math.random() * this.choises.length);
        // se si pareggia
        if (this.choise_user === this.choises[computer_scelta]) this.output = ` ho scelto ${this.choises[computer_scelta]} abbiamo pareggiato`;
        // se si vince
        else if (
          (this.choise_user === "sasso" && this.choises[computer_scelta] == "forbice") ||
          (this.choise_user === "carta" && this.choises[computer_scelta] == "sasso") ||
          (this.choise_user === "forbice" && this.choises[computer_scelta] == "sasso")
        ) {
          this.score_user++;
          this.output = ` ho scelto ${this.choises[computer_scelta]} ti è andata bene hai vinto`;
        }
        // se si perde
        else {
          this.score_computer++;
          this.output = ` ho scelto ${this.choises[computer_scelta]} sorry , ma ho vinto e godo`;
        }
      }
    },
    indexsquare(index) {
      // controllo se caselle finiscono
      this.counter_block++;
      if (this.array_check_computer.includes(index)) {
        this.reset_tris(this.game_tris, this.array_check_user, this.array_check_computer, "counter_block");
        alert("hai sbagliato quella casella è già occupata");
      } else {
        // cambio variabile in true per utente
        this.game_tris[index].bg_user = true;
        // messo cella in array
        this.array_check_user.push(index);
        // controllo se ritorna una combinazione corretta
        // controlla le variabili se quelle di user sono gia attive e se ci sono gia alcune del computer attive
        if (this.controller_tris(this.array_winners, this.array_check_user) === true) {
          this.reset_tris(this.game_tris, this.array_check_user, this.array_check_computer, "counter_block");
          alert("hai vinto");
        } else if (this.counter_block === 5) {
          // se caselle finiscono
          this.reset_tris(this.game_tris, this.array_check_user, this.array_check_computer, "counter_block");
          alert("abbiamo pareggiato");
        } else {
          while (true) {
            // crea un numero random
            let computer_scelta_tris = Math.floor(Math.random() * this.game_tris.length);
            // controlla le variabili se quelle di user sono gia attive e se ci sono gia alcune del computer attive
            if (!this.game_tris[computer_scelta_tris].bg_user && !this.game_tris[computer_scelta_tris].bg_computer) {
              // metti scelte computer in array
              this.array_check_computer.push(computer_scelta_tris);
              // controllo se ci sono delle corrispondenze
              if (this.controller_tris(this.array_winners, this.array_check_computer) === true) {
                // metodo per pulire il gioco
                alert("ha vinto CYBERIA");
                this.reset_tris(this.game_tris, this.array_check_user, this.array_check_computer, "counter_block");
              } else {
                setTimeout(() => {
                  this.game_tris[computer_scelta_tris].bg_computer = true;
                }, 100);
              }
              // fine ciclo
              break;
            }
          }
        }
      }
    },
    controller_tris(array_win, array_player) {
      // controlla se uno degli array in array_winner contiene tutti gli elementi di arraycheck
      // non fare contrario , tutti gli elementi in array_check_user devono essere in in arraywinter[i] se no ritorna false perchè
      //  es la combinazione 0, 1, 2, 5 non è presente in nessun array[i]
      return array_win.some((combinations) => combinations.every((element) => array_player.includes(element)));
    },
    reset_tris(reset_gioco, reset_player, reset_computer, meter) {
      // reset di tutto il gioco
      reset_player.length = 0;
      reset_computer.length = 0;
      this[meter] = "";
      // reset dei colori
      reset_gioco.forEach((element) => ((element.bg_computer = false), (element.bg_user = false)));
    },
    scelta_gioco(game_SCF, game_tris, game_indovino, computer_message, text_start) {
      this[game_SCF] = true;
      this[game_tris] = false;
      this[game_indovino] = false;
      // fa vedere la frase base
      // PS se si cambia il posizionamento di "sasso carta forbice con CYBERIA", nell'arrey giochi bisogna cambiare l'indice di this.risposta[0]
      store.transformElement(computer_message, text_start);
    },
    indovino() {
      // si trasforma l'input inserito dall'utente in un intero
      this.number_user = parseInt(Math.ceil(this.number_user));
      // controlli per numero
      if (isNaN(this.number_user) || this.number_user <= 0 || this.number_user > 50) alert("Il numero che hai inserito non è corretto");
      // ha vinto utente
      else if (this.number_user === this.number_CYBERIA) {
        alert("hai vinto");
        this.output_indovino = "";
        this.number_user = "";
        this.number_CYBERIA = Math.floor(Math.random() * 50) + 1;
        console.log(this.number_CYBERIA);
      } else if (this.number_user < this.number_CYBERIA) this.output_indovino = "HAI DIGITATO UN NUMERO TROPPO BASSO"; // numero troppo basso
      else if (this.number_user > this.number_CYBERIA) this.output_indovino = "HAI DIGITATO UN NUMERO TROPPO ALTO"; // numero troppo alto
      this.number_user = "";
    },
  },
};
</script>

<template>
  <div class="container">
    <div class="row">
      <div>
        <h3 class="output fs-5 text-center">
          {{ output }}
        </h3>
      </div>
      <div class="d-flex container-giochi" v-if="!variable_game_SCF && !variable_game_tris && !variable_game_indovino">
        <img src="../../public/img/robot.png" alt="" />
        <div class="d-flex flex-wrap">
          <div class="col-12 col-lg-6 text-white fs-5 my-3 justify-content-center d-flex" v-for="(gioco, i) in game_for_user">
            <div class="card bg-transparent" style="width: 18rem; min-height: 300px">
              <img src="../../public/img/Progetto senza titolo (2).png" class="card-img-top" :alt="i" />
              <div class="card-body">
                <a href="#" class="btn-page" @click="Game(i)">play</a>
                <h5 class="card-title mt-3">{{ gioco }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="inizio_gioco fs-5 my-4 text-start"></div>
      <div v-if="variable_game_tris" class="col-12">
        <h5>gioca del tris</h5>
        <div class="btn-group my-3" role="group" aria-label="Basic example">
          <button type="button" class="btn-page" @click="all_giochi()">torna ai giochi</button>
        </div>
        <!-- gioco tris la condizione se bg_user vero aggiunge classe se falso controlla se bg_computer è vero aggiunge classe se no niente  -->
        <div class="container-tris">
          <div
            v-for="(number, i) in game_tris"
            :key="i"
            class="square d-flex justify-content-center align-items-center"
            @click="indexsquare(i)"
            :class="number.bg_user ? 'backgroud-tris-user-js' : number.bg_computer ? 'backgroud-tris-computer-js' : ''"
          >
            <div v-if="number.bg_user">User</div>
            <div v-if="number.bg_computer">CYBERIA</div>
          </div>
        </div>
      </div>
      <!-- gioco sasso carta forbice -->
      <div v-if="variable_game_SCF" class="col-12">
        <div class="btn-group my-3" role="group" aria-label="Basic example">
          <button type="button" class="btn-page" @click="all_giochi()">torna ai giochi</button>
        </div>
        <div class="mb-5 mt-2">
          <h5 class="text-white">scrivi sasso carta o forbice</h5>
          <div class="d-flex justify-content-center py-2 gioco align-items-center">
            <div>
              <b> score CYBERIA</b>
              {{ score_computer }}
            </div>
            <div class="btn-group px-4" role="group" aria-label="Basic example">
              <button type="button" class="btn-page" @click="play_SCF">gioca</button>
            </div>
            <div>
              score utente
              {{ score_user }}
            </div>
          </div>
          <input
            type="text"
            class="my-3 rounded border-0 p-2 text-black"
            v-model="choise_user"
            placeholder="scrivi il tuo valore "
            @keyup.enter="play_SCF"
          />
        </div>
      </div>
      <!-- gioco indovino -->
      <div v-if="variable_game_indovino" class="col-12">
        <div class="btn-group my-3" role="group" aria-label="Basic example">
          <button type="button" class="btn-page" @click="all_giochi()">torna ai giochi</button>
        </div>
        <div>
          <h2>Indovina il numero che sto pensando</h2>
          <div>Digita un numero tra 1 e 50</div>
          <div>
            <div class="btn-group my-3 ms-3" role="group" aria-label="Basic example">
              <button type="button" class="btn-page" @click="indovino">Controlla</button>
            </div>
            <div>
              <input type="text" class="text-black" v-model="number_user" @keyup.enter="indovino" />
            </div>
          </div>
          <div>
            {{ output_indovino }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
.container-giochi > img {
  width: 40%;
}

.card-body {
  background-color: $background_black;
  color: white;
}
.inizio_gioco,
.output,
.gioco,
.text-start {
  font-weight: bold;
}

.gioco {
  background-color: $background_black;
  backdrop-filter: blur(10px);
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
    border: 1px solid $black;
  }
  .backgroud-tris-user-js {
    background-color: green;
    opacity: 0.7;
  }

  .backgroud-tris-computer-js {
    background-color: blue;
    opacity: 0.7;
  }
}

// media per singoli componenti con query specifiche
@media screen and (max-width: 870px) {
  .container-tris {
    width: 100%;
  }
}

@media screen and (max-width: 1000px) {
  .container-giochi > img {
    display: none;
  }
}
</style>
