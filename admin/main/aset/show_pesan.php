<?php 
  require('../general/connection.php');

  $aspirasi_id = strval($_GET['q']);
  $stat = $con->prepare("select * from tb_pesan where pesan_id = ?");
  $stat->bindparam(1,$aspirasi_id);
  $stat->execute();

  if ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
    echo "<div id='btn-back-admin' align='center' onclick='index_aset(\"index_pesan\",\"this_month\")'>";
    echo "  <i class='fa fa-arrow-left'></i>";
    echo "</div>";
    echo "<div>";
    echo "<h4><b>Detail data aspirasi dari : ".$row['nama_pengirim']."</b></h4>";
    echo "<h4>".$row['penerima']."</h4>";
    echo "<p>Nama pengirim : ".$row['nama_pengirim']."(".$row['kontak'].")</p>";
    echo "<p>".$row['isi_aspirasi']."</p>";
    echo "<p> Dikirim Tanggal : ".$row['tgl_kirim']."</p>";
    echo "</div>";

  }
?>