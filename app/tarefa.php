<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <meta >
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.5.1.min,js"></script>
    
     <script src="script.js"></script>
    
    <title>Cadastro</title>
    <?php 
       include_once "connection.php";
      session_start();
       if(!isset($_SESSION['logado'])):
        header('Location: ../');
       endif;

      $id = $_SESSION['id_user'];
      

      $query = "SELECT * FROM login WHERE id = '$id'";
      $result = mysqli_query($connect,$query);
      $username = mysqli_fetch_array($result);



     ?>
</head>
<body>
   
    <?php 
      include_once "connection.php";
      if(isset($_POST['salva'])):
         
           $tarefa = mysqli_escape_string($connect,htmlspecialchars($_POST['tarefa']));
           $data = mysqli_escape_string($connect,htmlspecialchars($_POST['data']));
           $tempo = mysqli_escape_string($connect,htmlspecialchars($_POST['tempo']));
           $estado = mysqli_escape_string($connect,htmlspecialchars($_POST['estado']));
           
           $query = "INSERT INTO $username[username] VALUES (NULL,'$tarefa','$data','$tempo','$estado')";
           
           $result = mysqli_query($connect,$query);
            /*
           $sql = "SELECT * FROM gestor";
           $resultado = mysqli_query($connect,$resultado);
           */

             
            
      endif;

    
    ?>
        <div class="sidebar">
          <div class="sidebar-header">
              <h3 class="brand">
                    <span class="sidebar-icons"></span> 
                    <span>Help-me</span> 
             </h3>
            
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
                  
                   <li>
                       <a href="grafico.php">
                           <span  class="sidebar-icons"><img src="images/increase.png" alt="grafico-error"></span>
                           <span>Grafico</span>
                        </a></li>
                   
                    
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
          <p style="padding-left:60px;"><?php  echo $username['username'];     ?></p>   &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; 

                      </div>
                     
                      <!--
                      <div class="dropdown">
                           <ul>
                             <li><a href="#">Perfil</a></li>
                             <li><a href="#">Logout</a></li>
                           </ul>
                      </div>
    -->              <?php //  $msgal.$altarefa;  ?>
                 </header>

                 <main>
                     <div class="conteudo">
                         
                
                    <button id="open" class="modalposition"  onclick="opened()">Novo Tarefa</button>
                  
       
                    <div class="modal-container" id="modal-container">
             
                       <div class="modal">
                        <div class="title-modal">
                          Casdastrar Tarefa
                        </div>   

                           
                        <form action="" method="post" class="form-prof">
                           
                             <input class="tell" type="text" name="tarefa" placeholder="Tarefa..." required>
                             <input class="data"  onclick="myFunction()"  type="date" name="data" id="data" placeholder="Data de nascimento" required>
                              <div class="popup">
                                <input class="BI" type="time" id="BI" placeholder="" name="tempo" required>  
                              
                                    <span class="popuptext" id="myPopup">
                                          Data da tarefa
                                    </span>
                             </div>
                              <br> <br>
                             <select name="estado" id=""  class="disciplina" required>
                                 <option value="Marcada">Marcada</option>
                                 <option value="Feito">Feito</option>
                             </select>
                           
                          
                           
                                
                          
                             <input class="salva" type="submit" value="Salvar" name="salva">
                        </form>
                            
                            
             
                              <button id="close" onclick="closed()">
                                 &times;
                              </button>
                       </div>
             
                    </div>
                    <!-- end modal-->
                      
                    <!-- edit moal  -->
                     <?php  
                     
                     $query = "SELECT * FROM  $username[username]";
                     $resultado = mysqli_query($connect,$query);
                     $dados = mysqli_fetch_array($resultado);

                     
                     ?>
                  
                    <div class="modal-container" id="modal-container1">
             
             <div class="modal">
           <div class="title-modal">
            Editar
          </div>   

             
          <form action="" method="post" class="form-prof">
             
               <input class="tell" value="<?php echo $dados['tarefa'];  ?>" type="text" name="tarefa" placeholder="Tarefa..." required>
               <input class="data" value="<?php echo $dados['dat']; ?>"  onclick="myFunction()"  type="date" name="data" id="data" placeholder="Data de nascimento" required>
                <div class="popup">
                  <input class="BI" value="<?php echo $dados['tempo']; ?>" type="time" id= placeholder="" name="tempo" required>  
                
                      <span class="popuptext" id="myPopup">
                            Data da tarefa
                      </span>
               </div>
                <br> <br>
               <select name="estado" id=""  class="disciplina" required>
                   <option value="Marcada">Marcada</option>
                   <option value="Feito">Feito</option>
               </select>
             
            
             
                  
            
               <input class="salva" type="submit" value="Actualizar" name="atualizar">
          </form>
              
              

                <button id="close" onclick="closed1()">
                   &times;
                </button>
         </div>

      </div>
                    <!-- end edit  -->


                      <!-- php  -->
                     <form action=""  class="formposition" method="post">
                            <input type="search" placeholder="Busca Tarefa..." class="busca" name="palavra">
                             <input type="submit" value="Buscar" class="buscabtn" id="buscar"  name="buscar" onclick="buscar()"> 
    
                     </form>  
                      <!-- PHP  -->
                      <?php 

