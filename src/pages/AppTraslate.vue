<script>
import { store } from "../store";
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
      text_output_Cyberia:'Inserisci il testo che vuoi e proverò a tradurlo'
    };
  },
  methods: {
    async translate_text() {
      this.output_wrong = true
      if (this.text=== '') alert('inserisci il testo da tradurre') 
      const encodedParams = new URLSearchParams(); // The URLSearchParams() crea e ritorna new URLSearchParams object. questo oggetto sarebbe composto da parametri che vengono utilizzati nella query
      encodedParams.set("q", this.text); // testo da tradurre
      encodedParams.set("target", this.lang_to_translate); // lingua in cui tradurre
      encodedParams.set("source", this.lang_from_translate); // lingua del testo
      const token = "5010931314msh2de8e5ec3ecb6b0p126562jsnd5b5390a14cb"; // token api
      const options = { // parametri per chiamata
        method: "POST",
        url: "https://google-translate1.p.rapidapi.com/language/translate/v2",
        headers: {
          "content-type": "application/x-www-form-urlencoded",
          "Accept-Encoding": "application/gzip",
          "X-RapidAPI-Key": token,
          "X-RapidAPI-Host": "google-translate1.p.rapidapi.com",
        },
        data: encodedParams,
      };

      try {
        const response = await axios.request(options); // chiamata api
        console.log(response.data);
        this.output = response.data.data.translations[0].translatedText;
      } catch (error) {
        console.log(error);
        this.output_wrong=false
      }
    },
  },
  mounted() {
    const text_Cyberia=document.querySelector('.output_Cyberia')
    store.transformElement(this.text_output_Cyberia,text_Cyberia)
  }
};
</script>
<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="output_Cyberia text-start fs-5">
          <!-- testo output CYBERIA -->
        </div>
        <div class="col-12 col-sm-6 ">
          <select class="form-select" aria-label="Default select example" v-model="lang_from_translate">
            <option class="text-dark" disabled value="">Select Source Language</option>
            <option class="text-dark" :value="language.language" v-for="(language, i) in languages">{{ language.name }}</option>
          </select>
        </div>
        <div class="col-12 col-sm-6 4">
          <select class="form-select" aria-label="Default select example" v-model="lang_to_translate">
            <option class="text-dark" disabled value="">Select Target Language</option>
            <option class="text-dark" :value="language.language" v-for="(language, i) in languages">{{ language.name }}</option>
          </select>
        </div>
        <div >
          <label for="exampleFormControlTextarea1" class="form-label">Iserisci testo</label>
          <textarea v-model="text"  class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>
      </div>
    </div>
    <button @click="translate_text" class="btn-page">traduci</button>
    <div>
      <p v-if="output_wrong"><h3></h3> {{ output }}</p>
      <p v-else><h4>Ops!! hai sbagliato a digitare il testo o a selezionare le lingue </h4> Ps. CYBERIA non è perfetta e potrebbe non riuscire a tradurre il testo</p>
    </div>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;
*{
 font-family: $font_cyberia
}
.row>div{
  margin: 10px 0px;
}
</style>
