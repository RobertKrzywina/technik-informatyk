<?php

	$host = 'localhost';
	$user = 'root';
	$pass =  null;
	$name = 'baza';

	$conn = mysqli_connect($host, $user, $pass, $name) or die ('Błąd połączenia z bazą danych');

?>
