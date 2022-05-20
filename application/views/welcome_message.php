<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>La Buena Salud</title>

	<link rel="stylesheet" href="css/main.css">
</head>
<body>

<!--<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php /*echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' */?></p>
</div>-->



<?php
$this->session->set_userdata('username', null);
?>

<form method="POST" action="<?php echo base_url();?>Home/index" >
	<p>Usuario:</p>
	<input type="text" placeholder="username" value="<?php echo set_value('username')?>" name="username" required>
	<p>Contraseña:</p>
	<input type="password" placeholder="********" value="<?php echo set_value('pass')?>" name="pass" required>
	<br><br>
	<input type="submit" value="Entrar"/>
</form>
<?php
$this->load->view('shared/footer');
?>
</body>
</html>
