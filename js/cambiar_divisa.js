function changeCurrency(currency) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("saldo").innerHTML = "Saldo: <strong>" + this.responseText + "</strong>";
        }
    };
    xhttp.open("POST", "change_currency.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("currency=" + currency);
}