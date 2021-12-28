<?php 
  include_once "connection.php";
  #print("Hello");
  
     $titulo = mysqli_escape_string($connect, $_POST['titulo']); # var  title 
     $descricao = mysqli_escape_string($connect,$_POST['descricao']); # var  describe 
     $image = $_FILES['image']; # var image 
     # apload image 
     if($image != NULL):
         $format = ['jpg','jpeg','png','gif'];
         $nameFinal = time().$format;
         if(move_uploaded_file($image['tmp_name'],$nameFinal)):

            $tamanhoImg = filesize($nameFinal);
           # $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
             $Img = addslashes(fread(fopen($nameFinal,"r"),  $tamanhoImg));
             
             mysqli_query($connect,"INSERT INTO note VALUES (NULL,'$titulo','$descricao','$Img')");
             unlink($nameFinal);
             header('Location: Pag.php');
     
         endif;
     endif;



       


?>

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <!-- Boostrap -->
  
     <!-- end boostrap -->
     <!-- JS -->
     <script src="script.js"></script>
     <!-- endjs -->
    <title>cadastro</title>

</head>
<body>
    <!---- <input type="checkbox"  id="sidebar-toggle"> -->
        <div class="sidebar">
          <div class="sidebar-header">
              <h3 class="brand">
                    <span class="sidebar-icons"></span> 
                    <span>Help-me</span> 
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
                       <a href="#">
                           <span class="sidebar-icons"><img src="icones/create_document_60px.png" alt="inserir-error"></span>
                           <span>Cadastro</span>
                        </a>
                       <div class="sub-menu-1">
                           <ul>
                               <li>
                                   <a href="tarefa.php">
                                       <span><img src="icones/professor.png" id="subMenuimgIcon" alt="professor"></span>
                                       <span>Tarefa</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="note.php">
                                       <span><img src="icones/students.png" id="subMenuimgIcon" alt="estudante"></span>
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
                    <!--
                    <li>
                        <a href="">
                            <span class="sidebar-icons"><img src="images/shutdown.png" alt="print-error"></span>
                            <span></span>
                     </a></li>
                     -->
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

                 <main>
                     <div class="conteudo">
                         
                    <!-- modal -->
                    <button id="open"  onclick="opened()">Novo Note</button>
       
                    <div class="modal-container" id="modal-container">
             
                       <div class="modal">
                        <div class="title-modal">
                            Casdastrar Note
                          </div>    
                            
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-prof"  enctype="multipart/form-data">
                        <input class="tell" type="text" name="titulo" placeholder="Titulo..." required>
                        <textarea style="margin-top:50px; margin-left:50px; width:400px;height:200px; padding:0 10px;" placeholder="Descrição...."  name="descricao" id="" cols="30" rows="10"></textarea>
                        <br><label for="image">Image:</label> 
                        <input type="file" name="image" class="upl" id="image">
                             <input style="margin-top:15px;" class="salva" type="submit" value="Salvar"  name="save">
                        </form>
                            
             
                              <button id="close" onclick="closed()">
                                 &times;
                              </button>
                       </div>
             
                    </div>
                   
                   
                    <a href="Pag.php">View Page</a>
 
                    
          


         </div>
         </main>
       </div>
</body>
</html>