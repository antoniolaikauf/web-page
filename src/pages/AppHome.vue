<script>
import { store } from "../store";

export default {
  name: "AppHome",
  data() {
    return {
      // frasi per comparirle
      text: "salve sono cyberia l'intelligenza artificiale di antonio si trova nella sezione home",
      text_descrizione:
        "ok ora si può andare nella pagina about se vuoi sapere di più sulla storia di antonio",
      text_skils:
        "o puoi guardare sotto dove ci saranno i linguaggidi programmazione che antonio ha imparato e qualche link di riferimento che ha trovato molto utile nel suo percorso",
    };
  },
  mounted() {
    // variabili che prendono il contenitore dove ci comparirà del testo
    const place_text = document.getElementById("text-container");
    const place_text_descrizione = document.querySelector(".text-descrizione");
    const place_text_skils = document.querySelector(".text-skils");
    // funzione chiamata dallo store
    store.transformElement(this.text, place_text);


    timer(
      100 * this.text.length,
      this.text_descrizione,
      place_text_descrizione
    );

    // variabile per comparsa del secondo testo
    const time = (this.text.length + this.text_descrizione.length) * 100;
    timer(time, this.text_skils, place_text_skils);

    // funzione per tempo comparsa testo
    function timer(frase_prima, frase, spazio) {
      setTimeout(() => {
        store.transformElement(frase, spazio);
      }, frase_prima);
    }
  },
};
</script>

<template>
  <div>
    <h3 id="text-container"></h3>
  </div>
  <p class="text-black fs-5 fw-bold">
    ciao sono antonio, sono un ragazzo di 23 anni nato a san pellegrino terme in
    provincia di bergamo . <br />
    ho iniziato a programmare nel 2023 ( speravo di scoprire questo campo molto
    prima, ma come si dice meglio tardi che mai) ora cyberia ti farà vedere le
    poche cose che si potra fare su questa pagina praticamente quasi nulla
    essendo che è una pagina dedicata a me
  </p>
  <div class="text-descrizione"></div>
  <div class="text-skils"></div>
</template>

<style lang="scss">
@import "./../style/general.scss";
</style>
