
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Sucursales/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Sucursal</th>
	<th>Dirección</th>
	<th>Teléfono</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListSucursales as $item) : ?>
<tr>
	<td><?php echo($item['idSucursal']) ?></td>
	<td><?php echo($item['sucursal']) ?></td>
	<td><?php echo($item['direccionSucursal']) ?></td>
	<td><?php echo($item['telefonoSucursal']) ?></td>

	<td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Sucursales/details/<?php echo($item['idSucursal']) ?>">Detalles</a>
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Sucursales/edit/<?php echo($item['idSucursal'])?>">Modificar</a>  
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idSucursal']) ?>, '<?php echo($item['sucursal']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, sucursal){
		$("#deleteItem").html(sucursal);
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
        <h4 style="text-align: center;">¿Desea eliminar la siguiente sucursal: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Sucursales/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>