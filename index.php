<?php
//añade el modal para registrara el prodcuto
include 'addproducto.php';
//añade el encabezado del sitio.
include 'layout/header.php';
?>

<!DOCTYPE html>
<html lang="en">


<body>


     <!--abre boton para agregar producto--->
     <div id="modal">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproducto">Agregar Producto 🛒
          </button>
     </div>


     <!--tabla de productos--->
     <div class="container">
          <table class="table">
               <thead>
                    <tr>
                         <th>Nombre</th>
                         <th>Descripcion</th>
                         <th>Precio</th>
                         <th>Stock</th>
                    </tr>
               </thead>
               <tbody id="contenido-tabla">
               </tbody>
          </table>

          
         
  <ul class="pagination">
    <li class="page-item"><a class="page-link" id="btn-anterior">Anterior</a></li>
    <li class="page-item"><span class="page-link" id="num-pagina">Pagina 1</span></li>
    <li class="page-item"><a class="page-link" id="btn-siguiente">Siguiente</a></li>
  </ul>

     </div>











     <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
     <!--añade el script de la carpeta js-->
     <script src="js/addproducto.js"></script>
     <!--añede la paginacion--->
     <script src="js/paginacion.js"></script>
</body>

</html>