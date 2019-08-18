<?php
  require "../general/connection.php";

  $show_angkatan = "select tb_angkatan.*,count(tb_anggota.anggota_id) as jumlah from tb_angkatan left join tb_anggota using(angkatan_id) group by angkatan_id order by active desc,angkatan";
  $statement = $con->prepare($show_angkatan);
  $statement->execute();

  echo "<div class='nav-anggota col-md-12'>";
  echo "  List Angkatan";
  echo "  <div class='btn-add-admin' style='float:right;' onclick='form_angkatan(true);'>";
  echo "    Tambah Angkatan";
  echo "  </div>";
  echo "</div>";
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='list-angkatan col-md-12' onclick='show_anggota(".$row['angkatan'].")'>";
    echo "  <h4><b>Angkatan ".$row['angkatan']."</b></h4>";
    echo "  <p align='justify'>";
    echo      $row['visi_angkatan'];
    echo "  </p>";
    echo "  <div style='margin: 30px 0px 20px'>";
    echo "    Start &nbsp;&nbsp;&nbsp;<p class='masa-jabatan-start'>".$row['masa_jabatan']."</p>";
    echo "    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "    End &nbsp;&nbsp;&nbsp;<p class='masa-jabatan-end'>".(intval($row['masa_jabatan']) + 1)."</p>";
    echo "  </div>";
    echo "  <br>";
    echo "  <br>";
    echo "  <div class='info-angkatan'>";
    echo "    <hr class='angkatan-break'>";
    echo "    <b>".$row['jumlah']." Anggota</b>";
    echo "  </div>";
    echo "</div>";
  }
?>