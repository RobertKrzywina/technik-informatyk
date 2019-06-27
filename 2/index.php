<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Dwa</title>
  
    <style>
        
        body {
	        background-color: skyblue;
        }

    </style>
</head>
<body>

	<form action="index.php" method="post">
<!-- 		<label>Podaj nazwę klasy: <input type="text" name="value"></label>
		<input type="submit" value="Pokaż oceny"> -->

		<label>Wybierz klasę:
			<select name="value">
				<?php
					require 'dbconnect.php';

					$conn = mysqli_connect($host, $user, $pass, $name) or die ('Błąd połączenia z DB!');

					$query = "SELECT nazwa FROM klasa";

					$result = mysqli_query($conn, $query) or die ('Błąd odczytu danych!');

					while ($row = mysqli_fetch_row($result)) echo "<option value='$row[0]'>$row[0]</option>"
				?>
			</select> 
		</label>
		<input type="submit" value="Submit the form"/>
	</form>

	<?php

	if (isset($_POST['value'])) {

		if ($_POST['value'] == null) {
			echo "<span style='color: yellow;'>Nie podano nazwy klasy!</span>";
		} else {

			echo "<br>Wybrana klasa to: <b>".$_POST['value']."</b><br>";

			require 'dbconnect.php';

			$conn = mysqli_connect($host, $user, $pass, $name) or die ('Błąd połączenia z DB!');

			mysqli_set_charset($conn, 'utf8');

			$value = $_POST['value'];

			$query = "SELECT Imie, Nazwisko, Srednia_ocen FROM uczen JOIN klasa ON uczen.id_klasy = klasa.id WHERE klasa.nazwa = '$value'";
			$getEducatorQuery = "SELECT Imie, Nazwisko FROM wychowawca JOIN klasa ON wychowawca.id_klasy = klasa.id WHERE klasa.nazwa = '$value'";

			$result = mysqli_query($conn, $query) or die ('Błąd odczytu danych!');
			$resultEducator = mysqli_query($conn, $getEducatorQuery) or die ('Błąd odczytu danych wychowawcy!');

			echo "Wychowawca: ";

			while ($row = mysqli_fetch_row($resultEducator)) {
				echo $row[0]." ";
				echo $row[1];
			}

			echo "<br>";

			$numOfRows = mysqli_num_rows($result);

			if ($numOfRows == 0) {
				echo "<span style='color: red;'>Nie ma takiej klasy w szkole!</span>";
			} else {

				echo<<<END

				<br>

				<table border="1">
					<thead>
						<tr>
							<th>L.p.</th>
							<th>Imie</th>
							<th>Nazwisko</th>
							<th>Średnia ocen</th>
						</tr>
					</thead>
					<tbody>
				END;

				$sum = 0;
				$counter = 1;

				while ($row = mysqli_fetch_row($result)) {
					echo<<<END

						<tr>
							<th>$counter</th>
							<th>$row[0]</th>
							<th>$row[1]</th>
							<th>$row[2]</th>
						</tr>

					END;

					$sum += $row[2];
					$counter++;
				}

				echo<<<END

					</tbody>
				</table>

				<br>

				END;

				echo "Średnia ocen: ".round($sum / ($counter - 1), 2);
			}
		}
	}

	?>

	<h1>Dodaj ucznia!</h1>

	<form action="insert.php" method="post">
		<label>Nazwisko: <input type="text" name="lastName"></label><br><br>
		<label>Imie: <input type="text" name="firstName"></label><br><br>
		<label>Średnia ocen: <input type="text" name="averageGrade"></label><br><br>
		<label>Wybierz klasę:
			<select name="class">
				<?php
					require 'dbconnect.php';

					$conn = mysqli_connect($host, $user, $pass, $name) or die ('Błąd połączenia z DB!');

					$query = "SELECT nazwa FROM klasa";

					$result = mysqli_query($conn, $query) or die ('Błąd odczytu danych!');

					while ($row = mysqli_fetch_row($result)) echo "<option value='$row[0]'>$row[0]</option>"
				?>
			</select> 
		</label><br><br>
		<input type="submit" value="Dodaj!">
	</form>

	<script src="script.js"></script>
</body>
</html>
