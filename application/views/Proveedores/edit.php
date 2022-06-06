
<form method="POST" action="<?php echo base_url();?>Proveedores/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idProveedor" placeholder="idProveedor" value="<?php echo($proveedor['idProveedor']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Proveedor</label>
    <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" value="<?php echo($proveedor['proveedor']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <input type="text" class="form-control" name="telefonoProveedor" placeholder="Teléfono" value="<?php echo($proveedor['telefonoProveedor']);?>">
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Proveedores/index">Regresar</a>
</div>

</form>

<br>