<?php
  require '../general/connection.php';
  require '../general/date_time.php';

  $query = "select nama_proker,tgl_kegiatan from tb_proker";
  $stat = $con->prepare($query);
  $stat->execute();
  while ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
    $event_dates[] =  array( 
      'tgl' => date('Y-n-j', strtotime($row['tgl_kegiatan'])),
      'nama' => $row['nama_proker']
    );
  }
  $month_number = intval($_GET['month']);
  $year_number = intval($_GET['year']);
  $date_count = 1;
  $month_number_last = $month_number - 1;
  $month_number_next = $month_number + 1;
  if ($month_number == 1) {
    $month_number_last = 12;
  }else if($month_number == 12){
    $month_number_next = 1;
  }

  $date = date('01-'.$month_number.'-'.$year_number);
  $dayname_of_first_date = date('N', strtotime($date));
  $days_count = cal_days_in_month(CAL_GREGORIAN, $month_number, $year_number);
  $days_count_last_month = cal_days_in_month(CAL_GREGORIAN, $month_number_last , $year_number);
  $days_count_next_month = cal_days_in_month(CAL_GREGORIAN, $month_number_next , $year_number);

  echo "<button class='btn btn-notice' onclick='change_month(\"now\")'>Today</button>";
  echo "<div class='container-fluid calendar-body'>";
  echo "  <header>";
  echo "    <br>";
  echo "    <div align='center'>";
  echo "    <h4 onclick='change_month(\"after\")' class='mb-4 calendar-title text-center' style='float:right;color:blue !important'>".get_month($month_number_next)." ".$year_number."</h1>";
  echo "    <h4 onclick='change_month(\"before\")' class='mb-4 calendar-title text-center' style='float:left;color:blue !important'>".get_month($month_number_last)." ".$year_number."</h1>";
  echo "    <h1 class='mb-4 calendar-title text-center'>".get_month($month_number)." ".$year_number."</h1>";
  echo "     </div>";
  echo "    <br>";
  echo "    <div class='row d-none d-sm-flex p-1 bg-dark text-white' style='padding-top: 1vh !important;'>";
  echo "      <h5 class='col-sm p-1 text-center'>Minggu</h5>";
  echo "      <h5 class='col-sm p-1 text-center'>Senin</h5>";
  echo "      <h5 class='col-sm p-1 text-center'>Selasa</h5>";
  echo "      <h5 class='col-sm p-1 text-center'>Rabu</h5>";
  echo "      <h5 class='col-sm p-1 text-center'>Kamis</h5>";
  echo "      <h5 class='col-sm p-1 text-center'>Jumat</h5>";
  echo "      <h5 class='col-sm p-1 text-center'>Sabtu</h5>";
  echo "    </div>";
  echo "  </header>";

  echo "  <div class='row border border-right-0 border-bottom-0'>";

  for($i = $dayname_of_first_date - 1; $i >= 0; $i--){
  echo "      <div class='day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted'>";
  echo "        <h5 class='row align-items-center'>";
  echo "          <span class='date col-1'>".($days_count_last_month - $i)."</span>";
  echo "          <small class='col d-sm-none text-center text-muted'>Sunday</small>";
  echo "          <span class='col-1'></span>";
  echo "        </h5>";
  echo "        <p class='d-sm-none'>No events</p>";
  echo "      </div>";
  $date_count++; 
  }

  for($i = 1; $i <= $days_count; $i++ ){
    if($date_count % 7 == 1){
  echo "      <div class='w-100'></div>";
  }

  echo "      <div class='day col-sm p-2 border border-left-0 border-top-0 text-truncate '>";
  foreach($event_dates as $event_date) {
    if ($year_number."-".$month_number."-".$i == $event_date['tgl']){
  echo "    <div class='proker-event'><p>".$event_date['nama']."</p></div>";
    }
  }
  echo "        <h5 class='row align-items-center'>";
  echo "          <span class='date col-1'>".$i."</span>";
  echo "          <small class='col d-sm-none text-center text-muted'>Wednesday</small>";
  echo "          <span class='col-1'></span>";
  echo "        </h5>";
  echo "      </div>";
  $date_count++;
  }
  for($i = $date_count - 1 ; $i % 7 > 0; $i++){
  echo "      <div class='day col-sm p-2 border border-left-0 border-top-0 d-none d-sm-inline-block bg-light text-muted'>";
  echo "        <h5 class='row align-items-center'>";
  echo "          <span class='date col-1'>".($i + 1 - $dayname_of_first_date - $days_count)."</span>";
  echo "          <small class='col d-sm-none text-center text-muted'>Sunday</small>";
  echo "          <span class='col-1'></span>";
  echo "        </h5>";
  echo "        <p class='d-sm-none'>No events</p>";
  echo "      </div>";
  }

  echo "  </div>";
  echo "</div>";
?>