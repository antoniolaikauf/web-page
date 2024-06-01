<script>
import { store } from "../store";
import.meta.env.VITE_API_KEY
import axios from "axios";
export default {
  name: "Traslate",
  data() {
    return {
      languages: [
        { name: "Abkhazian", language: "ab" },
        { name: "Arabic", language: "ar" },
        { name: "Aragonese", language: "an" },
        { name: "Armenian", language: "hy" },
        { name: "Azerbaijani", language: "az" },
        { name: "Belarusian", language: "be" },
        { name: "Bengali", language: "bn" },
        { name: "Bosnian", language: "bs" },
        { name: "Bulgarian", language: "bg" },
        { name: "Chinese", language: "zh" },
        { name: "Church Slavonic", language: "cu" },
        { name: "Croatian", language: "hr" },
        { name: "Czech", language: "cs" },
        { name: "Danish", language: "da" },
        { name: "Dutch", language: "nl" },
        { name: "English", language: "en" },
        { name: "Estonian", language: "et" },
        { name: "French", language: "fr" },
        { name: "Gaelic", language: "gd" },
        { name: "Galician", language: "gl" },
        { name: "Georgian", language: "ka" },
        { name: "German", language: "de" },
        { name: "Greek", language: "el" },
        { name: "Haitian", language: "ht" },
        { name: "Hindi", language: "hi" },
        { name: "Hungarian", language: "hu" },
        { name: "Icelandic", language: "is" },
        { name: "Indonesian", language: "id" },
        { name: "Irish", language: "ga" },
        { name: "Italian", language: "it" },
        { name: "Japanese", language: "ja" },
        { name: "Kannada", language: "kn" },
        { name: "Kongo", language: "kg" },
        { name: "Korean", language: "ko" },
        { name: "Kuanyama", language: "kj" },
        { name: "Kurdish", language: "ku" },
        { name: "Lao", language: "lo" },
        { name: "Lithuanian", language: "lt" },
        { name: "Luxembourgish", language: "lb" },
        { name: "Macedonian", language: "mk" },
        { name: "Maltese", language: "mt" },
        { name: "Maori", language: "mi" },
        { name: "Nepali", language: "ne" },
        { name: "Norwegian", language: "no" },
        { name: "Persian", language: "fa" },
        { name: "Polish", language: "pl" },
        { name: "Portuguese", language: "pt" },
        { name: "Romanian", language: "ro" },
        { name: "Russian", language: "ru" },
        { name: "Serbian", language: "sr" },
        { name: "Slovak", language: "sk" },
        { name: "Slovenian", language: "sl" },
        { name: "Somali", language: "so" },
        { name: "Spanish", language: "es" },
        { name: "Swedish", language: "sv" },
        { name: "Thai", language: "th" },
        { name: "Tibetan", language: "bo" },
        { name: "Tonga", language: "to" },
        { name: "Turkish", language: "tr" },
        { name: "Turkmen", language: "tk" },
        { name: "Twi", language: "tw" },
        { name: "Ukrainian", language: "uk" },
        { name: "Vietnamese", language: "vi" },
      ],
      lang_to_translate: "",
      lang_from_translate: "",
      text: "",
      output: "",
      output_wrong: true, // variabile per errore chiamata
      text_output_Cyberia: "Inserisci il testo che vuoi e proverò a tradurlo",
    };
  },
  methods: {
    async translate_text() {
      this.output_wrong = true;
      if (this.text === "" || this.lang_from_translate === "" || this.lang_to_translate === "") alert("inserisci il testo da tradurre");
      else {
        // const token = "35bac28155msh12acd48046117c7p1c758ejsnfe268454ef54"; // token api
        const encodedParams = new URLSearchParams();  // dati encoded URL se no da problemi se non  si passano in questo modo 
        encodedParams.set('q', 'Hello, world!');
        encodedParams.set('target', 'es');
        encodedParams.set('source', 'en');
        try {
          const response = await axios.post('https://google-translate1.p.rapidapi.com/language/translate/v2', encodedParams, { // chiamata api
            headers: {
              "content-type": "application/x-www-form-urlencoded",
              "Accept-Encoding": "application/gzip",
              "X-RapidAPI-Key": import.meta.env.VITE_API_KEY,
              "X-RapidAPI-Host": "google-translate1.p.rapidapi.com",
            },},
          ); 
          console.log(response.data);
          this.output = response.data.data.translations[0].translatedText;
        } catch (error) {
          console.log(error);
          this.output_wrong = false;
        }
      }
    },
  },
  mounted() {
    const text_Cyberia = document.querySelector(".output_Cyberia");
    store.transformElement(this.text_output_Cyberia, text_Cyberia);
  },
};
</script>
<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="output_Cyberia text-start fs-5">
          <!-- testo output CYBERIA -->
        </div>
        <div class="col-12 col-sm-6 select-language">
          <select class="form-select" aria-label="Default select example" v-model="lang_from_translate">
            <option disabled value="">Select Source Language</option>
            <option :value="language.language" v-for="(language, i) in languages">{{ language.name }}</option>
          </select>
        </div>
        <div class="col-12 col-sm-6 select-language">
          <select class="form-select" aria-label="Default select example" v-model="lang_to_translate">
            <option disabled value="">Select Target Language</option>
            <option :value="language.language" v-for="(language, i) in languages">{{ language.name }}</option>
          </select>
        </div>
        <div class="d-flex flex-wrap">
          <div class="col-12 col-sm-6  text-to-traslate">
            <textarea v-model="text" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" placeholder="Iserire testo"></textarea>
          </div>
          <div class="col-12 col-sm-6 answer " tabindex="0">
               <p v-if="output_wrong"><h3></h3> {{ output }}</p>
               <p v-else>
                Ops!! hai sbagliato a digitare il testo o a selezionare le lingue Ps. CYBERIA non è perfetta e potrebbe non 
                riuscire a tradurre il testo, CYBERIA può tradurre 500 caratteri al mese e questo mese sono finiti
                ci sarà un upgrade di CYBERIA
              </p>
          </div>
        </div>
      </div>
      <button @click="translate_text" class="btn-page-traslate">Traduci</button>
    </div>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;
.row > div {
  margin: 10px 0px;
}
// classi per tag select
.select-language > select {
  border: none;
  background-color: rgba(128, 0, 128, 0.815);
  color: white;
  overflow-y: auto;
}

.select-language > select:focus,
.text-to-traslate > textarea:focus,
.answer:focus {
  box-shadow: 0 0 2px 0.25rem $background_black;
}
// classi per bottone
.btn-page-traslate {
  padding: 5px 15px;
  border-radius: 7px;
  border: none;
  background-color: rgba(128, 0, 128, 0.815);
  border: 1px solid rgba(0, 0, 0, 0.397);
  color: white;
}

.btn-page-traslate:hover {
  background-color: rgba(0, 0, 0, 0.397);
  border: 1px solid rgba(128, 0, 128, 0.314);
  color: white;
  transform: scale(1.1);
}

.answer {
  background-color: white;
  // border-radius: ;
  p {
    color: $black;
  }
}

@media screen and (max-width:576px) {
  .answer{
    min-height: 100px;
  }
}
</style>