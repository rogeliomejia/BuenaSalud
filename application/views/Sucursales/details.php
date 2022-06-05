<div class="container">
	<div class="form-group col-md-4 center">
    <label>Nombre</label>
    <p><?php echo($sucursal['sucursal']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Dirección</label>
    <p><?php echo($sucursal['direccionSucursal']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <p><?php echo($sucursal['telefonoSucursal']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Sucursales/edit/<?php echo($sucursal['idSucursal'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Sucursales/index">Regresar</a>
  <div>
</div>