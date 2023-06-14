<?php 
try {
	$bdd = new
	PDO('mysql:host=localhost;dbname=projectdav;charset=utf8','root','root' );
} catch (Exception $e) {
	die('erreur:' . $e ->getMessage());
}





 ?>