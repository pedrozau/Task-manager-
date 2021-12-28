
<?php 
       include_once "connection.php";
      session_start();
       if(!isset($_SESSION['logado'])):
        header('Location: ../');
       endif;

      $id = $_SESSION['id_user'];
      

      $query = "SELECT * FROM login WHERE id = '$id'";
      $result = mysqli_query($connect,$query);
      $row = mysqli_fetch_array($result);
    ?>
<?php 
    
    if(isset($_POST['alcor'])):
     $cor = mysqli_escape_string($connect,$_POST['cor']);

     mysqli_query($connect,"UPDATE $row[username] SET colorname = '$cor' WHERE id = '$id' ");

    endif;
    
    $query = "SELECT * FROM $row[username]";

    $result = mysqli_query($connect,$query);
     
     $color = mysqli_fetch_object($result);


 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10">
    <link rel="stylesheet" href="style.css">
     <!-- Boostrap -->
  
     <!-- end boostrap -->
     <!-- JS -->
     <script src="script.js"></script>
     <!-- endjs -->
    <title>Gestão de Tarefa</title>

  <style>
         .sidebar {
      
      height: 100%;
      width:240px;
      position:fixed;
      left:0;
      top:0;
      z-index:100;
      background:<?php $color->colorname; ?>;
      color:#fff;
      overflow-y: auto;
      transition: width 500ms;
      padding:2rem;
      
 }


  </style>
</head>
 <!-- ALERTA TAREFA  -->
 <?php 
  include_once "connection.php";
  
  $query = "SELECT * FROM $row[username]";
  $result = mysqli_query($connect,$query);

  $time_now = date('H:i');
  $date_now = date('d/m/Y');
  $altarefa = "";
  $msgal = "";
  

  #echo $time_now;
  #echo "<br>";
  #echo $date_now;
   ?>
       <?php  while($dados = mysqli_fetch_array($result)): ?>

       <?php  $db_date = date('d/m/Y',strtotime($dados['dat']));
         $db_time = date('H:i',strtotime($dados['tempo']));
         $tar = $dados['tarefa']; ?>


       
         
       <?php   if($time_now == $db_time AND $date_now == $db_date): ?>
        
          <script>
             
             alert(" HORA DE  <?php echo $tar;  ?>")

               <?php 
               
                $to = $row['nome'];
                $subject = "Tarefa";
                $message = "Ola!! Chegou a hora de fazer ".$tar;
                $header = "Help-me";
                mail($to,$subject,$message,$header);




               ?>
             
            </script> 
 
        

       <?php   endif; ?>

      <?php endwhile; ?>
    <!--end alerta -->
<body>
     



    
    <!---- <input type="checkbox"  id="sidebar-toggle"> -->
        <div class="sidebar">
          <div class="sidebar-header">
              <h3 class="brand">
                    <span class="sidebar-icons"></span> 
                    <span>Help-me<span> 
             </h3>
             <!-- <span class="sidebar-icons"><img src="images/menu.png" alt="menu-error"></span> -->
             <!--- <label class="sidebar-icons" for="sidebar-toggle"><img src="images/menu.png" alt="menu-error"></label> -->
        </div>

           <div class="sidebar-menu">
               <ul>
                   <li>
                       <a href="index.php">
                           <span class="sidebar-icons"><img src="images/home.png" alt="casa-error"></span>
                           <span>Home</span>
                        </a>
                    </li>

                   <li>
                       <a href="">
                           <span class="sidebar-icons"><img src="icones/create_document_60px.png" alt="inserir-error"></span>
                           <span>Cadastro</span>
                        </a>
                       <div class="sub-menu-1">
                           <ul>
                               <li>
                                   <a href="tarefa.php">
                                       <span><img src="icones/clipboard_80px.png" id="subMenuimgIcon" alt="professor"></span>
                                       <span>Tarefa</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="note.php">
                                       <span><img src="icones/note.png" id="subMenuimgIcon" alt="estudante"></span>
                                       <span>Anotações</span>
                                   </a>
                               </li>
                               
                              
                           </ul>
                       </div>
                    </li>

                    </li>
                    <!--
                   <li>
                       <a href="">
                           <span class="sidebar-icons"><img src="images/list.png" alt="list-error"></span>
                           <span>Tarefa</span>
                        </a></li>
                   <li>
                       <a href="">
                           <span class="sidebar-icons"><img src="images/edit.png" alt="edit-error"></span>
                           <span>Altera tarefa</span>
                        </a></li>                   
                   <li>
                       <a href="">
                           <span class="sidebar-icons"><img src="images/remove.png" alt="remove-error"></span>
                           <span></span>
                        </a></li>
                    -->
                   <li>
                       <a href="grafico.php">
                           <span  class="sidebar-icons"><img src="images/increase.png" alt="grafico-error"></span>
                           <span>Grafico</span>
                        </a></li>
                   
                       <!--
                       <li>
                       <a href="">
                           <span class="sidebar-icons"><img src="images/print.png" alt="print-error"></span>
                           <span>Imprimir</span>
                       </a></li>
                    -->
                   <li><a href="preferencia.php">
                       <span class="sidebar-icons"><img src="images/setting.png" alt=""></span>
                       <span>Preferência</span>
                    </a></li>
                    
                    <li>
                        <a href="sair.php">
                            <span class="sidebar-icons"><img src="images/shutdown.png" alt="print-error"></span>
                            <span>logout</span>
                     </a></li>
                    
               </ul>
           </div>
     </div>

       <div class="main-content">
        <header>
            <div class="toggle">
            <br>
          <p style="padding-left:60px;"><?php  echo $row['username'];     ?></p>   &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; 
                </div>
                
         </header>
           <!-- PHP  -->
            <?php 
            
             $query = "SELECT * FROM $row[username]";
             $result  = mysqli_query($connect,$query);

             $cont = mysqli_num_rows($result);

             $sql1 = "SELECT * FROM $row[username] WHERE estado = 'Marcada'";
             $sql2 = "SELECT * FROM $row[username] WHERE estado = 'Feito'";
             
             $result1  = mysqli_query($connect,$sql1);
             $result2 = mysqli_query($connect,$sql2);

             $marcada = mysqli_num_rows($result1);
             $feito = mysqli_num_rows($result2);

             $query3 = "SELECT * FROM note";
             $result3 = mysqli_query($connect,$query3);

             $note = mysqli_num_rows($result3);
            
            
            ?>
            <!-- end PHP -->
            <main>
                <!--    Cartoes --->

                <footer class="cartoes">
                    <div class="box">
                        <p class="cardtxt"> Tarefa  </p> <span> <p class="tot"><?php echo $cont; ?></p>  <img src="icones/clipboard_80px.png" class="img" alt="cardtotAlunos"></span>
                    </div>
                    <div class="box">
                        <p class="cardtxt">Tarefa Concluida </p> <span> <p class="tot"><?php echo $feito; ?></p> <img src="icones/check_file_512px.png" class="img" alt="cardtotprof"></span>
                    </div>
                    <div class="box">
                        <p class="cardtxt">Tarefa Marcada </p> <span> <p class="tot"><?php echo $marcada; ?></p> <img src="icones/layers.png" class="img" alt="cardtotdisciplina"></span>
                    </div>
                    <div class="box">
                        <p class="cardtxt">Total de Note </p> <span> <p class="tot"><?php echo $note; ?></p> <img src="icones/note_96px.png" class="img" alt="cardtotclass"></span>
                    </div>
                </footer>
                <!--- end cartoes-->
            </main>
       </div>
</body>
</html>