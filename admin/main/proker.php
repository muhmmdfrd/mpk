<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../assets/font.css">
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/general.css">
  <link rel="stylesheet" type="text/css" href="assets/css/proker.css">
  <style type="text/css">
    .proker-event{
      position:absolute;
      top:-5px;
      left:-5px;
      width:calc(100% + 5px);
      height:calc(100% + 5px);
      padding: 4vh 2vw;
      background-color: rgba(44,119,244,.3);
      text-align: center;
      color: #2c4794;
      white-space: normal;
      font-size: 15px;
      font-weight: bold;
    }
    @media screen and (min-height: 800px){
      .proker-event{
        font-size: 30px; 
      }
    }
  </style>
</head>
<body>

<div class="konten" id='calendar' style="overflow-x: auto;">
</div>

<div class="konten">
  <h1><b>Program Kerja</b></h1>
  <?php
    require 'general/connection.php';
    $query = "select * from tb_proker";
    $stat = $con->prepare($query);
    $stat->execute();

    while ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
      echo "<hr>";
      echo "<div class='konten' onclick='show_proker(\"".$row['proker_id']."\")'>";
      echo "<h4><b>".$row['nama_proker']."</b></h4>";
      echo "<br>";
      echo "<h5>".substr($row['desc_proker'],0,400)." . . . </h5>";
      echo "<br>";
      echo "<h5 style='color:blue;'>".$row['tgl_kegiatan']."</h5>";
      echo "</div>";
    }
  ?>
</div>

<div id="show_proker" class="background-full-dark" style="display: none;">
  <div id='hidden-konten' class="hidden-konten">
  </div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="assets/js/calendar.js"></script>
  <script src="assets/js/proker.js"></script>
</body>
</html>