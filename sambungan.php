<?php
  $nama_database = "ariff";
  
  $sambungan = mysqli_connect("localhost", "root", "", $nama_database);
  if ( !$sambungan ) {
        die("sambungan gagal");
  }
?>
