import "./bootstrap";
import $ from "jquery";
window.$ = $;

$(document).ready(function () {
    // fetch("/api/listar-exemplo")
    //     .then((response) => response.json())
    //     .then((json) => {
    //         json.forEach((item) => {
    //             console.log(item);
    //             $("[js-host-data]").append(`
    //                 <div>
    //                     <br>
    //                     <p>${item.name}</p>
    //                     <p>${item.description}</p>
    //                     <br>
    //                 </div>
    //             `);
    //         });
    //     });

    // Crie uma função que teste se a palavra é um palíndromo e retorne true ou false.
    // Não é permitido usar método array.reverse.

    // Exemplos de palíndromo: Anilina, Arara, Esse, Reviver

    const input = "Arara";
    console.log(palindromo(input));
});

function palindromo(str) {
    const arr = Array.from(str.toLowerCase());
    let init = str.toLowerCase();
    let result = "";

    for (var x = arr.length-1; x >= 0; x--) {
        result += arr[x];
    }

    return (init == result) ? true : false;
}
