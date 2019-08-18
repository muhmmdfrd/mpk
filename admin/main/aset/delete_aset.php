<?php
  require '../general/connection.php';
  $aset = $_GET[ 'aset' ];
  $id = $_GET[ 'q' ];

  $sql = "Delete from tb_".$aset." where ".$aset."_id = ?";
  $query = $con->prepare( $sql );
  $query->bindparam( '1', $id );
  $query->execute();

  echo "<script>alert('Berhasil')</script>";

?>