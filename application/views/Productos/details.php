<div class="container">
	<div class="form-group col-md-4 center">
    <label>Nombre</label>
    <p><?php echo($producto['producto']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Categoría</label>
    <p><?php echo($producto['idCategoria']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <p><?php echo($producto['descripcionProducto']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Precio</label>
    <p><?php echo($producto['precio']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Existencias</label>
    <p><?php echo($producto['existencias']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Productos/edit/<?php echo($producto['idProducto'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Productos/index">Regresar</a>
  <div>
</div>