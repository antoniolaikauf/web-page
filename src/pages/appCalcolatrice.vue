<script>
export default {
  name: "calculator",

  data() {
    return {
      pulsanti: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "+", "-", "*", "/", "="],
      risultato: " ",
      console: "",
      number: "",
    };
  },
  methods: {
    number_selected(Nindex) {
      this.console += this.pulsanti[Nindex]; // concatena tutta la stringa
      //   if (this.console === "") alert("inserisci un numero");
      if ("=" === this.pulsanti[Nindex] && this.pulsanti.length >= 2) this.calculation(this.number);
      var regex = /[\+\-\*\/]|(\d+)/g; // prima parte corrisponde a tutti gli operatori la seconda parte corrisponde ai numeri
      this.number = this.console.match(regex); //  ritorna un array che con delle corrispondenze con l'espressione inserita dentro il metodo match
    },
    calculation(ArrayNumebers) {
      for (let i = 0; i < ArrayNumebers.length; i++) {
        console.log(ArrayNumebers[i]);
      }
    },
  },
};
</script>
<template>
  <section>
    <div class="calculator">
      <div class="number" v-for="(pulsante, i) in pulsanti" @click="number_selected(i)">{{ pulsante }}</div>
    </div>
    <div>{{ risultato }}</div>
  </section>
</template>
<style lang="scss" scoped>
.calculator {
  width: 50%;
  margin: auto;
  border: 1px solid black;
  display: flex;
  flex-wrap: wrap;
  .number {
    background-color: black;
    margin: 10px;
    width: calc((100% / 5) - 20px);
  }
  .operator {
    margin: 10px;
    width: calc((100% / 4) - 20px);
    background-color: black;
  }
}
</style>
