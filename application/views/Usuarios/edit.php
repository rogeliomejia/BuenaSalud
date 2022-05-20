
<form method="POST" action="<?php echo base_url();?>Usuarios/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="id" placeholder="id" value="<?php echo($usuario['id']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo($usuario['nombre']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Apellido</label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="<?php echo($usuario['apellido']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Usuario</label>
    <input type="text" class="form-control" name="username" placeholder="Usuario" value="<?php echo($usuario['username']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="pass" placeholder="********" required="true">
  </div>

  <div class="form-group col-md-4">
    <label>E-mail</label>
    <input type="email" class="form-control" name="email" placeholder="ejemplo@mail.com" value="<?php echo($usuario['email']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Dirección</label>
    <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?php echo($usuario['direccion']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Rol</label>
    <select name="idrol" id="cars" class="form-control" required>
      <option value="" selected>--Seleccione--</option>
      <?php foreach ($ListRoles as $rol) : ?>
        <option value="<?php echo($rol['idRol'])?>" <?php 
          $select ="";
          if ($rol['idRol'] === $usuario['id_rol']){
           $select="selected";
         }
          echo($select);
          ?>
          ><?php echo($rol['rol'])?></option>
      <?php endforeach; ?>
    </select>
    </div>

    <div class="form-group col-md-4">
      <label>Teléfono</label>
      <input type="text" class="form-control" name="telefono" placeholder="####-####" value="<?php echo($usuario['telefono']);?>">
    </div>

    <div class="form-group col-md-4">
      <label>Teléfono</label>
      <select name="isBlocked" id="cars" class="form-control" required>
        <option value="" selected>--Seleccione--</option>
        <option value="1" 

        <?php 
          $select ="";
          if (1 == $usuario['isBlocked']){
           $select="selected";
         }
          echo($select);
          ?>

        >Sí</option>
        <option value="0" 
        <?php 
          $select ="";
          if (0 == $usuario['isBlocked']){
           $select="selected";
         }
          echo($select);
          ?>
>NO</option>
      </select>
    </div>


<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Usuarios/index">Regresar</a>
</div>

</form>

<br>