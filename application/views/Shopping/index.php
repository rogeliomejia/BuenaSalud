<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>



<div class="cart-navbar">
	<div class="cart" onclick="abrir()">
		<i class="fa fa-shopping-cart fa-2x cart-icon"></i>
		<div class="cart-amount" id="cart-amount">0</div>
	</div>
	<div class="sumary" id="sumary">
		<div class="row">
			<div class="pro col-md-0" style="display: none;">idProd</div>
			<div class="pro col-md-6" >Producto</div>
			<div class="pro col-md-3">Cantidad</div>
			<div class="pro col-md-3">Subtotal</div>
		</div>
		<div class="row" id="row"></div>
		<div class="row" id="total"></div>
		<br>
		<div class="row">
			<a class="btn btn-success" style="display: block; width: 80px; margin: auto;" onclick="modal()"
			>Pagar</a>
		</div>
	</div>
</div>




<button style="display: none;" id="modalTrigger" class="btn btn-primary" data-toggle="modal" data-target="#modalPago">Detalles</button> 

<div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4 style="text-align: center;">Sus productos seleccionados son:<h4>
        	<br>
        	<div class="row" id="mod"></div>
        	<br><br>
        	<div class="">

        		<table>
        			<tr>
        				<td>Cliente:</td>
        				<td><input type="text" class="formaPago"></td>
        				<td>Carrier:</td>
        				<td><input type="text" class="formaPago"></td>
        			</tr>
        			<tr>
        				<td>Fecha envío:</td>
        				<td><input type="date" class="formaPago"></td>
        				<td>Costo envío:</td>
        				<td><input type="text" class="formaPago"></td>
        			</tr>
        		</table>
<div class="row" id="totalModal"></div>
        	</div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" id="payment" href="">Procesar pago</a>
        <a class="btn btn-primary" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>

<script>
	function modal(){
		
		$("#modalTrigger").click();
	}
</script>

<div id="shop">
<?php foreach ($ListProductos as $item) : ?>
	<div class="card" style="margin: 20px 80px; position:relative !important; float:left !important; ">
		<img src="<?php echo($item['imagenes']) ?>" height="150" width="200" />
		<div class="text-container" style="display: inline;">
			<h4 class="product-title"><?php echo($item['producto']) ?></h4>
			<input type="hidden" name="idProd" value="<?php echo($item['idProducto'])?>">
			<p class="product-price">$<?php echo($item['precio']) ?></p>
			<!--<a class="btn btn-primary" style="display: block; width: 125px; margin: auto;" href="<?php echo base_url();?>Shopping/addtocart/<?php echo($item['idProducto']) ?>">Añadir al carrito</a> -->

			<a class="btn btn-primary" style="display: block; width: 125px; margin: auto;" 
			onclick="addProduct(<?php echo($item['idProducto']) ?>, '<?php echo($item['producto']) ?>', <?php echo($item['precio']) ?>)">Añadir al carrito</a>
		</div>
	</div>
<?php endforeach; ?>
</div>

<script>

$("document").ready(function(){
$("#sumary").hide();

$("#sumary").mouseleave( function(){
	$("#sumary").hide();
} )

});

const item = {idProd: "0", prod: "generico", price: "0"};
let sell = [];
let seleccionado = [];
let summary = "";
let acumulado = 0;


function addProduct(id, producto, precio){
item.idProd = id;
item.prod = producto;
item.price = precio;

/*line = '<div class="pro col-md-0" style="display: none;">'+item.idProd+'</div>'+
			'<div class="pro col-md-6">'+item.prod+'</div>'+
			'<div class="pro col-md-3">'+item.price+'</div>';*/
			//'<div class="pro col-md-3">'+(item.price*item.idProd)+'</div>';
summary+= line;

object = '{"idProducto": '+item.idProd+', "producto": "'+item.prod+'", "precio": '+item.price+'}';
presell = JSON.parse('{"idProd": '+item.idProd+', "prod": "'+item.prod+'", "price": '+item.price+', "quant": 1}');
seleccionado.push(JSON.parse(object));

$("#cart-amount").html(seleccionado.length);
//$("#row").html(summary);


var found = false;
var index = 0;

for(var i = 0; i < sell.length; i++) {
	index= i;
    if (sell[i].idProd == id) {
        found = true;
        break;
    }

}

if(!found){
	sell.push(presell);
}else{
	sell[index].price=sell[index].price+presell.price;
	sell[index].quant=sell[index].quant+presell.quant;
}

acumulado += precio;

var line="";
for (const it of sell) {
	line+= '<div class="pro col-md-0" style="display: none;">'+it.idProd+'</div>'+
			'<div class="pro col-md-6">'+it.prod+'</div>'+
			'<div class="pro col-md-3">'+it.quant+'</div>'+
			'<div class="pro col-md-3">'+Math.round(it.price * 100) / 100+'</div>';
}

$("#row,#mod").html(line);
$("#total,#totalModal").html('<div class="pro col-md-12" style="margin-left: 3em; font-weight: bold; margin-top:15px; font-size: 2.5em;"> Total: $'+Math.round(acumulado * 100) / 100+'</div>');

console.log(sell);
console.log(seleccionado);
//mostrartotal(item);


}

function abrir(){
	$("#sumary").show();
};


</script>