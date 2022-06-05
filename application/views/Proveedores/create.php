
<form method="POST" action="<?php echo base_url();?>Proveedores/create">
  <div class="form-group col-md-4">
    <label>Proveedor</label>
    <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" required>
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <input type="text" class="form-control" name="telefonoProveedor" placeholder="Teléfono" required>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Proveedores/index">Regresar</a>
</div>
</form>

<br>