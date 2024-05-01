<script>
export default {
  name: "calculator",

  data() {
    return {
      pulsanti: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "+", "-", "*", "/", "="],
      console: "",
      number: "",
      result: "",
      complex_operators: ["log", "radice", "esp", "sin", "cos"],
    };
  },
  methods: {
    calculation(Nindex) {
      this.console += this.pulsanti[Nindex]; // concatena tutta la stringa
      var regex = /[\+\-\*\/]|(\d+)/g; // prima parte corrisponde a tutti gli operatori la seconda parte corrisponde ai numeri
      this.number = this.console.match(regex); //  ritorna un array che con delle corrispondenze con l'espressione inserita dentro il metodo match
      if ("=" === this.pulsanti[Nindex] && this.number.length <= 2) {
        // controllo se utente ha inserito almeno un operatore e due numeri
        alert("devi inserire un operatore o piu numeri ");
        this.deleteResult();
      } else if ("=" === this.pulsanti[Nindex] && this.number.length >= 2) this.result = eval(this.number.join(" ")); // trasforma una stringa e la esegue come se fosse del codice
    },
    deleteResult() {
      this.result = "";
      this.number = "";
      this.console = "";
    },
    calculation_complex(Oindex) {

    },
  },
};
</script>
<template>
  <section>
    <div class="calculator">
      <div class="number" v-for="(pulsante, i) in pulsanti" @click="calculation(i)">{{ pulsante }}</div>
      <div class="calculation-complex" v-for="(complex_operator, i) in complex_operators" @click="calculation_complex(i)">{{ complex_operator }}</div>
    </div>
    <div>
      <button class="btn-page my-3" @click="deleteResult">Cancella risultato</button>
    </div>
    <h5>{{ result }}</h5>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
.calculator {
  width: 50%;
  margin: auto;
  border: 1px solid black;
  display: flex;
  flex-wrap: wrap;
  .number,.calculation-complex {
    background-color: black;
    margin: 10px;
    width: calc((100% / 5) - 20px);
  }
}
</style>
