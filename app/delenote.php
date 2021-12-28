<?php 

include_once "connection.php";
#print("Hello");
   $id = mysqli_escape_string($connect,$_GET['id']);
   
           mysqli_query($connect,"DELETE FROM note WHERE id = '$id'");
           
           header('Location: Pag.php');
   
       
        
          session_start();
           if(!isset($_SESSION['logado'])):
            header('Location: ../');
           endif;
    
          $id = $_SESSION['id_user'];
          
    
          $query = "SELECT * FROM login WHERE id = '$id'";
          $result = mysqli_query($connect,$query);
          $row = mysqli_fetch_array($result);
    
    
    
        
         session_start();
          if(!isset($_SESSION['logado'])):
           header('Location: ../');
          endif;
   
         $id = $_SESSION['id_user'];
         
   
         $query = "SELECT * FROM login WHERE id = '$id'";
         $result = mysqli_query($connect,$query);
         $row = mysqli_fetch_array($result);
   
   
   
        ?>
