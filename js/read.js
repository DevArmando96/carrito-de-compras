//llama el html 
const buscar = document.getElementById('buscar');

buscar.addEventListener('keyup', function () {

    let texto = this.value;

    //console.log("Texto buscado:", texto);

    fetch(`./crud/read.php?buscar=${encodeURIComponent(texto)}`)
        .then(response => response.text())
        .then(data => {

            //console.log("Respuesta de PHP:", data);

            document.getElementById('contenido-tabla').innerHTML = data;

        })
        .catch(error => {

            console.error("ERROR:", error);

        });

});

