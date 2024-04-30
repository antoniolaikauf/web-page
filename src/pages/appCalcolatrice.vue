<script>
export default {
  name: "calculator",

  data() {
    return {
      pulsanti: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "+", "-", "x", "/", "="],
      risultato: " ",
      console: "",
      Number_1: "",
      Number_2: "",
      position: "",
    };
  },
  methods: {
    number_selected(Nindex) {
      this.console += this.pulsanti[Nindex]; // concatena tutta la stringa

      // Trova la posizione del primo operatore matematico
      for (let i = 10; i < this.pulsanti.length; i++) {
        if (this.console.includes(this.pulsanti[i])) {
          this.position = this.console.indexOf(this.pulsanti[i]);
          break; // Esci dal ciclo una volta trovato l'operatore
        }
      }
      console.log(this.position);
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
