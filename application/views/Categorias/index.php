
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Categorias/create">Crear</a>
<table class="center">
<tr>
	<th>Id</th>
	<th>Categoria</th>
	<th>Descripción</th>
	<th>Opciones</th>
</tr>
<?php foreach ($ListCategorias as $item) : ?>
<tr>
	<td><?php echo($item['idCategoria']) ?></td>
	<td><?php echo($item['categoria']) ?></td>
	<td><?php echo($item['descripcion']) ?></td>

	<td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Categorias/details/<?php echo($item['idCategoria']) ?>">Detalles</a>
		<a class="btn btn-info" 
		href="<?php echo base_url();?>Categorias/edit/<?php echo($item['idCategoria'])?>">Modificar</a>  
		<a class="btn btn-danger" onclick="modal(<?php echo($item['idCategoria']) ?>, '<?php echo($item['categoria']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, categoria){
		$("#deleteItem").html(categoria);
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
        <h4 style="text-align: center;">¿Desea eliminar la siguiente categoria: <b><span id="deleteItem"></span></b>?<h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Categorias/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>