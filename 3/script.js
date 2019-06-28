function onMouseOverFun() {
	document.getElementById('myForm').style.backgroundColor = 'deepskyblue';
}

function onMouseOutFun() {
	document.getElementById('myForm').style.backgroundColor = 'steelblue';
}

function clearForm() {
	document.getElementById('tytul').value = "";
	document.getElementById('gatunek').value = "";
	document.getElementById('rok').value = "";
	document.getElementById('ocena').value = "";
}
