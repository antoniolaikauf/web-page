<script>
export default {
  name: "calculator",

  data() {
    return {
      pulsanti: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "+", "-", "*", "/", "="],
      console: "",
      numbers: "",
      result: "",
      complex_operators: ["Log", "&#8730;", "<div>x<sup>y</sup></div>", "Sin", "Cos"],
      number1: "",
      number2: "",
    };
  },
  methods: {
    calculation(Nindex) {
      this.console += this.pulsanti[Nindex];
      this.console = this.console.replace(/([+\-*/])\1+/g, "$1"); // [+\-*/] cerca i caratteri, \1+/g questo permette di continuare a cercare
      var regex = /[\+\-\*\/]|(\d+)/g; // prima parte corrisponde a tutti gli operatori la seconda parte corrisponde ai numeri
      this.numbers = this.console.match(regex); //  ritorna un array che con delle corrispondenze con l'espressione inserita dentro il metodo match
      if ("=" === this.pulsanti[Nindex] && this.numbers.length <= 2) {
        // controllo se utente ha inserito almeno un operatore e due numeri
        alert("devi inserire un operatore o piu numeri ");
        this.deleteResult();
      } else if ("=" === this.pulsanti[Nindex] && this.numbers.length >= 2) this.result = eval(this.numbers.join(" ")); // trasforma una stringa e la esegue come se fosse del codice
    },
    deleteResult() {
      this.result = "";
      this.numbers = "";
      this.console = "";
    },
    calculation_complex(Oindex) {
      this.deleteResult();
      while (true) {
        if (this.complex_operators[Oindex] === "Sin" || this.complex_operators[Oindex] === "Cos" || this.complex_operators[Oindex] === "Radice")
          this.number1 = parseInt(prompt(`Inserisci primo valore per ${this.complex_operators[Oindex]}`));
        else {
          this.number1 = parseInt(prompt(`Inserisci primo valore per ${this.complex_operators[Oindex]}`));
          this.number2 = parseInt(prompt(`Inserisci secondo valore per ${this.complex_operators[Oindex]}`));
        }
        if (!isNaN(this.number1) || !isNaN(this.number2)) break;
      }
      if (this.complex_operators[Oindex] === "Log") this.result = Math.log(this.number1) / Math.log(this.number2);
      if (this.complex_operators[Oindex] === "Radice") this.result = Math.sqrt(this.number1);
      if (this.complex_operators[Oindex] === "Pow") this.result = Math.pow(this.number1, this.number2);
      if (this.complex_operators[Oindex] === "Sin") this.result = Math.sin((this.number1 * Math.PI) / 180);
      if (this.complex_operators[Oindex] === "Cos") this.result = Math.cos((this.number1 * Math.PI) / 180);
    },
  },
};
</script>
<template>
  <section>
    <div class="calculator">
      <div class="results">
        <span v-for="(number, i) in numbers"> {{ number }}</span>
        <h5>{{ result }}</h5>
      </div>
      <div class="keys">
        <div class="calculation-complex" v-for="(complex_operator, i) in complex_operators" @click="calculation_complex(i)">
          <span v-html="complex_operator"></span>
        </div>
        <div class="number" v-for="(pulsante, i) in pulsanti" @click="calculation(i)">{{ pulsante }}</div>
      </div>
      <div>
        <button class="btn-page my-3" @click="deleteResult">Delete</button>
      </div>
    </div>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;

.results {
  height: 80px;
}
.calculator {
  width: 40%;
  margin: auto;
  border: 1px solid black;
  border-radius: 10px;
  .keys {
    display: flex;
    flex-wrap: wrap;
  }
  .number,
  .calculation-complex {
    background-color: black;
    margin: 2px;
    width: calc((100% / 5) - 4px);
  }

  .calculation-complex {
    background-color: rgb(44, 41, 41);
  }
}
</style>
