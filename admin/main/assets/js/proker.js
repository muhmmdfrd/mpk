
function show_proker(proker) {
  var timeout = 400;
  $('#show_proker').animate({opacity: 'toggle'},timeout);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("hidden-konten").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "proker/show_proker.php?q=" + proker, true);
    xmlhttp.send();
}