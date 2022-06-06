<div class="container">
	<div class="form-group col-md-4 center">
    <label>Nombre</label>
    <p><?php echo($carrier['carrier']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <p><?php echo($carrier['telefonoCarrier']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Carriers/edit/<?php echo($carrier['idCarrier'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Carriers/index">Regresar</a>
  <div>
</div>