

<form method="POST" action="<?php echo base_url();?>Iconos/update">

  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idIcono" placeholder="idIcono" value="<?php echo($icono['idIcono']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required value="<?php echo($icono['nombre']);?>">
  </div>

  <div class="form-group col-md-4" onload="showSample()">
    <label>Ícono</label>
    <input type="text" class="form-control" name="icono" id="icono" placeholder="e.g: fa fa-file-image-o" required value="<?php echo($icono['icono']);?>" oninput="showSample()" >
  </div>

  <div class="form-group col-md-4">
    <label>Preview</label> <br>
    <i id="preview" class="" aria-hidden="true"></i>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Iconos/index">Regresar</a>
</div>
</form>

<br>

<script>
  $(document).ready(
    function(){
    showSample();
    }
    );

  function showSample(){
    var icono = $("#icono").val();
    $("#preview").removeClass();
    $("#preview").addClass(icono);
  }
</script>
