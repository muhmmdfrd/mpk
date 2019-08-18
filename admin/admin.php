<!DOCTYPE html>
<html>
<head>
  <title>Admin - Majelis Permusyawaratan Kelas</title>
  <!--CSS Tag-->
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/font.css">
  <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
</head>
<body>
  <div id="bg-black-admin"></div>
  <div id="navbar-admin">
    <p class="title-admin"><b>Majelis Permusyawaratan Kelas</b> - Admin</p>
    <a href="#" class="logout-admin"> Logout </a>
  </div>
  <div id="sidebar-admin-icon" align="center">
    <a href="main/home.php" target="iframe_content"><i class="fa fa-bar-chart"></i></a>
    <a href="main/anggota.php" target="iframe_content"><i class="fa fa-users"></i></a>
    <a href="main/proker.php" target="iframe_content"><i class="fa fa-tasks"></i></a>
    <a href="main/aspirasi.php" target="iframe_content"><i class="fa fa-send"></i></a>
    <a href="main/pesan.php" target="iframe_content"><i class="fa fa-envelope"></i></a>
    <a href="main/file.php" target="iframe_content"><i class="fa fa-paperclip"></i></a>
    <a href="main/info.php" target="iframe_content"><i class="fa fa-info-circle bottom"></i></a>
  </div>
  <div id="sidebar-admin">
    <div class="icon-desc"><p> Home </p></div>
    <div class="icon-desc"><p> Anggota </p></div>
    <div class="icon-desc"><p> Program Kerja </p></div>
    <div class="icon-desc"><p> Aspirasi </p></div>
    <div class="icon-desc"><p> Pesan Siswa </p></div>
    <div class="icon-desc"><p> File </p></div>
  </div>
  <div id="btn-sidebar-admin" align="center" onclick="show_sidebar_mobile();">
    <i class="fa fa-home"></i>
  </div>

  <div id="content-admin">
    <iframe id="iframe-content" name="iframe_content" src="main/aspirasi.php"></iframe>
  </div>

  <!--Script Tag-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="assets/js/admin.js"></script>
</body>
</html>