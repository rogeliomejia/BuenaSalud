<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>La Buena Salud</title>


	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link type="text/css" href="<?= base_url(); ?>css/main.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link href="<?= base_url(); ?>css/lib/main.css" rel="stylesheet" />
    <script src="<?= base_url(); ?>css/lib/main.js"></script>

</head>

	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">

				</div>
			</div>
			<div id="navbar">
				<ul class="nav navbar-nav" id="nav">
					
					<?php
					
					$cont = 0;
					if($this->session->userdata('username') != null):

					 foreach ($menuOptions as $item) : ?>
						
						<?php


if ($cont != 0 && $item['idPadre'] == 0){
echo("</ul>");
echo("</li>");
}

 ?>

<?php
if ($item['idPadre'] == 0): 
$cont++;
	?>

						<li>
							<?php if ($item['opcion']==='Inicio' || $item['opcion']==='Home'): ?>
								<a href="<?php echo base_url();?><?php echo($item['url']); ?>">
									<i class="<?php echo($item['icono']); ?>" aria-hidden="true"></i> <?php echo($item['opcion']); ?>
								</a>
							<?php else: ?>
								<p>
									<i class="<?php echo($item['icono']); ?>" aria-hidden="true"></i> <?php echo($item['opcion']); ?>
								</p>
							<?php endif; ?>


							
						<ul>




<?php elseif ($item['idPadre'] > 0): ?>
							
								<li>
									<a href="<?php echo base_url();?><?php echo($item['url']); ?>">
										<i class="<?php echo($item['icono']); ?>" aria-hidden="true"></i> <?php echo($item['opcion']);?>
									</a>
								</li>
					
<?php endif; ?>


			

					

					<?php 
						endforeach; 
						endif;
						?>

</ul> 
					</li>
					
				</ul>
				
			</div>
		</nav>

		<h1>Farmacia la Buena Salud</h1>
<div class="container" style="display: block;">