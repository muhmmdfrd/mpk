function index_aset(aset_type,filter_name) {
  filter = filter_by(filter_name);
  var timeout = 400;
  $('#table-content').animate({height: 'toggle'},timeout);
  setTimeout(function(){
    $('#table-content').animate({height: 'toggle'},timeout);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table-content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "aset/" + aset_type + ".php?filter_by=" + window.filterize + "&q=" + filter, true);
    xmlhttp.send();
  },timeout + 400);
}

function show_aset(aset_type,aset_id) {
  var timeout = 400;
  $('#table-content').animate({height: 'toggle'},timeout);
  setTimeout(function(){
  $('#table-content').animate({height: 'toggle'},timeout);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table-content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "aset/" + aset_type + ".php?q=" + aset_id, true); 
    xmlhttp.send();
  },timeout + 400);
}

function delete_aset(aset_type,aset_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table-content").innerHTML = this.responseText;
            alert('Telah berhasil dihapus');
            index_aset('index_'+aset_type,'this_month');
        }
    };
    xmlhttp.open("GET", "aset/delete_aset.php?aset=" + aset_type + "&q=" + aset_id, true); 
    xmlhttp.send();

}

function filter_by(filter_name){
  switch(filter_name){
    case "this_month":
      window.filterize = "time";
      return "this_month";
    break;
    case "all":
      window.filterize = "time";
      return "all";
    break;
    case "name":
      window.filterize = "name";
      return $('#name').val();
    break;
  }
}

function show_filter(showing){
  $('#box-filter4').animate({height: 'toggle'},1000);  

}