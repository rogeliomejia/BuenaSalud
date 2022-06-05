<div class="container">
	<div class="form-group col-md-4 center">
    <label>Nombre</label>
    <p><?php echo($proveedor['proveedor']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <p><?php echo($proveedor['telefonoProveedor']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Proveedores/edit/<?php echo($proveedor['idProveedor'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Proveedores/index">Regresar</a>
  <div>
</div>