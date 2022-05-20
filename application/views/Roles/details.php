<div class="container">
	<div class="form-group col-md-4 center">
    <label>Nombre</label>
    <p><?php echo($rol['rol']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Apellido</label>
    <p><?php echo($rol['descripcion']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Roles/edit/<?php echo($rol['idRol'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Roles/index">Regresar</a>
  <div>
</div>