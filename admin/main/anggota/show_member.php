<?php 
  require('../general/connection.php');

  $anggota_id = strval($_GET['q']);
  $stat = $con->prepare("select tb_anggota.*,angkatan, jabatan from tb_anggota join tb_angkatan using(angkatan_id) join tb_jabatan using (jabatan_id) where anggota_id = ?");
  $stat->bindparam(1,$anggota_id);
  $stat->execute();

  if ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
    echo "<div id='btn-back-admin' align='center' onclick='show_member(".$row['angkatan'].",false)'>";
    echo "  <i class='fa fa-arrow-left'></i>";
    echo "</div>";
    echo "<div class='nav-anggota col-md-12'>";
    echo "  Detail data anggota : ".$row['nama'];
    echo "</div>";
    echo "<div class='list-anggota col-md-12'>";
    echo $row['nama'];
    echo "<b> ( Angkatan : ".$row['angkatan']." ) </b>";
    echo "<p>".$row['kelas']."</p>";
    echo "<p> Jabatan : ".$row['jabatan']."</p>";
    echo "<p> Kontak : </p>";
    echo "<p> ".$row['kontak']." </p>";
    echo "<p> Alamat : </p>";
    echo "<p> ".$row['alamat']." </p>";
    echo "</div>";

  }
?>