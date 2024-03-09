<script>
import { store } from "../store";

export default {
  name: "AppHome",
  data() {
    return {
      // frasi per che verranno inserite tramite js
      text: "salve sono cyberia l'intelligenza artificiale di antonio si trova nella sezione home",
      text_descrizione:
        "ok ora può decidere dove andare se nella pagina about dove sapra piu sulla storia di antonio",
      text_skils:
        "o puoi guardare sotto dove ci saranno i linguaggi di programmazione che antonio ha imparato e qualche link di riferimento che ha trovato molto utile nel suo percorso",
      // variabile per funzione timer
      time_tot: 0,
      // variabile per array argomenti
      text_visibile: false,

      // array con dentro argomenti riguardanti il proprietario
      argomenti: [
        {
          linguaggi: ["HTML", "CSS", "JS", "PYTHON", "PHP", "MYSQL"],
          framework: ["laravel", "vue"],
          link: [
            {
              URL: "https://www.youtube.com/@lexfridman",
              descrizione: "canale di Lex Fridman ",
            },
            {
              URL: "https://www.youtube.com/@hubermanlab",
              descrizione: "canale di Andrew Huberman ",
            },
            {
              URL: "https://www.youtube.com/@AndrejKarpathy",
              descrizione: "canale di AndrejKarpathy ",
            },
            {
              URL: "https://www.youtube.com/@freecodecamp",
              descrizione: "canale di freecodecamp ",
            },
          ],
        },
      ],
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
    // variabile che conterra il tempo che ci mette per le scritte
    this.time_tot = time + this.text_skils.length * 100;
    // metodo per comparsa array argomenti
    setTimeout(() => {
      this.text_visibile = true;
    }, this.time_tot);
  },
};
</script>

<template>
  <div v-if="!text_visibile" class="my-3">
    <h3>caricamento</h3>
    <i class="fa-solid fa-spinner loading"></i>
    <div
      class="barra-caricamento"
      :style="{ 'animation-duration': `${time_tot}ms` }"
    ></div>
  </div>
  <div>
    <h3 id="text-container"></h3>
  </div>
  <p class="text-black fs-5 fw-bold my-3">
    ciao sono antonio, sono un ragazzo di 23 anni nato a san pellegrino terme in
    provincia di bergamo . <br />
    ho iniziato a programmare nel 2023 ( speravo di scoprire questo campo molto
    prima, ma come si dice meglio tardi che mai) ora cyberia ti farà vedere le
    poche cose che si potra fare su questa pagina praticamente quasi nulla
    essendo che è una pagina dedicata a me
  </p>

  <div class="row">
    <div class="col-6"><div class="text-descrizione fs-5"></div></div>

    <div class="col-6"><div class="text-skils fs-5"></div></div>

    <div v-if="text_visibile">
      <ul v-for="(argomento, i) in argomenti">
        <h5 class="my-3">
          linguaggi che consosco fino ad ora <br />
          ( ps. non li ho tutti allo stesso livello )
          <div class="d-flex flex-wrap">
            <li v-for="linguaggo in argomento.linguaggi" class="col-2">
              {{ linguaggo }}
            </li>
          </div>
        </h5>
        <h5 class="my-3">
          questi sono i framework che conosco
          <li v-for="framework in argomento.framework">{{ framework }}</li>
        </h5>
        <h5 class="my-3">
          questi sono i canali che consiglierei, alcuni parlano di tecnologia e programmazione
          altri sul corpo umano e come funziona
          <div class="d-flex flex-wrap">
            <li v-for="links in argomento.link" class="col-3">
              <p>descrizione canale:{{ links.descrizione }}</p>
              <a :href="links.URL"> premi per guardare </a>
            </li>
          </div>
        </h5>
      </ul>
    </div>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";

.barra-caricamento {
  background: white;
  border-radius: 15px;
  height: 20px;
  animation-name: caricamento;
  animation-timing-function: linear;
}
@keyframes caricamento {
  0% {
    width: 0%;
  }
  100% {
    width: 100%;
  }
}

.loading {
  animation-name: giro;
  animation-duration: 4s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}

@keyframes giro {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
</style>
