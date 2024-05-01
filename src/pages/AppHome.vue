<script>
import { store } from "../store";

export default {
  name: "AppHome",
  data() {
    return {
      // frasi per che verranno inserite tramite js
      text: "salve sono CYBERIA benvenuto nella pagina web di Antonio",
      text_descrizione:
        "Ora tocca a te scegliere: vuoi misurarti in una sfida contro di me o preferisci navigare nel vasto mare del digitale? Ecco alcune destinazioni per iniziare il tuo viaggio",
      // variabile per funzione timer
      time: 0,
      // variabile per array argomenti
      text_visibile: false,
      // ariabile per caricamento pagina
      text_caricamento: false,
      // timer usato per settimeout
      timeComparsa: 50,
      // array con dentro argomenti riguardanti il proprietario
      suggestions: [
        {
          title: "Lex Fridman",
          URL: "https://www.youtube.com/@lexfridman",
          description:
            "Unisce conversazioni profonde e riflessioni sull'intelligenza artificiale, filosofia, e la condizione umana. Lex Fridman attrae menti brillanti da tutto il mondo in dialoghi che sfidano, educano e ispirano, offrendo nuove prospettive su tecnologia e umanità.",
        },
        {
          title: "Andrew Huberman",
          URL: "https://www.youtube.com/@hubermanlab",
          description:
            "Immergiti nelle profondità del cervello umano con Andrew Huberman. I suoi video, un ponte tra scienza e vita quotidiana, offrono intuizioni preziose su sonno, stress e prestazioni cognitive, rendendo la neuroscienza accessibile a tutti.",
        },
        {
          title: "Andrej Karpathy",
          URL: "https://www.youtube.com/@AndrejKarpathy",
          description:
            "Esplora i confini dell'intelligenza artificiale con Andrej Karpathy. Le sue spiegazioni chiarificatrici su IA e machine learning sono indispensabili per chiunque voglia capire o lavorare con le tecnologie che stanno definendo il futuro.",
        },
        {
          title: "freeCodeCamp",
          URL: "https://www.youtube.com/@freecodecamp",
          description:
            "Il tuo trampolino di lancio nel mondo della programmazione. freeCodeCamp guida principianti e professionisti attraverso tutorial di sviluppo web e programmazione, rendendo l'apprendimento delle competenze tecniche accessibile e totalmente gratuito.",
        },
        {
          title: "George Hotz",
          URL: "https://www.youtube.com/@geohotarchive",
          description:
            "Un viaggio nel cuore dell'innovazione tecnologica con George Hotz, aka geohot. Le sue live session di programmazione e riflessioni sull'IA e sulla sicurezza informatica ti danno uno sguardo diretto nella mente di un genio hacker.",
        },
      ],
    };
  },
  mounted() {
    this.time = 3000;
    setTimeout(() => {
      this.time = 0;
      this.text_caricamento = true;
      // variabili che prendono il contenitore dove ci comparirà del testo
      const place_text = document.getElementById("text-container");
      const place_text_descrizione_page = document.querySelector(".text-descrizione");
      // funzione chiamata dallo store
      store.transformElement(this.text, place_text);

      timer(this.timeComparsa * this.text.length, this.text_descrizione, place_text_descrizione_page);
      // funzione per tempo comparsa testo
      function timer(previous_sentence, sentence, space) {
        setTimeout(() => {
          store.transformElement(sentence, space);
        }, previous_sentence);
      }
      // variabile che conterra il tempo che ci mette per le scritte
      this.time = (this.text.length + this.text_descrizione.length) * this.timeComparsa;
      // metodo per comparsa array argomenti
      setTimeout(() => {
        this.text_visibile = true;
        // script carousel swiper ritardato per dare classi a carosello
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
    <i class="fa-solid fa-spinner loading my-3"></i>
    <div class="barra-caricamento" :style="{ 'animation-duration': `${time}ms` }"></div>
  </div>
  <div>
    <h3 id="text-container" class="text-start"></h3>
  </div>
  <p class="text-white fs-5 fw-bold my-3 text-base" :class="text_caricamento ? 'animazione' : 'd-none'">
    Ciao sono antonio, sono un ragazzo di 23 anni nato a san pellegrino terme in provincia di bergamo . <br />
    ho iniziato a programmare nel 2023 ( speravo di scoprire questo campo molto prima, ma come si dice meglio tardi che mai) ora CYBERIA ti farà
    vedere le poche cose che si potra fare su questa pagina praticamente nulla
  </p>

  <div class="row">
    <div class="col-12">
      <div class="text-descrizione fs-5 text-start"></div>
    </div>
    <div v-if="text_visibile">
      <h5 class="my-3 fw-bold">Ecco alcuni canali che ho ritenuto molto interessanti</h5>
      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide p-3" v-for="(recommendation, i) in suggestions">
            <a :href="recommendation.URL" target="_blank">
              <h5>
                {{ recommendation.title }}
              </h5>
              <p>
                {{ recommendation.description }}
              </p>
            </a>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;

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
.text-caricamento,
.swiper p {
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
  background-color: $background_text;
  border-radius: 10px;
}
</style>
