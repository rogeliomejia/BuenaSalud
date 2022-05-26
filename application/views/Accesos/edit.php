
<form method="POST" action="<?php echo base_url();?>Accesos/update">
  
  <div class="form-group col-md-4" style="display: none">
    <label>Id acceso</label>
    <input type="text" class="form-control" name="idAcceso" placeholder="Id" value="<?php echo($acceso['idAcceso']) ?>" required>
  </div>

<div class="form-group col-md-4">
    <label>Acceso</label>
    <input type="text" class="form-control" name="opcion" placeholder="Nombre en menú" value="<?php echo($acceso['opcion']) ?>" required>
  </div>

  <div class="form-group col-md-4">
    <label>Url</label>
    <input type="text" class="form-control" name="url"  placeholder="Acceso/index" required value="<?php echo($acceso['url']) ?>">
  </div>

  <div class="form-group col-md-4">
    <label>Orden</label>
    <input type="text" class="form-control" name="orden"  placeholder="# orden" required value="<?php echo($acceso['orden']) ?>">
  </div>


  <div class="form-group col-md-4">
    <label>Id padre</label>
    <select name="idPadre" id="idPadre" class="form-control">
      <option value="0" selected>--Seleccione--</option>
      <?php foreach ($ListIdPadre as $item) : ?>
        <option value="<?php echo($item['idAcceso'])?>" <?php 
          $select ="0";
          if ($item['idAcceso'] === $acceso['idPadre']){
           $select="selected";
         }
          echo($select);
          ?>
          ><?php echo('Grupo# '.$item['grupo'].': '.$item['opcion'])?></option>
      <?php endforeach; ?>
    </select>
    </div>


  <div class="form-group col-md-4">
    <label>Grupo</label>
    <input type="text" class="form-control" name="grupo" placeholder="# grupo o # nuevo" required value="<?php echo($acceso['grupo']) ?>">
  </div>


 <div class="form-group col-md-3">
    <label>Ícono</label>
    <select name="idIcono" id="idIcono" class="form-control" required>
      <option value="" selected>--Seleccione--</option>
      <?php foreach ($ListIcono as $item) : ?>
        <option value="<?php echo($item['idIcono'])?>" <?php 
          $select ="";
          if ($item['idIcono'] === $acceso['idIcono']){
           $select="selected";
         }
          echo($select);
          ?>
          ><?php echo($item['icono'])?></option>
      <?php endforeach; ?>
    </select>
</div>

<div class="form-group col-md-1">
    <label id="iconLabel" style="display: none;">Muestra:</label>
  <span style="display:none;" id="iconName"><?php echo($item['icono']) ?></span>
  <i class="" id="sample" aria-hidden="true"></i>
</div> 




<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a class="btn btn-warning" href="<?php echo base_url();?>Accesos/index">Regresar</a>
</div>
</form>

<br>

<script>

$(document).ready(showIcon);

$("#idIcono").on("input", showIcon);

function showIcon(){
  $("#sample").removeClass();
  $("#iconLabel").removeAttr( 'style' );
  var iconName = $("#idIcono :selected").text();
  $("#sample").addClass(iconName);
}
</script>