# $palavra = mysqli_escape_string($connect,$_POST['palavra']);
# $quer = "SELECT * FROM  gestor WHERE tarefa = '$palavra' ";
#  $red = mysqli_query($connect,$quer);

?>
                     
                       <?php # if(mysqli_num_rows($red) == 0): ?> 
                       <?php  #else: ?>
                        

                     
                         <?php #endif; ?>
                         <!-- -->
                      <div id="dados">

                      </div>
                        

<?php  
 
 if(isset($_POST['buscar'])):
        $word = mysqli_escape_string($connect,$_POST['palavra']);
        $sql = "SELECT * FROM $username[username] WHERE  tarefa = '$word' OR estado = '$word'  ORDER BY  id";
        $resul = mysqli_query($connect,$sql);
 else:

  #$sql = "SELECT * FROM  gestor ORDER BY tarefa";
  $check = "SELECT * FROM login  WHERE id = '$id'";
  
  $sql = "SELECT * FROM  $username[username]";
  $resul = mysqli_query($connect,$sql);
  endif;

      
   

?>
                       
               <div class="content-table"  id="visivel">
                <table class="table" >
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tarefa</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tempo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acções</th>
                       
                      </tr>
                    </thead>
                   
                     <?php while($row = mysqli_fetch_array($resul)): ?>
                    <tbody>
                      <tr>
                     
                      </tr>
                      <tr>
                        <th class="row"> <?php echo  $row['id'];  ?></th>
                        <td class="row1"> <?php echo $row['tarefa']; ?></td>
                        <td class="row2"><?php echo date('d/m/Y',strtotime($row['dat'])); ?></td>
                        <td class="row3"><?php echo date('H:i',strtotime($row['tempo'])); ?></td>
                        <td class="row4"><?php echo $row['estado']; ?></td>
                        <th>  <a id="open1"  href="edit.php?id=<?php echo $row['id']; ?>"><img  class="img1" src="icones/edit.png" alt=""></a>  </th>
                        <th>  <a  href="delete.php?ig=<?php echo $row['id']; ?>"><img  class="img1" src="icones/delete.png" alt=""></a> </th>
                      </tr>
                    
                    </tbody>
                     <?php  endwhile; ?>
                  </table>

                     <?php  mysqli_close($connect); ?>
               </div>
               
                <script>
                    /*
                    
function buscar(palavra){

let page = "tarefa.php"
$.ajax({
 
     type:'POST',
     dataType: 'html',
     url: page,
     beforeSend: function() {
         $('#dados').html("Carregando....")

     },
     data: {palavra: palavra},
     success: function(msg){
         $("#dados").html(msg)
     }
   

})
 
}

$('#buscar').click(function(){
 
     buscar($("#palavra").val())

})
*/

  


  </script>


         </div>
         </main>
       </div>
</body>
</html>