
<form method="POST" action="<?php echo base_url();?>Productos/create">
  <div class="form-group col-md-4">
    <label>Producto</label>
    <input type="text" class="form-control" name="producto" placeholder="Producto" required>
  </div>

  <div class="form-group col-md-4">
    <label>Categoria</label>
    <select name="idCategoria" id="cars" class="form-control" required>
      <option value="" selected>--Seleccione--</option>
      <?php foreach ($listCategorias as $item) : ?>
        <option value="<?php echo($item['idCategoria'])?>" 
          ><?php echo($item['categoria'])?></option>
      <?php endforeach; ?>
    </select>

  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <input type="text" class="form-control" name="descripcionProducto" placeholder="Descripción" required>
  </div>

  <div class="form-group col-md-4">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" placeholder="Precio" required>
  </div>

  <div class="form-group col-md-4">
    <label>Existencias</label>
    <input type="text" class="form-control" name="existencias" placeholder="Existencias" required>
  </div>

  <div class="form-group col-md-4">
    <label>Imagenes</label>
    <input type="text" class="form-control" name="imagenes" placeholder="url de imagen" required>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Productos/index">Regresar</a>
</div>
</form>

<br>