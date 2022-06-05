
<form method="POST" action="<?php echo base_url();?>Compras/create">

  <div class="form-group col-md-4">
    <label>Fecha de Compra</label>
    <input type="text" class="form-control" name="fechaCompra" placeholder="YYYY/MM/DD" required>
  </div>

  <div class="form-group col-md-4">
    <label>Fecha de Entrega</label>
    <input type="text" class="form-control" name="fechaEntrega" placeholder="YYYY/MM/DD" required>
  </div>

  <div class="form-group col-md-4">
    <label>Id Proveedor</label>
    <input type="text" class="form-control" name="idProveedor" placeholder="Id Proveedor" required>
  </div>

  <div class="form-group col-md-4">
    <label>Id Producto</label>
    <input type="text" class="form-control" name="idProducto" placeholder="Id Producto" required>
  </div>

  <div class="form-group col-md-4">
    <label>Cantidad de Productos</label>
    <input type="text" class="form-control" name="cantidadCompra" placeholder="Cantidad de Productos" required>
  </div>

  <div class="form-group col-md-4">
    <label>Tipo de Pago</label>
    <input type="text" class="form-control" name="tipoCompra" placeholder="Tipo de Pago" required>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Compras/index">Regresar</a>
</div>
</form>

<br>