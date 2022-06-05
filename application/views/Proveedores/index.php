
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Proveedores/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Proveedor</th>
	<th>Teléfono</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListProveedores as $item) : ?>
<tr>
	<td><?php echo($item['idProveedor']) ?></td>
	<td><?php echo($item['proveedor']) ?></td>
	<td><?php echo($item['telefonoProveedor']) ?></td>

	<td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Proveedores/details/<?php echo($item['idProveedor']) ?>">Detalles</a>
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Proveedores/edit/<?php echo($item['idProveedor'])?>">Modificar</a>  
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idProveedor']) ?>, '<?php echo($item['proveedor']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, proveedor){
		$("#deleteItem").html(proveedor);
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
        <h4 style="text-align: center;">¿Desea eliminar el siguiente proveedor: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Proveedores/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>