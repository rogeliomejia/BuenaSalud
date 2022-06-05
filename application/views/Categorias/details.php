<div class="container">
	<div class="form-group col-md-4 center">
    <label>Nombre</label>
    <p><?php echo($categoria['categoria']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <p><?php echo($categoria['descripcion']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Categorias/edit/<?php echo($categoria['idCategoria'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Categorias/index">Regresar</a>
  <div>
</div>