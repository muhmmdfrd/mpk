<?php
  require('../general/connection.php');
  $angkatan = strval($_GET['q']);

  $jabatan = "select * from tb_jabatan";
  $statement = $con->prepare($jabatan);
  $statement->execute();

  echo "<div id='btn-back-admin' align='center' onclick='form_anggota(".$angkatan.",null)'>";
  echo "  <i class='fa fa-arrow-left'></i>";
  echo "</div>";
  echo "<div class='form' style='margin-top: 4vh'>";
  echo "  <div class='main-form'>";
  echo "    <form action='anggota/add_angkatan'>";
  echo "      <h4><b>Form Anggota Angkatan ".$angkatan."</b></h4>";
  echo "      <br>";

  echo "      <div class='row'>";
  echo "        <div class='col-lg-3'>";
  echo "          <h5> Nama Depan </h5>";
  echo "          <input type='text' name='namdep' placeholder='Nama Depan'>";
  echo "        </div>";
  echo "        <div class='col-lg-3'>";
  echo "          <h5> Nama Belakang </h5>";
  echo "          <input type='text' name='nambel' placeholder='Nama Belakang'>";
  echo "        </div>";
  echo "      </div>";

  echo "      <br>";

  echo "      <div class='row'>";
  echo "        <div class='col-lg-3'>";
  echo "          <h5> Kelas </h5>";
  echo "          <input type='number' name='kelas' placeholder='eg. RPL A'>";
  echo "        </div>";
  echo "      </div>";

  echo "      <br>";

  echo "      <div class='row'>";
  echo "        <div class='col-lg-3'>";
  echo "          <h5> Jabatan </h5>";
  echo "          <select name='jabatan'>";
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  echo "          <option value='".$row['jabatan_id']."'>".$row['jabatan']."</option>";
  }
  echo "          </select>";
  echo "        </div>";
  echo "      </div>";
  
  echo "      <br>";

  echo "      <div class='row'>";
  echo "        <div class='col-lg-12'>";
  echo "          <h5> Jenis Kelamin </h5>";
  echo "           <div class='inputGroup'>";
  echo "             <div class='col-lg-3'>";
  echo "               <input id='radio1' name='jekel' type='radio'/>";
  echo "               <label for='radio1'>Laki - laki</label>";
  echo "             </div>";
  echo "             <div class='col-lg-3'>";
  echo "                 <input id='radio2' name='jekel' type='radio'/>";
  echo "                 <label for='radio2'>Perempuan</label>";
  echo "            </div>";
  echo "         </div>";
  echo "      </div>";

  echo "      <br>";
  echo "      <div class='row'>";
  echo "        <div class='col-lg-6'>";
  echo "          <h5> Alamat</h5>";
  echo "          <textarea rows='3' placeholder='Kosongkan bila tidak diperlukan.' name='alamat'></textarea>";
  echo "        </div>";
  echo "        <div class='col-lg-6'>";
  echo "          <h5> Kontak</h5>";
  echo "          <textarea rows='3' placeholder='Kosongkan bila tidak diperlukan.' name='kontak'></textarea>";
  echo "        </div>";
  echo "      </div>";
  echo "      <br>";
  echo "      <br>";
  echo "      <div class='row'>";
  echo "        <div class='col-lg-2 col-lg-offset-8'><input type='reset' value='Cancel'></div>";
  echo "        <div class='col-lg-2'><input type='submit' value='Submit'></div>";
  echo "      </div>";
  echo "    </form>";
  echo "  </div>";
  echo "</div>";
?>