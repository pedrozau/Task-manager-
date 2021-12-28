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
    <title>Gestão de Tarefa</title>
    <?php 

    
    
       if(isset($_POST['alcor'])):
        $cor = mysqli_escape_string($connect,$_POST['cor']);

       # mysqli_query($connect,"UPDATE $row[username] SET colorname = '$cor' WHERE id = '$id' ");

       endif;
       
       $query = "SELECT * FROM $row[username]";

       $result = mysqli_query($connect,$query);
        
        $color = mysqli_fetch_object($result);


    
    ?>
    <style>

        .editsenha {

             width: 500px;
             margin: auto;
            margin-top: 100px;

        }
      
         input[type="text"] {

               border: 1px solid #ccc;
               padding:10px;
               display: block;
               width:300px;
               margin:auto;
               margin-bottom: 10px;
               border-radius: 3px;

         }

         input[type="password"] {


                  border: 1px solid #ccc;
                  padding: 10px;
                  display: block;
                  width:300px;
                  margin:auto;
                  border-radius: 3px;
                  margin-bottom: 15px;

         }

         input[type="submit"] {

               border:none;
               background-color: tomato;
               border-radius: 4px;
               width: 330px;
               margin: auto;
               margin-left: 80px;
               padding:10px;
               color:#fff;
               margin-bottom: 15px;

         }
         input[type="color"] {
         
             margin-left:10px;

         }
         label {
             margin-left: 78px;
             margin-bottom: 10px;
         }

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
                                   <a href="note.html">
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
            
             $query = "SELECT * FROM  $row[username]";
             $result  = mysqli_query($connect,$query);

             $cont = mysqli_num_rows($result);

             $sql1 = "SELECT * FROM $row[username] WHERE estado = 'Marcada'";
             $sql2 = "SELECT * FROM $row[username] WHERE estado = 'Feito'";

             $result1  = mysqli_query($connect,$sql1);
             $result2 = mysqli_query($connect,$sql2);

             $marcada = mysqli_num_rows($result1);
             $feito = mysqli_num_rows($result2);
             
             if(isset($_POST['al'])):
                   $nome = mysqli_escape_string($connect,$_POST['nome']);
                   $senha = mysqli_escape_string($connect,$_POST['senha']);
                     $option = [
                         'cost' => 10,
                      ];
                    $db_senha = password_hash($senha,PASSWORD_DEFAULT,$option);
                    mysqli_query($connect,"UPDATE login SET  nome = '$nome', senha = '$db_senha' WHERE  id = '$id' ");
                    
             endif;
             
            ?>
           
            <main>
            
              <div class="editsenha">
                  <form action="" method="post">
                      <input type="text" name="nome"  value="<?php  echo $row['nome']; ?>">
                       <input type="password" name="senha" value="<?php echo  $row['senha']; ?>">
                       <input type="submit" value="Alterar" name="al">
     
                  </form>
                   
              </div>
                
     </main>
       </div>
</body>
</html>