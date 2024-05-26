<script>
export default {
  name: "calculator",

  data() {
    return {
      pulsanti: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "+", "-", "*", "/", "="],
      complex_operators: ["Log", "&#8730;", "Pow", "Sin", "Cos"],
      console: "",
      numbers: "",
      number1: "",
      number2: "",
      result: "",
      operationShow: "",
    };
  },

  // sistemare la calcolatrice non fare con due metodi ma cercare di farlo tutto insiem
  methods: {
    calculation(Nindex) {
      this.console += this.pulsanti[Nindex];
      this.console = this.console.replace(/([+\-*/])\1+/g, "$1"); // [+\-*/] cerca i caratteri, \1+/g questo permette di continuare a cercare
      var regex = /[\+\-\*\/]|(\d+)/g; // prima parte corrisponde a tutti gli operatori la seconda parte corrisponde ai numeri
      this.numbers = this.console.match(regex); //  ritorna un array che con delle corrispondenze con l'espressione inserita dentro il metodo match
      this.operationShow = this.numbers.join("");
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
      this.operationShow = "";
    },
    calculation_complex(Oindex) {
      this.deleteResult();

      while (true) {
        if (this.complex_operators[Oindex] === "Sin" || this.complex_operators[Oindex] === "Cos" || this.complex_operators[Oindex] === "&#8730;")
          this.number1 = parseInt(prompt(`Inserisci il valore`));
        else {
          this.number1 = parseInt(prompt(`Inserisci primo valore per ${this.complex_operators[Oindex]}`));
          this.number2 = parseInt(prompt(`Inserisci secondo valore per ${this.complex_operators[Oindex]}`));
        }
        if (!isNaN(this.number1) || !isNaN(this.number2)) break;
      }
      if (this.complex_operators[Oindex] === "Log") this.result = Math.log(this.number1) / Math.log(this.number2);
      if (this.complex_operators[Oindex] === "&#8730;") this.result = Math.sqrt(this.number1);
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
        <span>{{ operationShow }}</span>
        <h5>{{ result }}</h5>
      </div>
      <!-- <hr /> -->
      <div class="keys d-flex">
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
  <section class="description d-flex justify-content-end">
    <p>
      Ecco una piccola calcolatrice con cui puoi eseguire operazioni matematiche. Per l'utilizzo dei primi quattro operatori, apparirà uno spazio in
      cui inserire i numeri. Se si desidera utilizzare il logaritmo, si inserisce prima l'argomento e poi la base; invece, se si vuole utilizzare la
      potenza, si inserisce prima la base e poi l'esponente.
    </p>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;

.results {
  height: 80px;
  border-bottom: 1px solid rgba(128, 128, 128, 0.295);
  text-align: end;
  margin-top: 5px;
  margin-right: 5px;
}
.calculator {
  width: 30%;
  background: #313335;
  border: 1px solid $black;
  border-radius: 10px;
  .keys {
    flex-wrap: wrap;
    padding: 5px;
  }
  .number,
  .calculation-complex {
    margin: 1px;
    width: calc((100% / 5) - 2px);
    border-radius: 3px;
    padding: 10px 0px;
  }
  .number {
    background-color: #444746;
  }
  .calculation-complex {
    background-color: #9e9e9e;
  }
}

.description {
  p {
    margin-top: 50px;
    width: 50%;
    text-align: start;
  }
}

@media screen and (max-width: 560px) {
  .calculator,
  .description > p {
    width: 100%;
  }
}
</style>
