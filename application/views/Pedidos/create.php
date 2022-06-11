<form method="POST" action="<?php echo base_url();?>Pedidos/create">

<div class="form-group col-md-4">
    <label>Id</label>
    <input type="text" class="form-control" name="idPedido" placeholder="Id" required>
</div>

<div class="form-group col-md-4">
    <label>Cliente</label>
    <input type="text" class="form-control" name="idCliente" placeholder="Cliente" required>
</div>

<div class="form-group col-md-4">
    <label>Carrier</label>
    <input type="text" class="form-control" name="idCarrier" placeholder="Carrier" required>
</div>

<div class="form-group col-md-4">
    <label>Sucursal</label>
    <input type="text" class="form-control" name="idSucursal" placeholder="Sucursal" required>
</div>

<div class="form-group col-md-4">
    <label>Fecha Pedido</label>
    <input type="text" class="form-control" name="fechaPedido" placeholder="Fecha Pedido" required>
</div>

<div class="form-group col-md-4">
    <label>Fecha Envío</label>
    <input type="text" class="form-control" name="fechaEnvioVenta" placeholder="Fecha Envío" required>
</div>

<div class="form-group col-md-4">
    <label>Estado</label>
    <input type="text" class="form-control" name="entregado" placeholder="Estado" required>
</div>

<div class="form-group col-md-4">
    <label>Costo Envío</label>
    <input type="text" class="form-control" name="costoEnvio" placeholder="Costo Envío" required>
</div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Pedidos/index">Regresar</a>
</div>
</form>

<br>


