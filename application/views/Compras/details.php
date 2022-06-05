<div class="container">

	<div class="form-group col-md-4 center">
    <label>Fecha de Compra</label>
    <p><?php echo($fechaCompra['fechaCompra']);?></p>
  </div>

  <div class="form-group col-md-4 center">
    <label>Fecha de Entrega</label>
    <p><?php echo($fechaCompra['fechaEntrega']);?></p>
  </div>

  <div class="form-group col-md-4 center">
    <label>Id Proveedor</label>
    <p><?php echo($fechaCompra['idProveedor']);?></p>
  </div>

  <div class="form-group col-md-4 center">
    <label>Id Producto</label>
    <p><?php echo($fechaCompra['idProducto']);?></p>
  </div>

  <div class="form-group col-md-4 center">
    <label>Cantidad de Productos</label>
    <p><?php echo($fechaCompra['cantidadCompra']);?></p>
  </div>

  <div class="form-group col-md-4 center">
    <label>Tipo de Pago</label>
    <p><?php echo($fechaCompra['tipoCompra']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Compras/edit/<?php echo($fechaCompra['idCompra'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Compras/index">Regresar</a>
  <div>
</div>