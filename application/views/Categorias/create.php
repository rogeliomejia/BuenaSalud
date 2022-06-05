
<form method="POST" action="<?php echo base_url();?>Categorias/create">
  <div class="form-group col-md-4">
    <label>Categoría</label>
    <input type="text" class="form-control" name="categoria" placeholder="Categoría" required>
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <input type="text" class="form-control" name="descripcion" placeholder="Descripción" required>
  </div>

<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Categorias/index">Regresar</a>
</div>
</form>

<br>