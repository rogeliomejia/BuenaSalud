
<form method="POST" action="<?php echo base_url();?>Sucursales/create">
  <div class="form-group col-md-4">
    <label>Sucursal</label>
    <input type="text" class="form-control" name="sucursal" placeholder="Sucursal" required>
  </div>

  <div class="form-group col-md-4">
    <label>Dirección</label>
    <input type="text" class="form-control" name="direccionSucursal" placeholder="Dirección" required>
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <input type="text" class="form-control" name="telefonoSucursal" placeholder="Teléfono" required>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Sucursales/index">Regresar</a>
</div>
</form>

<br>