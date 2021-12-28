<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <!-- Boostrap -->
    
     <!-- end boostrap -->
    <!-- Bootstrap Core CSS -->
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

     <script src="script.js"></script>
     <!-- endjs -->
    <title>Pag</title>

    <style>
          .card {

              margin-bottom: 30px;
              padding-bottom: 30px;
            
              display: block;
              padding:10px;
              
              width:700px;
          }
/*
          .card > img {

             width: 400px;

          }
*/
          .card .card-text {
                     
                     padding:5px;
                     text-align: justify;
                     margin:5px;
                
          }

          .card-title {

               font-size:30pt;
               border-bottom:1px solid black;
               width:800px;
               

          }

          .btn {

             width:50px;
             background-color:green;
             border-radius: 5px;
             padding:5px;
             color:#fff;


          }
    

    </style>

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
                         
                        <?php
                         include_once "connection.php";

                         $query = "SELECT * FROM note";
                         $result = mysqli_query($connect,$query);


                         /**
                          * 
                          $mime = mime_content_type(__DIR__ . '/' . $caminho_imagem);
 $tamanho = filesize(__DIR__ . '/' . $caminho_imagem);

 header("Content-Type: ". $mime);
 header("Content-Length: " . $tamanho);

 //e por fim você manda para o navegador
 echo file_get_contents(__DIR__ . '/' . $caminho_imagem);
                          */
                        
                        
                        
                        ?>
                   
 
                  <!-- cartão  with boostrap -->
                  <div class="container">
  <!-- Content here -->
   <?php while($row = mysqli_fetch_object($result)): ?>
 
    <h5 class="card-title"><?php echo $row->titulo; ?></h5>
  <div class="card">
      <p class="card-text" style=""><?php echo $row->descricao; ?></p>
  <img class="card-img-top"   src="getimage.php?id=<?php echo $row->id; ?>"  alt="Card image cap">
  <div class="card-body">
    <p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
       <a class="btn" href="ednote.php?id=<?php echo $row->id;  ?>">Editar</a>   <a class="btn" href="delenote.php?id=<?php echo $row->id;  ?>">Deletar</a>
  </div>
</div>
<?php endwhile; ?>
                  </div>
         </main>
       </div>
</body>
</html>