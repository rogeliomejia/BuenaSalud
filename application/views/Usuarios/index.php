
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Usuarios/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Username</th>
	<th>E-mail</th>
	<th>Dirección</th>
	<th>Rol</th>
	<th>Teléfono</th>
	<th>Bloqueado</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListUsuarios as $item) : ?>
<tr>
	<td><?php echo($item['id']) ?></td>
	<td><?php echo($item['nombre']) ?></td>
	<td><?php echo($item['apellido']) ?></td>
	<td><?php echo($item['username']) ?></td>
	<td><?php echo($item['email']) ?></td>
	<td><?php echo($item['direccion']) ?></td>
	<td><?php echo($item['rol']) ?></td>
	<td><?php echo($item['telefono']) ?></td>
	<td><?php echo(($item['isBlocked']==1)?"Sí":"No") ?></td>
	<td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Usuarios/details/<?php echo($item['id']) ?>">Detalles</a> | 
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Usuarios/edit/<?php echo($item['id'])?>">Modificar</a> | 
		<a class="btn btn-danger" onclick="modal(<?php echo($item['id']) ?>, '<?php echo($item['nombre']) ?>', '<?php echo($item['apellido']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, nombre, apellido){
		$("#deleteItem").html(nombre+" "+apellido);
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
        <h4 style="text-align: center;">¿Desea eliminar el siguiente registro: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Usuarios/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>