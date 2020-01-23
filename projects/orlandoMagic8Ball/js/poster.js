// Function to print DIV
function printDiv(snaptarget) {
	var printContents = document.getElementById(snaptarget).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;
};

