import {reactive} from "vue";

export const store = reactive({

// funzione per animazione per testo 
        transformElement: (testo,testo_posto) => {
            let number = 0;
              if (number < testo.length) {
                  setInterval(() => {
               //presa di ogni parola dentro alla frase 
                const frase_esposta = testo.charAt(number);
               //aggiunto all'elemento la lettera del ciclo con setinterval 
               testo_posto.innerHTML += frase_esposta;
               number++;
               }, 100);
             }
        },
});