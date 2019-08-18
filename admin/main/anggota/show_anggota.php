<?php 
  require('../general/connection.php');

  $angkatan = strval($_GET['q']);
  $stat = $con->prepare("select angkatan_id from tb_angkatan where angkatan = ?");
  $stat->bindparam(1,$angkatan);
  $stat->execute();
  $angkatan_id = $stat->fetch(PDO::FETCH_ASSOC)['angkatan_id'];

  $show_anggota = "select * from tb_anggota where angkatan_id = ?";
  $statement = $con->prepare($show_anggota);
  $statement->bindparam(1, $angkatan_id);
  $statement->execute();

  echo "<div id='btn-back-admin' align='center' onclick='show_anggota(null)'>";
  echo "  <i class='fa fa-arrow-left'></i>";
  echo "</div>";
  echo "<div class='nav-anggota col-md-12'>";
  echo "  List Anggota Angkatan ".$angkatan;
  echo "  <div class='btn-add-admin' style='float:right;' onclick='form_anggota(".$angkatan.",true);'>";
  echo "    Tambah Anggota";
  echo "  </div>";
  echo "</div>";
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='list-anggota col-md-12' onclick='show_member(".$row['anggota_id'].",true);'>";
    echo $row['nama'];
    echo "</div>";

  }
?>