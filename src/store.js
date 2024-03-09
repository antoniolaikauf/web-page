import {reactive} from "vue";

export const store = reactive({

  // funzione per animazione per testo 
  transformElement: (testo, testo_posto, come_back) => {
    let number = 0;
    let timer = null;
    if (number < testo.length) {

        timer = setInterval(() => {
          const frase_esposta = testo.charAt(number);
          testo_posto.innerHTML += frase_esposta;
          number++;
        }, 100);
  }
  },
  
});