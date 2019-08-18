
  <?php
    require '../general/connection.php';
    $proker_id = strval($_GET['q']);
    $query = "select * from tb_proker where proker_id = ?";
    $stat = $con->prepare($query);
    $stat->bindparam(1, $proker_id);
    $stat->execute();

    if ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
      echo "<hr>";
      echo "<div class='konten'>";
      echo "<h1><b>".$row['nama_proker']."</b></h1>";
      echo "<br>";
      echo "<h5>".$row['desc_proker']."</h5>";
      echo "<br>";
      echo "<h5 style='color:blue;'>".$row['tgl_kegiatan']."</h5>";
      echo "</div>";
    }
    echo "<div id='btn-back-admin' align='center' onclick='show_proker(null)'>";
    echo "  <i class='fa fa-arrow-left'></i>";
    echo "</div>";
  ?>