
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta de tarefa</title>
</head>
<body>
<?php 
  include_once "connection.php";
  
  $query = "SELECT * FROM gestor";
  $result = mysqli_query($connect,$query);

  $time_now = date('H:i');
  $date_now = date('d/m/Y');

  echo $time_now;
  echo "<br>";
  echo $date_now;
   ?>
       <?php  while($dados = mysqli_fetch_array($result)): ?>

       <?php  $db_date = date('d/m/Y',strtotime($dados['dat']));
         $db_time = date('H:i',strtotime($dados['tempo']));
         $tar = $dados['tarefa']; ?>


       
         
       <?php   if($time_now == $db_time AND $date_now == $db_date): ?>
            
            <script>

             alert("Hora de fzaer <?php echo $tar;  ?>")
            

            </script> 

             
       <?php   endif; ?>

      <?php endwhile; ?>
      
     <audio autoplay src="al.mp3" loop controls></audio>
     <video src="vl.webm" controls autoplay style="display:hidden;"></video>

</body>
</html>

  