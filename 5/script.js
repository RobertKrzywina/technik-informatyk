function order() {

	var coffeeNumber = document.getElementById('coffeeNumber').value;
	var coffeeWeight = document.getElementById('coffeeWeight').value;

	var totalPrice = 0;

	switch (coffeeNumber) {
		case '1': totalPrice = coffeeWeight * 5; break;
		case '2': totalPrice = coffeeWeight * 7; break;
		case '3': totalPrice = coffeeWeight * 6; break;
		default: totalPrice = 0;
	}

	document.getElementById('summary').innerHTML = "Koszt zamówienia wynosi " + totalPrice + " zł";
}
