<div class="container">

<div class="form-group col-md-4">
    <label>Id</label>
    <p><?php echo($idPedido['idPedido']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Cliente</label>
    <p><?php echo($idPedido['idCliente']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Carrier</label>
    <p><?php echo($idPedido['idCarrier']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Sucursal</label>
    <p><?php echo($idPedido['idSucursal']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Fecha Pedido</label>
    <p><?php echo($idPedido['fechaPedido']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Fecha Envío</label>
    <p><?php echo($idPedido['fechaEnvioVenta']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Estado de Entrega</label>
    <p><?php echo($idPedido['entregado']);?></p>
  </div>

  <div class="form-group col-md-4">
    <label>Costo Envío</label>
    <p><?php echo($idPedido['costoEnvio']);?></p>
  </div>

  <br>
  <div class="form-group col-md-12">
  <a class="btn btn-info" 
    href="<?php echo base_url();?>Pedidos/edit/<?php echo($idPedido['idPedido'])?>">Modificar</a>
  <a class="btn btn-warning" href="<?php echo base_url();?>Pedidos/index">Regresar</a>
  <div>
</div>

  
