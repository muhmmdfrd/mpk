$(window).ready(function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("member-content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "anggota/show_angkatan.php?", true);
    xmlhttp.send();
});

function show_anggota(angkatan) {
  var timeout = 400;
  $('#member-content').animate({opacity: 'toggle'},timeout);
  setTimeout(function(){
    $('#member-content').animate({opacity: 'toggle'},timeout);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("member-content").innerHTML = this.responseText;
        }
    };
    if (angkatan){
      xmlhttp.open("GET", "anggota/show_anggota.php?q=" + angkatan, true);
    }
    else {
      xmlhttp.open("GET", "anggota/show_angkatan.php?", true);
    }
    xmlhttp.send();
  },timeout + 400);
}


function show_member(member, showing) {
  var timeout = 400;
  $('#member-content').animate({opacity: 'toggle'},timeout);
  setTimeout(function(){
    $('#member-content').animate({opacity: 'toggle'},timeout);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("member-content").innerHTML = this.responseText;
        }
    };
    if (showing){
      xmlhttp.open("GET", "anggota/show_member.php?q=" + member, true);
    }
    else {
      xmlhttp.open("GET", "anggota/show_anggota.php?q= "+ member, true);
    }
    xmlhttp.send();
  },timeout + 400);
}

function form_angkatan(showing) {
  var timeout = 400;
  $('#member-content').animate({opacity: 'toggle'},timeout);
  setTimeout(function(){
    $('#member-content').animate({opacity: 'toggle'},timeout);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("member-content").innerHTML = this.responseText;
        }
    };
    if (showing){
      xmlhttp.open("GET", "anggota/form_angkatan.php?", true);
    }
    else {
      xmlhttp.open("GET", "anggota/show_angkatan.php?", true);
    }
    xmlhttp.send();
  },timeout + 400);
}


function form_anggota(angkatan_id,showing) {
  var timeout = 400;
  $('#member-content').animate({opacity: 'toggle'},timeout);
  setTimeout(function(){
    $('#member-content').animate({opacity: 'toggle'},timeout);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("member-content").innerHTML = this.responseText;
        }
    };
    if (showing){
      xmlhttp.open("GET", "anggota/form_anggota.php?q=" + angkatan_id, true);
    }
    else {
      xmlhttp.open("GET", "anggota/show_anggota.php?q=" + angkatan_id, true);
    }
    xmlhttp.send();
  },timeout + 400);
}