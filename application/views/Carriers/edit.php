
<form method="POST" action="<?php echo base_url();?>Carriers/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idCarrier" placeholder="idCarrier" value="<?php echo($carrier['idCarrier']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Carrier</label>
    <input type="text" class="form-control" name="carrier" placeholder="Carrier" value="<?php echo($carrier['carrier']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <input type="text" class="form-control" name="telefonoCarrier" placeholder="Teléfono" value="<?php echo($carrier['telefonoCarrier']);?>">
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Carriers/index">Regresar</a>
</div>

</form>

<br>