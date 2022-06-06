
<form method="POST" action="<?php echo base_url();?>Productos/create">
  <div class="form-group col-md-4">
    <label>Producto</label>
    <input type="text" class="form-control" name="producto" placeholder="Producto" required>
  </div>

  <div class="form-group col-md-4">
    <label>Categoría</label>
    <input type="text" class="form-control" name="idCategoria" placeholder="Categoría" required>
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <input type="text" class="form-control" name="descripcionProducto" placeholder="Descripción" required>
  </div>

  <div class="form-group col-md-4">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" placeholder="Precio" required>
  </div>

  <div class="form-group col-md-4">
    <label>Existencias</label>
    <input type="text" class="form-control" name="existencias" placeholder="Existencias" required>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Productos/index">Regresar</a>
</div>
</form>

<br>