
<form method="POST" action="<?php echo base_url();?>Roles/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idRol" placeholder="idRol" value="<?php echo($rol['idRol']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Nombre del rol</label>
    <input type="text" class="form-control" name="rol" placeholder="Rol" value="<?php echo($rol['rol']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="<?php echo($rol['descripcion']);?>">
  </div>


<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Roles/index">Regresar</a>
</div>

</form>

<br>