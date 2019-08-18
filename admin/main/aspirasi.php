<?php
 require('general/date_time.php');
 require('general/connection.php');
?>

<?php
  $weekNumber = date('W') - 7;
  $chart_labels = array();
  $chart_datas = array();
  $no = 0 ;

  $find_datas = "SELECT week(tgl_kirim),COUNT(aspirasi_id) from tb_aspirasi WHERE week(tgl_kirim) < week(now()) + 1 AND year(tgl_kirim) = year(now()) GROUP BY week(tgl_kirim) limit 8" ;
  $stat = $con->prepare($find_datas);
  $stat->execute();
  $i = 0;
  while ($row = $stat->fetch(PDO::FETCH_ASSOC) ) {
    for($i; $i < 8; $i++){
      $chart_labels[$i] = "Minggu ke-".intval($weekNumber + $i);
      if(intval($weekNumber + $i) == $row['week(tgl_kirim)']){
        $chart_datas[$i] = $row['COUNT(aspirasi_id)'];
        $i++;break;
      }else{
        $chart_datas[$i] = 0;
      }
    }
  }
  for($i; $i < 8; $i++){
    $chart_labels[$i] = "Minggu ke-".intval($weekNumber + $i);
    $chart_datas[$i] = 0;
  }
  
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Majelis Permusyawaratan Kelas</title>
  <!--CSS Tag-->
  <link rel="stylesheet" type="text/css" href="../../assets/font.css">
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/general.css">
  <link rel="stylesheet" type="text/css" href="assets/css/aset.css">

</head>
<body onload="convert_array_php_to_js();index_aset('index_aspirasi','this_month');">
  <div class='container-fluid'>
    <div class='col-lg-12'>
      <div class='konten'>
        <h4>Diagram Aspirasi</h4>
        <div style="overflow-x: auto;">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>
    <div class='col-lg-4 mobile-slide' id='box-filter1'>
      <div class='konten' onclick=" index_aset('index_aspirasi','this_month');">
        <h4><b>Aspirasi Bulan ini</b></h4>
        <?php echo get_month(date('m')); ?>
      </div>
    </div>
    <div class='col-lg-4 mobile-slide' id='box-filter2'>
      <div class='konten' onclick=" index_aset('index_aspirasi','all');">
        <h4><b>Semua Aspirasi</b></h4>
        <?php echo date('Y-m-d'); ?>
      </div>
    </div>
    <div class='col-lg-4 mobile-slide' id='box-filter3'>
      <div class='konten' onclick="show_filter();">
        <h4><b>Cari Aspirasi</b></h4>
        <span>Nathieq</span>
      </div>
    </div>
    <div class='col-lg-12 mobile-slide' id='box-filter4'>
      <div class='konten'>
        <div class="form">
          <h4><b>Seacrh Nama Pengirim</b></h4>
          <br>
          <div class="row">
            <div class="col-lg-3">
            <input id='name' placeholder="Cari nama pengirim">
            </div>
            <div class="col-lg-2 col-lg-offset-1">
            <input type="submit" value="Seacrh" onclick="index_aset('index_aspirasi','name')">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class='col-lg-12'>
      <div class='konten'>
        <div id='table-content'>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../../assets/bootstrap/js/mdb.min.js"></script>
  <script src="assets/js/aset.js"></script>
  <script src="assets/js/general.js"></script>

  <script>
    function convert_array_php_to_js() {
      var chart_labels = <?php echo '["' . implode('", "', $chart_labels) . '"]' ?>;
      var chart_datas = <?php echo '["' . implode('", "', $chart_datas) . '"]' ?>;

      create_chart(chart_labels,chart_datas,'bar');
    }
  </script>
</body>
</html>

