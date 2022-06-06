
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Productos/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Producto</th>
	<th>Categoría</th>
	<th>Descripción</th>
	<th>Precio</th>
	<th>Existencias</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListProductos as $item) : ?>
<tr>
	<td><?php echo($item['idProducto']) ?></td>
	<td><?php echo($item['producto']) ?></td>
	<td><?php echo($item['idCategoria']) ?></td>
	<td style="width: 300px;"><?php echo($item['descripcionProducto']) ?></td>
	<td><?php echo($item['precio']) ?></td>
	<td><?php echo($item['existencias']) ?></td>

	<td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Productos/details/<?php echo($item['idProducto']) ?>">Detalles</a>
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Productos/edit/<?php echo($item['idProducto'])?>">Modificar</a>  
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idProducto']) ?>, '<?php echo($item['producto']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, producto){
		$("#deleteItem").html(producto);
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
        <h4 style="text-align: center;">¿Desea eliminar el siguiente producto: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Productos/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>