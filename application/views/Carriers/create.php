
<form method="POST" action="<?php echo base_url();?>Carriers/create">
  <div class="form-group col-md-4">
    <label>Carrier</label>
    <input type="text" class="form-control" name="carrier" placeholder="Carrier" required>
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <input type="text" class="form-control" name="telefonoCarrier" placeholder="Teléfono" required>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Carriers/index">Regresar</a>
</div>
</form>

<br>