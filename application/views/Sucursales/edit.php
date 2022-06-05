
<form method="POST" action="<?php echo base_url();?>Sucursales/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idSucursal" placeholder="idSucursal" value="<?php echo($sucursal['idSucursal']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Sucursal</label>
    <input type="text" class="form-control" name="sucursal" placeholder="Sucursal" value="<?php echo($sucursal['sucursal']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Dirección</label>
    <input type="text" class="form-control" name="direccionSucursal" placeholder="Dirección" value="<?php echo($sucursal['direccionSucursal']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <input type="text" class="form-control" name="telefonoSucursal" placeholder="Teléfono" value="<?php echo($sucursal['telefonoSucursal']);?>">
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Sucursales/index">Regresar</a>
</div>

</form>

<br>