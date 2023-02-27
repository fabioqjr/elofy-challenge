import "./bootstrap";
import $ from "jquery";
window.$ = $;

$(document).ready(function () {
    fetch("/listar-exemplo")
        .then((response) => response.json())
        .then((json) => {
            json.forEach((item) => {
                console.log(item);
                $("[js-host-data]").append(`
                    <div>
                        <br>
                        <p>${item.name}</p>
                        <p>${item.description}</p>
                        <br>
                    </div>
                `);
            });
        });
});
