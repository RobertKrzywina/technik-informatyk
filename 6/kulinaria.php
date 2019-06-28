<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<title>Restauracja Kulinaria.pl</title>
</head>
<body>

	<div class="container">
		<div class="banner">
			<h2>Restauracja Kulinaria.pl Zaprasza!</h2>
		</div>
		<div class="left">
			<p>Dania mięsne zamówisz już od 
				<?php 

					require 'dbconnect.php';

					$query = "SELECT MIN(cena) FROM dania";

					$result = mysqli_query($conn, $query) or die ('Błąd odczytu danych');

					$price = mysqli_fetch_row($result);

					echo $price[0];

					$conn->close();

				?>
			złotych</p>
			<img src="img/photo.jpg" alt="Pyszne spaghetti">
			<br>
			<a href="img/photo.jpg" id="downloadImage">Pobierz obraz</a>
		</div>
		<div class="main">
			<h3>Przekąski</h3>
				<?php 

					require 'dbconnect.php';

					$query = "SELECT id, nazwa, cena FROM dania";

					$result = mysqli_query($conn, $query) or die ('Błąd odczytu danych');

					$numOfRows = mysqli_num_rows($result);

					if ($numOfRows == 0) {
						echo "Brak danych";
					} else {

						while ($products = mysqli_fetch_row($result)) {
							echo "<p>$products[0] $products[1] $products[2]</p>";
						}
					}

					$conn->close();

				?>
		</div>
		<div class="right">
			<h3>Napoje</h3>
				<?php 

					require 'dbconnect.php';

					$query = "SELECT id, nazwa, cena FROM dania WHERE typ = '4'";

					$result = mysqli_query($conn, $query) or die ('Błąd odczytu danych');

					$numOfRows = mysqli_num_rows($result);

					if ($numOfRows == 0) {
						echo "Brak danych";
					} else {

						while ($products = mysqli_fetch_row($result)) {
							echo "<p>$products[0] $products[1] $products[2]</p>";
						}
					}

					$conn->close();

				?>
		</div>
		<div class="footer">
			Stronę internetową opracował: <i>NUMER_PESEL</i>
		</div>
	</div>

</body>
</html>
