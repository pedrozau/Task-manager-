<?php 

include_once "connection.php";
  $id = $_GET['id'];
 $query = "SELECT * FROM note WHERE id = '$id'";
 $result = mysqli_query($connect,$query);
 while($row = mysqli_fetch_object($result)):


 header("Content-type: image/jpg");
       echo $row->image;

 endwhile;

 ?>



<?php 
      
      session_start();
       if(!isset($_SESSION['logado'])):
        header('Location: ../');
       endif;
      // User 
      $id = $_SESSION['id_user'];
      

      $query = "SELECT * FROM login WHERE id = '$id'";
      $result = mysqli_query($connect,$query);
      $row = mysqli_fetch_array($result);



     ?>

 