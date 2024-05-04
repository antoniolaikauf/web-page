<script>
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
    };
  },
  methods: {
    async translate_text() {
      const encodedParams = new URLSearchParams();
      encodedParams.set("q", this.text);
      encodedParams.set("target", this.lang_to_translate);
      encodedParams.set("source", this.lang_from_translate);
      const token = "5010931314msh2de8e5ec3ecb6b0p126562jsnd5b5390a14cb";
      const options = {
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
        const response = await axios.request(options);
        console.log(response.data);
        this.output = response.data.data.translations[0].translatedText;
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-6 p-4">
          <select class="form-select" aria-label="Default select example" v-model="lang_from_translate">
            <option class="text-dark" disabled value="">Select Source Language</option>
            <option class="text-dark" :value="language.language" v-for="(language, i) in languages">{{ language.name }}</option>
          </select>
        </div>
        <div class="col-6 p-4">
          <select class="form-select" aria-label="Default select example" v-model="lang_to_translate">
            <option class="text-dark" disabled value="">Select Target Language</option>
            <option class="text-dark" :value="language.language" v-for="(language, i) in languages">{{ language.name }}</option>
          </select>
        </div>
        <div>
          <input v-model="text" type="text" class="text-dark" placeholder="Inserire testo da tradurre" />
        </div>
      </div>
    </div>
    <div @click="translate_text">traduci</div>
    <div>
      <h3>Testo tradotto</h3>
      <p>{{ output }}</p>
    </div>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;
</style>
