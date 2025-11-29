<?php
  include("sambungan.php);
  include("pengundi_menu.php");

  if(isset($_POST["submit"])) {
     $userid = $_POST["userid"];
     $password = $_POST["password"];

     $jumpa = FALSE;

     if($jumpa == FALSE) {
        $sql = "SELECT * FROM pengundi";
        $result = mysqli_query($sambungan, $sql);
        while($pengundi = mysqli_fect_array ($result)) {
           if($pengundi["idpengundi"] == $userid && $pengundi["password"] == $password) {
              $jumpa = TRUE;
              $_SESSION["idpengguna"] = $pengundi["idpengundi"];
              $_SESSION["nama"] = $pengundi["namapengundi"];
              $_SESSION["status"] = "pengundi";
              break;
            }
        }
     }

     if($jumpa == FALSE) {
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($sambungan, $sql);
        while($admin = mysqli_fetch_array($result)) {
          if($admin["idadmin"] == $userid && $admin["password"] == $password) {
             $jumpa = TRUE;
             $_SESSION["idpengguna"] = $admin["idadmin"];
             $_SESSION["nama"] = $admin["namaadmin"];
             $_SESSION["status"] = "admin";
             break;
           }
        }
      }

      if($jumpa == TRUE)
         if($_SESSION["status"] == "pengundi")
            header("Location: index.php");
         else if ($_SESSION["status"] == "admin")
            header("Location: calon_senarai.php");

      echo"<script>alert('kesalahan pada username atau password');</script>";
    }
 ?>

 <link rel="stylesheet" href="button.css">
 <link rel="stylesheet" href="borang.css">

 <h3>LOG MASUK</h3>
 <form action="login.php" method="post">
   <table>
     <tr>
       <td>ID Pengguna</td>
       <td><input type="text" name="userid" placeholder="idpengguna"></td>
     </tr>
     <tr>
       <td>Password</td>
       <td><input type="password" name="submit" name="submit">
     </tr>
   </table>
   <button class="login" type="submit" name="submit">
     Log Masuk
   </button>
   <button class="tambah" type="button" onclick="window.location='signup.php'">
     Daftar
   </button><br><br>
   Belum ada pengguna klik daftar
 </form>
