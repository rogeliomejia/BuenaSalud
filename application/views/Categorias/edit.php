
<form method="POST" action="<?php echo base_url();?>Categorias/update">
  <div class="form-group" style="display:none">
    <label>Id</label>
    <input type="text" class="form-control" name="idCategoria" placeholder="idCategoria" value="<?php echo($categoria['idCategoria']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Categoría</label>
    <input type="text" class="form-control" name="categoria" placeholder="Categoría" value="<?php echo($categoria['categoria']);?>">
  </div>

  <div class="form-group col-md-4">
    <label>Descripción</label>
    <input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="<?php echo($categoria['descripcion']);?>">
  </div>


<div class="form-group col-md-12">
  <button type="submit" class="btn btn-primary">Modificar</button>

  <a class="btn btn-warning" href="<?php echo base_url();?>Categorias/index">Regresar</a>
</div>

</form>

<br>