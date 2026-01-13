<!-- Modal Body -->
<div class="modal fade" id="addproducto" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content shadow-sm rounded-4">

            <!-- Header -->
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-semibold">Agregar Producto 📂</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="register">
                <!-- Body -->
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control minimalist-input" id="nom">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control minimalist-input" id="des" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" class="form-control minimalist-input" id="pre">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control minimalist-input" id="sto">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <select class="form-select minimalist-input" id="cate">
                            <option selected disabled>Selecciona una categoría</option>
                            <option>Electrónica</option>
                            <option>Zapatos</option>
                            <option>Ropa</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de creación</label>
                            <input type="date" class="form-control minimalist-input" id="fech">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Activo</label>
                            <select class="form-select minimalist-input" id="ac">
                                <option selected disabled>¿Disponible?</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" class="btn btn-dark px-4" id="registrarproducto">Guardar</button>
                </div>

            </form>
             
           <button class="btn btn-outline-secondary btn-sm border-0" data-bs-dismiss="modal">Cerrar ventana</button>
        </div>
    </div>
</div>

