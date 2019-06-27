<?php

	require 'dbconnect.php';

	$conn = mysqli_connect($host, $user, $pass, $name) or die ('Błąd połączenia z DB!');

	$lastName = $_POST['lastName'];
	$firstName = $_POST['firstName'];
	$averageGrade = $_POST['averageGrade'];
	$class = $_POST['class'];

	$getClassIdQuery = "SELECT id FROM klasa WHERE nazwa = '$class'";

	$resultClassIdQuery = mysqli_query($conn, $getClassIdQuery) or die ('Błąd odczytu danych o id klasy!');

	$classId = mysqli_fetch_row($resultClassIdQuery);

	if (strlen($lastName) >= 2 && strlen($firstName) >= 2 && ($averageGrade >= 1 && $averageGrade <=6)) {

		$query = "INSERT INTO uczen (Nazwisko, Imie, Srednia_ocen, id_klasy) VALUES ('$lastName', '$firstName', '$averageGrade', '$classId[0]')";

		if ($conn->query($query) === TRUE) {
	    	echo "Dodano ucznia";
		} else {
	    	echo "Błąd: " . $query . "<br>" . $conn->error;
		}
	} else {
		echo "Błędne dane!";
	}
?>
