
<form method="POST" action="<?php echo base_url();?>Productos/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idProducto" placeholder="idProducto" value="<?php echo($producto['idProducto']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Producto</label>
    <input type="text" class="form-control" name="producto" placeholder="Producto" value="<?php echo($producto['producto']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Categoría</label>
    <input type="text" class="form-control" name="idCategoria" placeholder="Categoría" value="<?php echo($producto['idCategoria']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <input type="text" class="form-control" name="descripcionProducto" placeholder="Descripción" value="<?php echo($producto['descripcionProducto']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?php echo($producto['precio']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Existencias</label>
    <input type="text" class="form-control" name="existencias" placeholder="Existencias" value="<?php echo($producto['existencias']);?>">
  </div>


<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Productos/index">Regresar</a>
</div>

</form>

<br>