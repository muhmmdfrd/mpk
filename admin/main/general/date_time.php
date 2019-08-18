<?php
  function get_month($month){
    $month_arr = array("Januari", "February", "Maret", "April","Mei", "Juni", "July", "Agustus", "September", "Oktober", "November", "Desember");
    $asd = intval($month) - 1;
    return $month_arr[$asd];
  }
?>