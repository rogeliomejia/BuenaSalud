
<form method="POST" action="<?php echo base_url();?>Usuarios/create">
  <div class="form-group col-md-4">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
  </div>

  <div class="form-group col-md-4">
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
  </div>

  <div class="form-group col-md-4">
    <label>Usuario</label>
    <input type="text" class="form-control" name="username" placeholder="Usuario" required>
  </div>

  <div class="form-group col-md-4">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="pass" placeholder="********" required>
  </div>

  <div class="form-group col-md-4">
    <label>E-mail</label>
    <input type="email" class="form-control" name="email" placeholder="ejemplo@mail.com" required>
  </div>

  <div class="form-group col-md-4">
    <label>Dirección</label>
    <input type="text" class="form-control" name="direccion" placeholder="Dirección">
  </div>

  <div class="form-group col-md-4">
    <label>Rol</label>
    <select name="idrol" id="cars" class="form-control" required>
      <option value="" selected>--Seleccione--</option>
      <?php foreach ($ListRoles as $rol) : ?>
        <option value="<?php echo($rol['idRol'])?>" 
          ><?php echo($rol['rol'])?></option>
      <?php endforeach; ?>
    </select>

  </div>

  <div class="form-group col-md-4">
    <label>Teléfono</label>
    <input type="text" class="form-control" name="telefono" placeholder="####-####">
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Usuarios/index">Regresar</a>
</div>
</form>

<br>