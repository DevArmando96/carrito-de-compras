let paginaActual = 1;

function cargarProductos(pagina) {
    //añede el archivo paginacion 
    fetch(`./layout/pagination.php?p=${pagina}`)
        .then(response => response.text())
        .then(html => {
            document.getElementById('contenido-tabla').innerHTML = html;
            document.getElementById('num-pagina').innerText = `Página: ${pagina}`;
            paginaActual = pagina;
        })
        .catch(error => console.error('Error:', error));
}

// Eventos de los botones
document.getElementById('btn-anterior').addEventListener('click', () => {
    if (paginaActual > 1) {
        cargarProductos(paginaActual - 1);
    }
});

document.getElementById('btn-siguiente').addEventListener('click', () => {
    cargarProductos(paginaActual + 1);
});

// Cargar la primera página al iniciar
cargarProductos(1);


