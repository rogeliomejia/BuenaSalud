
<form method="POST" action="<?php echo base_url();?>Compras/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idCompra" placeholder="idCompra" value="<?php echo($fechaCompra['idCompra']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Fecha de Compra</label>
    <input type="text" class="form-control" name="fechaCompra" placeholder="YYYY/MM/DD" value="<?php echo($fechaCompra['fechaCompra']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Fecha de Entrega</label>
    <input type="text" class="form-control" name="fechaEntrega" placeholder="YYYY/MM/DD" value="<?php echo($fechaCompra['fechaEntrega']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Id Proveedor</label>
    <input type="text" class="form-control" name="idProveedor" placeholder="Id Proveedor" value="<?php echo($fechaCompra['idProveedor']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Id Producto</label>
    <input type="text" class="form-control" name="idProducto" placeholder="Id Producto" value="<?php echo($fechaCompra['idProducto']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Cantidad de Productos</label>
    <input type="text" class="form-control" name="cantidadCompra" placeholder="Cantidad de Productos" value="<?php echo($fechaCompra['cantidadCompra']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Tipo de Pago</label>
    <input type="text" class="form-control" name="tipoCompra" placeholder="Tipo de Pago" value="<?php echo($fechaCompra['tipoCompra']);?>">
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Compras/index">Regresar</a>
</div>

</form>

<br>