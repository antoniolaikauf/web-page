<script>
import { store } from "../store";

export default {
  name: "AppHome",
  data() {
    return {
      // frasi per che verranno inserite tramite js
      text: "salve sono CYBERIA benvenuto nella pagina web di antonio",
      text_descrizione: "ok ora può decidere se vuole sfidarmi a dei giochi",
      text_skils:
        "o puoi guardare sotto dove ci saranno alcuni link che antonio ha trovato molto utili",
      // variabile per funzione timer
      time: 0,
      // variabile per array argomenti
      text_visibile: false,

      text_caricamento: false,

      // array con dentro argomenti riguardanti il proprietario
      argomenti: [
        {
          title: "Lex Fridman",
          URL: "https://www.youtube.com/@lexfridman",
          descrizione:
            "Unisce conversazioni profonde e riflessioni sull'intelligenza artificiale, filosofia, e la condizione umana. Lex Fridman attrae menti brillanti da tutto il mondo in dialoghi che sfidano, educano e ispirano, offrendo nuove prospettive su tecnologia e umanità.",
        },
        {
          title: "Andrew Huberman",
          URL: "https://www.youtube.com/@hubermanlab",
          descrizione:
            "Immergiti nelle profondità del cervello umano con Andrew Huberman. I suoi video, un ponte tra scienza e vita quotidiana, offrono intuizioni preziose su sonno, stress e prestazioni cognitive, rendendo la neuroscienza accessibile a tutti.",
        },
        {
          title: "Andrej Karpathy",
          URL: "https://www.youtube.com/@AndrejKarpathy",
          descrizione:
            "Esplora i confini dell'intelligenza artificiale con Andrej Karpathy. Le sue spiegazioni chiarificatrici su IA e machine learning sono indispensabili per chiunque voglia capire o lavorare con le tecnologie che stanno definendo il futuro.",
        },
        {
          title: "freeCodeCamp",
          URL: "https://www.youtube.com/@freecodecamp",
          descrizione:
            "Il tuo trampolino di lancio nel mondo della programmazione. freeCodeCamp guida principianti e professionisti attraverso tutorial di sviluppo web e programmazione, rendendo l'apprendimento delle competenze tecniche accessibile e totalmente gratuito.",
        },
        {
          title: "George Hotz",
          URL: "https://www.youtube.com/@geohotarchive",
          descrizione:
            "Un viaggio nel cuore dell'innovazione tecnologica con George Hotz, aka geohot. Le sue live session di programmazione e riflessioni sull'IA e sulla sicurezza informatica ti danno uno sguardo diretto nella mente di un genio hacker.",
        },
      ],
    };
  },
  mounted() {
    this.time = 4000;
    setTimeout(() => {
      this.time = 0;
      this.text_caricamento = true;
      // variabili che prendono il contenitore dove ci comparirà del testo
      const place_text = document.getElementById("text-container");
      const place_text_descrizione =
        document.querySelector(".text-descrizione");
      const place_text_skils = document.querySelector(".text-skils");
      // funzione chiamata dallo store
      store.transformElement(this.text, place_text);

      timer(
        100 * this.text.length,
        this.text_descrizione,
        place_text_descrizione
      );

      // // variabile per comparsa del secondo testo
      const time = (this.text.length + this.text_descrizione.length) * 100;
      timer(time, this.text_skils, place_text_skils);

      // funzione per tempo comparsa testo
      function timer(frase_prima, frase, spazio) {
        setTimeout(() => {
          store.transformElement(frase, spazio);
        }, frase_prima);
      }
      // // variabile che conterra il tempo che ci mette per le scritte
      this.time = time + this.text_skils.length * 100;
      // metodo per comparsa array argomenti
      setTimeout(() => {
        this.text_visibile = true;
        // script carousel swiper
        setTimeout(() => {
          var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 100,
              modifier: 1,
              slideShadows: true,
            },
            pagination: {
              el: ".swiper-pagination",
            },
          });
        }, 10);
      }, this.time);
    }, this.time);
  },
};
</script>

<template>
  <div v-if="!text_caricamento" class="my-3">
    <h3 class="text-white text-caricamento">caricamento</h3>
    <i class="fa-solid fa-spinner loading my-3 text-white"></i>
    <div
      class="barra-caricamento"
      :style="{ 'animation-duration': `${time}ms` }"
    ></div>
  </div>
  <div>
    <h3 id="text-container" class="text-start text-white"></h3>
  </div>
  <p
    class="text-white fs-5 fw-bold my-3 text-base"
    :class="text_caricamento ? 'animazione' : 'd-none'"
  >
    Ciao sono antonio, sono un ragazzo di 23 anni nato a san pellegrino terme in
    provincia di bergamo . <br />
    ho iniziato a programmare nel 2023 ( speravo di scoprire questo campo molto
    prima, ma come si dice meglio tardi che mai) ora cyberia ti farà vedere le
    poche cose che si potra fare su questa pagina praticamente nulla
  </p>

  <div class="row">
    <div class="col-12 col-md-6">
      <div class="text-descrizione fs-5 text-start text-white"></div>
    </div>

    <div class="col-12 col-md-6">
      <div class="text-skils fs-5 text-start text-white"></div>
    </div>

    <div v-if="text_visibile">
      <h5 class="my-3 text-white fw-bold">
        Ecco alcuni canali che ho ritenuto molto interessanti
      </h5>
      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide p-3" v-for="(argomento, i) in argomenti">
            <a :href="argomento.URL" target="_blank">
              <h5>
                {{ argomento.title }}
              </h5>
              <p class="text-white">
                {{ argomento.descrizione }}
              </p>
            </a>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";

@import "./../style/partials/variable";

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

#text-container,
.text-descrizione,
.text-skils,
.text-caricamento {
  font-family: $font_cyberia;
}

.animazione {
  border-radius: 20px;
  padding: 20px;
  backdrop-filter: blur(10px);
  background-color: rgba(128, 0, 128, 0.314);
  display: block;
  animation-name: descrizionePersona;
  animation-duration: 2s;
}

@keyframes descrizionePersona {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

// css carousel
html,
body {
  position: relative;
  height: 100%;
}

body {
  background: #eee;
  font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
  font-size: 14px;
  color: #000;
  margin: 0;
  padding: 0;
}

.swiper {
  width: 100%;
  padding-top: 50px;
  padding-bottom: 50px;
  animation-name: descrizionePersona;
  animation-duration: 2s;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
  width: 300px;
  height: 300px;
  background-color: rgba(0, 0, 0, 0.397);
  border-radius: 10px;
}
</style>
