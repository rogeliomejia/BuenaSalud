<html>  
 <head>  
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sb-1.3.3/sp-2.0.1/sl-1.4.0/datatables.min.css"/>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sb-1.3.3/sp-2.0.1/sl-1.4.0/datatables.min.js"></script>

    <style type="text/css">
        #tablaFarmacia td, th {
        vertical-align: middle;
        }
    </style>

</head>

<body>
<div class="container">
<a class="btn btn-success" style="margin-left: 90%; display: block;" href="<?php echo base_url();?>Carriers/create">Crear</a>
<table id="tablaFarmacia" class="table table-bordered table-striped"><thead>
<tr>
	<th>Id</th>
	<th>Carrier</th>
	<th>Teléfono</th>
    <th>Información</th> 
    <th>Actualización</th>  
    <th>Eliminación</th>  

</tr></thead>
 <?php foreach ($ListCarriers as $item) : ?>
<tr>
	<td><?php echo($item['idCarrier']) ?></td>
	<td><?php echo($item['carrier']) ?></td>
	<td><?php echo($item['telefonoCarrier']) ?></td>

	   <td><a class="btn btn-primary" 
		href="<?php echo base_url();?>Carriers/details/<?php echo($item['idCarrier']) ?>">Detalles</a></td>
		<td><a class="btn btn-info" 
		href="<?php echo base_url();?>Carriers/edit/<?php echo($item['idCarrier'])?>">Modificar</a>  
        </td>
		<td><a class="btn btn-danger" onclick="modal(<?php echo($item['idCarrier']) ?>, '<?php echo($item['carrier']) ?>')">Eliminar</a></td>
</tr>
<?php endforeach; ?>

<script>
	function modal(id, carrier){
		$("#deleteItem").html(carrier);
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
        <h4 style="text-align: center;">¿Desea eliminar el siguiente carrier: <b><span id="deleteItem"></span></b>?</h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" id="deleteConfirm" href="<?php echo base_url();?>Carriers/delete/">Eliminar</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

</table>
</div>
</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var table = $('#tablaFarmacia').DataTable({  
           "processing":false,
           "serverSide":true,
           "order":[],  
           "ajax":{  
                "url":"<?php echo base_url() . 'Carriers/fetch_user'; ?>",
                "type":"POST",
           },
           "columnDefs":[
                {
                     "targets":[3,4,5],
                     "orderable":false  
                }  
           ],
            "language": {
               "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
           },
           "bPaginate":"true",
           "sPaginationType":"full_numbers",
           "bLengthChange": "true",
           "bInfo" : "true",
           "dom": "Blfrtip",
           "buttons": [{"extend": "excelHtml5", "text": "Excel", "exportOptions": {
                    "columns": ":visible"}},
                       {"extend": "pdfHtml5", "text": "PDF", "exportOptions": {
                    "columns": ":visible"}, customize: function(doc) {
                         doc.content[1].margin = [ 165, 0, 0, 0 ],
                         doc.defaultStyle.fontSize = 15
                       }},
                       {"extend": "csvHtml5", "text": "CSV", "exportOptions": {
                    "columns": ":visible"}},
                       {"extend": "copyHtml5", "text": "Copiar", "exportOptions": {
                    "columns": ":visible"}},
                       {"extend": "print", "text": "Imprimir"},
                       {"extend": "colvis", "text": "Seleccionar Columnas"}]
      });
 });  
 </script>

