
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Roles/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Rol</th>
	<th>Descripción</th>
	<th>Accesos</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListRoles as $item) : ?>
<tr>
	<td><?php echo($item['idRol']) ?></td>
	<td><?php echo($item['rol']) ?></td>
	<td><?php echo($item['descripcion']) ?></td>
	<td>
		<a  
		href="<?php echo base_url();?>Roles/permissions/<?php echo($item['idRol']) ?>">Sitios</a>
	</td>
	<td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Roles/details/<?php echo($item['idRol']) ?>">Detalles</a> | 
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Roles/edit/<?php echo($item['idRol'])?>">Modificar</a> | 
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idRol']) ?>, '<?php echo($item['rol']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, rol){
		$("#deleteItem").html(rol);
		$("#deleteConfirm").each(function(){
     		this.href += id;
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
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Roles/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>