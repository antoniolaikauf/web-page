<script>
import axios from "axios";
export default {
  name: "Traslate",
  data() {
    return {
      languages: [
        { name: "Abkhazian", language: "ab" },
        { name: "Afar", language: "aa" },
        { name: "Afrikaans", language: "af" },
        { name: "Arabic", language: "ar" },
        { name: "Aragonese", language: "an" },
        { name: "Armenian", language: "hy" },
        { name: "Assamese", language: "as" },
        { name: "Avaric", language: "av" },
        { name: "Avestan", language: "ae" },
        { name: "Aymara", language: "ay" },
        { name: "Azerbaijani", language: "az" },
        { name: "Bambara", language: "bm" },
        { name: "Bashkir", language: "ba" },
        { name: "Basque", language: "eu" },
        { name: "Belarusian", language: "be" },
        { name: "Bengali", language: "bn" },
        { name: "Bislama", language: "bi" },
        { name: "Bosnian", language: "bs" },
        { name: "Breton", language: "br" },
        { name: "Bulgarian", language: "bg" },
        { name: "Burmese", language: "my" },
        { name: "Catalan", language: "ca" },
        { name: "Central Khmer", language: "km" },
        { name: "Chamorro", language: "ch" },
        { name: "Chechen", language: "ce" },
        { name: "Chichewa", language: "ny" },
        { name: "Chinese", language: "zh" },
        { name: "Church Slavonic", language: "cu" },
        { name: "Chuvash", language: "cv" },
        { name: "Cornish", language: "kw" },
        { name: "Corsican", language: "co" },
        { name: "Cree", language: "cr" },
        { name: "Croatian", language: "hr" },
        { name: "Czech", language: "cs" },
        { name: "Danish", language: "da" },
        { name: "Divehi", language: "dv" },
        { name: "Dutch", language: "nl" },
        { name: "Dzongkha", language: "dz" },
        { name: "English", language: "en" },
        { name: "Esperanto", language: "eo" },
        { name: "Estonian", language: "et" },
        { name: "Ewe", language: "ee" },
        { name: "Faroese", language: "fo" },
        { name: "Fijian", language: "fj" },
        { name: "Finnish", language: "fi" },
        { name: "French", language: "fr" },
        { name: "Fulah", language: "ff" },
        { name: "Gaelic", language: "gd" },
        { name: "Galician", language: "gl" },
        { name: "Ganda", language: "lg" },
        { name: "Georgian", language: "ka" },
        { name: "German", language: "de" },
        { name: "Greek", language: "el" },
        { name: "Guarani", language: "gn" },
        { name: "Gujarati", language: "gu" },
        { name: "Haitian", language: "ht" },
        { name: "Hausa", language: "ha" },
        { name: "Hebrew", language: "he" },
        { name: "Herero", language: "hz" },
        { name: "Hindi", language: "hi" },
        { name: "Hiri Motu", language: "ho" },
        { name: "Hungarian", language: "hu" },
        { name: "Icelandic", language: "is" },
        { name: "Ido", language: "io" },
        { name: "Igbo", language: "ig" },
        { name: "Indonesian", language: "id" },
        { name: "Interlingua", language: "ia" },
        { name: "Interlingue", language: "ie" },
        { name: "Inuktitut", language: "iu" },
        { name: "Inupiaq", language: "ik" },
        { name: "Irish", language: "ga" },
        { name: "Italian", language: "it" },
        { name: "Japanese", language: "ja" },
        { name: "Javanese", language: "jv" },
        { name: "Kalaallisut", language: "kl" },
        { name: "Kannada", language: "kn" },
        { name: "Kanuri", language: "kr" },
        { name: "Kashmiri", language: "ks" },
        { name: "Kazakh", language: "kk" },
        { name: "Kikuyu", language: "ki" },
        { name: "Kinyarwanda", language: "rw" },
        { name: "Kirghiz", language: "ky" },
        { name: "Komi", language: "kv" },
        { name: "Kongo", language: "kg" },
        { name: "Korean", language: "ko" },
        { name: "Kuanyama", language: "kj" },
        { name: "Kurdish", language: "ku" },
        { name: "Lao", language: "lo" },
        { name: "Latin", language: "la" },
        { name: "Latvian", language: "lv" },
        { name: "Limburgan", language: "li" },
        { name: "Lingala", language: "ln" },
        { name: "Lithuanian", language: "lt" },
        { name: "Luba-Katanga", language: "lu" },
        { name: "Luxembourgish", language: "lb" },
        { name: "Macedonian", language: "mk" },
        { name: "Malagasy", language: "mg" },
        { name: "Malay", language: "ms" },
        { name: "Malayalam", language: "ml" },
        { name: "Maltese", language: "mt" },
        { name: "Manx", language: "gv" },
        { name: "Maori", language: "mi" },
        { name: "Marathi", language: "mr" },
        { name: "Marshallese", language: "mh" },
        { name: "Mongolian", language: "mn" },
        { name: "Nauru", language: "na" },
        { name: "Navajo", language: "nv" },
        { name: "Ndonga", language: "ng" },
        { name: "Nepali", language: "ne" },
        { name: "North Ndebele", language: "nd" },
        { name: "Northern Sami", language: "se" },
        { name: "Norwegian", language: "no" },
        { name: "Occitan", language: "oc" },
        { name: "Ojibwa", language: "oj" },
        { name: "Oriya", language: "or" },
        { name: "Oromo", language: "om" },
        { name: "Ossetian", language: "os" },
        { name: "Pali", language: "pi" },
        { name: "Pashto", language: "ps" },
        { name: "Persian", language: "fa" },
        { name: "Polish", language: "pl" },
        { name: "Portuguese", language: "pt" },
        { name: "Punjabi", language: "pa" },
        { name: "Quechua", language: "qu" },
        { name: "Romanian", language: "ro" },
        { name: "Romansh", language: "rm" },
        { name: "Rundi", language: "rn" },
        { name: "Russian", language: "ru" },
        { name: "Samoan", language: "sm" },
        { name: "Sango", language: "sg" },
        { name: "Sanskrit", language: "sa" },
        { name: "Sardinian", language: "sc" },
        { name: "Serbian", language: "sr" },
        { name: "Shona", language: "sn" },
        { name: "Sichuan Yi", language: "ii" },
        { name: "Sindhi", language: "sd" },
        { name: "Sinhala", language: "si" },
        { name: "Slovak", language: "sk" },
        { name: "Slovenian", language: "sl" },
        { name: "Somali", language: "so" },
        { name: "South Ndebele", language: "nr" },
        { name: "Southern Sotho", language: "st" },
        { name: "Spanish", language: "es" },
        { name: "Sundanese", language: "su" },
        { name: "Swahili", language: "sw" },
        { name: "Swati", language: "ss" },
        { name: "Swedish", language: "sv" },
        { name: "Tagalog", language: "tl" },
        { name: "Tahitian", language: "ty" },
        { name: "Tajik", language: "tg" },
        { name: "Tamil", language: "ta" },
        { name: "Tatar", language: "tt" },
        { name: "Telugu", language: "te" },
        { name: "Thai", language: "th" },
        { name: "Tibetan", language: "bo" },
        { name: "Tigrinya", language: "ti" },
        { name: "Tonga", language: "to" },
        { name: "Tsonga", language: "ts" },
        { name: "Tswana", language: "tn" },
        { name: "Turkish", language: "tr" },
        { name: "Turkmen", language: "tk" },
        { name: "Twi", language: "tw" },
        { name: "Uighur", language: "ug" },
        { name: "Ukrainian", language: "uk" },
        { name: "Urdu", language: "ur" },
        { name: "Uzbek", language: "uz" },
        { name: "Venda", language: "ve" },
        { name: "Vietnamese", language: "vi" },
        { name: "Volapük", language: "vo" },
        { name: "Walloon", language: "wa" },
        { name: "Welsh", language: "cy" },
        { name: "Western Frisian", language: "fy" },
        { name: "Wolof", language: "wo" },
        { name: "Xhosa", language: "xh" },
        { name: "Yiddish", language: "yi" },
        { name: "Yoruba", language: "yo" },
        { name: "Zhuang", language: "za" },
        { name: "Zulu", language: "zu" },
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
