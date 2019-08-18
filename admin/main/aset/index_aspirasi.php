<?php
  require('../general/connection.php');

  $title = "Aspirasi bulan ini";
  $filter_by = strval($_GET['filter_by']);
  $filter = strval($_GET['q']);
  $filter = to_query($filter_by,$filter);
  $stat = $con->prepare("select * from tb_aspirasi ".$filter. " order by tgl_kirim desc");
  $stat->execute();
  echo"  <h4><b>".$title."</b></h4><br>";
  echo"  <div class='table-block'>";
  echo"    <table class='table-form'>";
  echo"      <tr style='background-color:rgba(27,221,18,0.2)'>";
  echo"        <th style='min-width:25px;'  class='text-center'>No.</th>";
  echo"        <th style='min-width:225px;'>Nama Pengirim</th>";
  echo"        <th style='min-width:125px;'  class='text-center'>Kelas</th>";
  echo"        <th style='min-width:525px;'>Subject</th>";
  echo"        <th style='min-width:90px;' class='text-center'>Tanggal Dikirim</th>";
  echo"        <th style='min-width:10px;'  class='text-center'>Action</th>";
  echo"      </tr>";
  $no = 1;
  while ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
  if ($no % 2 == 1){
    echo"    <tr onclick='show_aset('show_aspirasi',".$row['aspirasi_id'].")' >";
  }
  else{
    echo"    <tr onclick='show_aset('show_aspirasi',".$row['aspirasi_id'].")' style='background-color:rgba(27,221,18,0.2)' >";
  }
  echo"        <td class='text-center'>".$no."</td>";
  echo"        <td >".$row['nama_pengirim']."</td>";
  echo"        <td class='text-center'>".$row['kontak']."</td>";
  echo"        <td >".$row['subject']."</td>";
  echo"        <td class='text-center'>".$row['tgl_kirim']."</td>";
  echo"        <td class='text-center' style='color:blue;' onclick='delete_aset(\"aspirasi\",\"".$row['aspirasi_id']."\")'>Delete</td>";
  echo"      </tr>";
  $no++;
  }
  echo"    </table>";
  echo"  </div>";

  function to_query($filter_by, $filter){
    switch ($filter_by) {
    case null || "":
        return "";
        break;
    case "time":
        if($filter == "this_month"){
          $GLOBALS['title'] = "Aspirasi bulan ini";
          return " where month(now()) = month(tgl_kirim)";
        }else{
          $GLOBALS['title'] = "Semua Aspirasi";
          return "";
        }
        break;
    case "name":
          $GLOBALS['title'] = "Aspirasi dari ". $filter;
        return "where nama_pengirim like '%".$filter."%'";
        break;
    case "kelas":
        return "";
        break;
    case "tanggal":
        return "";
        break;
    case "subject":
        return "";
        break;
    case "status":
        return "";
        break;
    default:
        return "";
    }
  }
?>
