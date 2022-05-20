<div class="container">
	<div class="form-group col-md-4">
    <label>Nombre</label>
    <p><?php echo($usuario['nombre']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Apellido</label>
    <p><?php echo($usuario['apellido']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Usuario</label>
    <p><?php echo($usuario['username']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>E-mail</label>
    <p><?php echo($usuario['email']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Rol</label>
    <p><?php echo($usuario['id_rol']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <p><?php echo($usuario['telefono']);?></p>
  </div>

    <div class="form-group col-md-4">
    <label>Bloqueado</label>
    <p><?php echo(($usuario['isBlocked']==1)?"Sí":"No");?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Dirección</label>
    <p><?php echo($usuario['direccion']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Usuarios/edit/<?php echo($usuario['id'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Usuarios/index">Regresar</a>
  <div>
</div>