
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Accesos/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Id padre</th>
	<th>Opción</th>
	<th>url</th>
	<th>Grupo</th>
	<th>Ícono</th>
	<th>Orden</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListAccesos as $item) : ?>
<tr>
	<td><?php echo($item['idAcceso']) ?></td>
	<td><?php echo($item['idPadre']) ?></td>
	<td><?php echo($item['opcion']) ?></td>
	<td><?php echo($item['url']) ?></td>
	<td><?php echo($item['grupo']) ?></td>
	<td><i class="<?php echo($item['icono']) ?>" aria-hidden="true"></i></td>
	<td><?php echo($item['orden']) ?></td>

	<td><!--<a class="btn btn-primary" 
		href="<?php echo base_url();?>Iconos/details/<?php echo($item['idAcceso']) ?>">Detalles</a> |--> 
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Accesos/edit/<?php echo($item['idAcceso'])?>">Modificar</a> | 
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idAcceso']) ?>, '<?php echo($item['opcion']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, opcion){
		$("#deleteItem").html(opcion);
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
        <h4 style="text-align: center;">¿Desea eliminar el siguiente acceso: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Accesos/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>