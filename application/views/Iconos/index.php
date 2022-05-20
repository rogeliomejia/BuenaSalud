
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Iconos/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Nombre</th>
	<th>Ícono</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListIconos as $item) : ?>
<tr>
	<td><?php echo($item['idIcono']) ?></td>
	<td><?php echo($item['nombre']) ?></td>
	<td><i class="<?php echo($item['icono']) ?>" aria-hidden="true"></i></td>
	<td><!--<a class="btn btn-primary" 
		href="<?php echo base_url();?>Iconos/details/<?php echo($item['idIcono']) ?>">Detalles</a> |--> 
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Iconos/edit/<?php echo($item['idIcono'])?>">Modificar</a> | 
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idIcono']) ?>, '<?php echo($item['icono']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, icono){
		$("#deleteItem").addClass(icono);
		$("#deleteConfirm").each(function(){
     		this.href += id;
		})
		$("#modalTrigger").click();
	}

	function clearIcon(){
		$("#deleteItem").removeClass();
	}
</script>

<button style="display: none;" id="modalTrigger" class="btn btn-primary" data-toggle="modal" data-target="#modalDelete">Detalles</button> 

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4 style="text-align: center;">¿Desea eliminar el ícono: <i id="deleteItem" class="" aria-hidden="true"></i>  ?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Iconos/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal" onclick="clearIcon()">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>