<?php
	
	$host = 'localhost';
	$user = 'root';
	$pass =  null;
	$name = 'dane';

	$conn = mysqli_connect($host, $user, $pass, $name) or die ('Błąd połączenia z DB!');

	$query = 'SELECT * FROM filmy';

	$result = mysqli_query($conn, $query) or die ('Błąd odczytu danych!');

	$numOfRows = mysqli_num_rows($result);

	if ($numOfRows == 0) {
		echo 'Brak filmów w bazie danych';
	} else {

		echo<<<END

		<table border="1">
			<thead>
				<tr>
					<th>Id</th>
					<th>gatunki_id</th>
					<th>reżyserzy_id</th>
					<th>tytuł</th>
					<th>rok</th>
					<th>ocena</th>	
				</tr>
			</thead>
			<tbody>

		END;

		while ($col = mysqli_fetch_row($result)) {
			echo<<<END

			<tr>
				<th>$col[0]</th>
				<th>$col[1]</th>
				<th>$col[2]</th>
				<th>$col[3]</th>
				<th>$col[4]</th>
				<th>$col[5]</th>
			</tr>

			END;
		}

		<<<END

			</tbody>
		</table>

		END;
	}

	$conn->close();
?>
