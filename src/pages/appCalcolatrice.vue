<script>
export default {
  name: "calculator",

  data() {
    return {
      pulsanti: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0, "+", "-", "x", "/", "="],
      risultato: "fffffffff",
    };
  },
  methods: {
    number_selected(Nindex) {
      console.log(Nindex);
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
