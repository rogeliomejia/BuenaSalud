<script>
	$(document).ready(function(){
				setId();
			}
		);

	function setId(){
		$("#sendAccess").each(function(){
     		this.href += $("#idAcceso").val();
		})
	}
</script>
<form method="POST" action="<?php echo base_url();?>Roles/assign">
<div class="col-md-12">
	<div class="form-group col-md-4">
    <label>Acceso</label>
    <select class="form-control" id="idAcceso" name="idAcceso">
      <option value="" selected>--Seleccione--</option>
      <?php foreach ($opciones as $item) : ?>
        <option value="<?php echo($item['idAcceso'])?>"> <?php echo($item['opcion'])?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <input type="text" class="form-control" name="descripcion" placeholder="Descripción">
    </div>

    <div class="form-group col-md-4" style="display: none">
    <label>Rol</label>
    <input type="text" class="form-control" name="rol" placeholder="Descripción" value="<?php echo($idRol);?>">
    </div>
</div>



<div class="col-md-12">
	<div class="form-group col-md-4">
	
<button type="submit" class="btn btn-success">Asignar</button>
<a class="btn btn-warning" href="<?php echo base_url();?>Roles/index">Regresar</a>
</div>
</div>
</form>

<table class="center">
<tr>
	<th>Accessos</th>
	<th>Descripción</th>
	<th>Ícono</th>
	<th>Opción</th>
</tr>
<?php foreach ($accesos as $item) : ?>
<tr>
	<td><?php echo($item['opcion']) ?></td>
	<td><?php echo($item['descripcion']) ?></td>
	<td><i class="<?php echo($item['icono']) ?>" aria-hidden="true"></i></td>
	<td>
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idRolAcceso']) ?>, '<?php echo($item['opcion']) ?>', '<?php echo($item['idRol']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>
</table>




<script>
	function modal(id, opcion, idRol){
		$("#deleteItem").html(opcion);
		$("#deleteConfirm").each(function(){
     		this.href += id+"/"+idRol;
		})
		$("#modalTrigger").click();
	}
</script>

<button style="display: none;" id="modalTrigger" class="btn btn-primary" data-toggle="modal" data-target="#modalDelete">Detalles</button> 

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4 style="text-align: center;">¿Desea eliminar el siguiente rol: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Roles/unassign/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

