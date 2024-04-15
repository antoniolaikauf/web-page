import {reactive} from "vue";

export const store = reactive({
  // funzione per animazione per testo 
  transformElement: (testo, testo_posto) => {
    let number = 0;
    if (number < testo.length) {

       let timer = setInterval(() => {
          const frase_esposta = testo.charAt(number);
          testo_posto.innerHTML += frase_esposta;
          number++;
        }, 80);
    }
  },
  
});