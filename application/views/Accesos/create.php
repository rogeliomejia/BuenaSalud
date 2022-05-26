
<form method="POST" action="<?php echo base_url();?>Accesos/create">
  <div class="form-group col-md-4">
    <label>Acceso</label>
    <input type="text" class="form-control" name="opcion" placeholder="Nombre en menú" required>
  </div>

  <div class="form-group col-md-4">
    <label>Url</label>
    <input type="text" class="form-control" name="url" placeholder="Acceso/index" required>
  </div>

  <div class="form-group col-md-4">
    <label>Orden</label>
    <input type="text" class="form-control" name="orden" placeholder="# orden" required>
  </div>

  <div class="form-group col-md-4">
    <label>Id padre</label>
    <select name="idPadre" id="idPadre" class="form-control">
      <option value="0" selected>--Seleccione--</option>
      <?php foreach ($ListIdPadre as $item) : ?>
        <option value="<?php echo($item['idAcceso'])?>" 
          ><?php echo('Grupo# '.$item['grupo'].': '.$item['opcion'])?></option>
      <?php endforeach; ?>
    </select>

  </div>

  <div class="form-group col-md-4">
    <label>Grupo</label>
    <input type="text" class="form-control" name="grupo" placeholder="# grupo o # nuevo" required>
  </div>


 <div class="form-group col-md-3">
    <label>Ícono</label>
    <select name="idIcono" id="idIcono" class="form-control" required>
      <option value="" selected>--Seleccione--</option>
      <?php foreach ($ListIcono as $item) : ?>
        <option value="<?php echo($item['idIcono'])?>" 
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
  <a class="btn btn-warning" href="<?php echo base_url();?>Roles/index">Regresar</a>
</div>
</form>

<br>

<script>
$("#idIcono").on("input", showIcon);

function showIcon(){
  $("#sample").removeClass();
  $("#iconLabel").removeAttr( 'style' );
  var iconName = $("#idIcono :selected").text();
  $("#sample").addClass(iconName);
}
</script>
