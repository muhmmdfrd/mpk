$(window).on('load',function(){
  change_month("now");
});

var month = new Date().getMonth() + 1;
var year = new Date().getFullYear();
function change_month(action) {
    date_calculation(action);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("calendar").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "general/calendar.php?month=" + month + "&year=" + year, true);
    xmlhttp.send();
}

function date_calculation(action){
  if (action == "before") {
    month--;
    if(month < 1){
      month = 12;
      year--;
    }
  }
  else if(action == "after" ){
    month++;
    if(month > 12){
      month = 1;
      year++;
    }
  }
  else if(action == "now" ){
    month = new Date().getMonth() + 1;
    year = new Date().getFullYear();
  }

}