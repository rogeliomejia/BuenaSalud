
</div>
<div style="display: block;">
<p class="footer">
	SISV11-Todos los derechos reservados
</p>
<a class="userInfo" href="<?php echo base_url();?>Home/logout">
<?php

$userData = $this->session->userdata('username');

		if($userData != null){
			echo($userData->nombre.' '.$userData->apellido.' (log out)');
		}

?>

</a>
</div>
	</body>
</html>