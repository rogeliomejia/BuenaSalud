
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Compras/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Fecha de Compra</th>
	<th>Fecha de Entrega</th>
	<th>Id Proveedor</th>
	<th>Id Producto</th>
	<th>Cantidad de Productos</th>
	<th>Tipo de Pago</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListCompras as $item) : ?>
<tr>
	<td><?php echo($item['idCompra']) ?></td>
	<td><?php echo($item['fechaCompra']) ?></td>
	<td><?php echo($item['fechaEntrega']) ?></td>
	<td><?php echo($item['idProveedor']) ?></td>
	<td><?php echo($item['idProducto']) ?></td>
	<td><?php echo($item['cantidadCompra']) ?></td>
	<td><?php echo($item['tipoCompra']) ?></td>

	<td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Compras/details/<?php echo($item['idCompra']) ?>">Detalles</a>
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Compras/edit/<?php echo($item['idCompra'])?>">Modificar</a>  
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idCompra']) ?>, '<?php echo($item['idCompra']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, idCompra){
		$("#deleteItem").html(idCompra);
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
        <h4 style="text-align: center;">¿Desea eliminar la siguiente compra: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Compras/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>