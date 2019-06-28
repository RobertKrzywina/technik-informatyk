<?php

	$host = 'localhost';
	$user = 'root';
	$pass =  null;
	$name = 'dane';

	$conn = mysqli_connect($host, $user, $pass, $name) or die ('Błąd połączenia z DB!');

	$tytul = $_POST['tytul'];
	$gatunek = $_POST['gatunek'];
	$rok = $_POST['rok'];
	$ocena = $_POST['ocena'];

	$query = "INSERT INTO filmy (gatunki_id, tytul, rok, ocena) 
			  VALUES ('$gatunek', '$tytul', '$rok', '$ocena')";

	if ($conn->query($query) === true) {
		echo "Film ".$tytul." został dodany do bazy";
	} else {
		echo "Nie udało się dodać filmu!";
	}

	$conn->close();
?>
