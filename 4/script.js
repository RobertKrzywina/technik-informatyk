function changeColor(choice) {

	switch (choice) {
		case 1:
			document.getElementById('textToChange').style.color = 'red';
			break;
		case 2:
			document.getElementById('textToChange').style.color = 'green';
			break;
		case 3:
			document.getElementById('textToChange').style.color = 'blue';
			break;
	}
}

function changeFontSize() {

	var newFontSize = document.getElementById('btnFont').value;

	document.getElementById('textToChange').style.fontSize = newFontSize + '%';
}

function changeFontType() {

	var value = document.getElementById('select').value;

	if (value == 'default') {
		document.getElementById('textToChange').style.fontStyle = '';
	} else if (value == 'italic') {
		document.getElementById('textToChange').style.fontStyle = 'italic';
	}
