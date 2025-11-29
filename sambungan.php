<?php
  $nama_database = "undi";
  
  $sambungan = mysqli_connect("localhost", "root", "", $nama_database);
  if ( !$sambubgan ) {
        die("sambungan gagal");
  }
?>
