<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <!-- Boostrap -->
  
     <!-- end boostrap -->
     <!-- JS -->
     <!-- PHP  -->
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

     
      $g = "SELECT * FROM $row[username] WHERE estado = 'Feito'";
      $reultado = mysqli_query($connect,$g);
     
     $j = 0;
     $f = 0;
     $m = 0;
     $ap = 0;
     $ma = 0;
     $jun = 0;
     $jul = 0;
     $au = 0;
     $se = 0;
     $o = 0;
     $n = 0;
     $d = 0;

      while($grafico = mysqli_fetch_object($reultado)):
        $month = date('m',strtotime($grafico->dat));
        if($month == '01'):
            $j += 1;
            elseif($month == '02'):
                $f += 1;
            elseif($month == '03'):
                $m += 1;
            elseif($month == '04'):
                $ap += 1;
            elseif($month == '05'):
                $ma += 1;
            elseif($month == '06'):
                $jun += 1;
            elseif($month == '07'):
                $jul += 1;
            elseif($month == '08'):
                $au += 1;
            elseif($month == '09'):
              $se += 1;
            elseif($month == '10'):
                $o += 1;
            elseif($month == '11'):
                $n += 1;
            elseif($month == '12'):
                $d += 1;    
        endif;
    endwhile;
     ?>
     <script src="script.js"></script>
    <script src="package/dist/Chart.min.css"></script>
    <script src="package/dist/Chart.js"></script>
    <link rel="stylesheet" href="package/dist/Chart.min.css">
    <link rel="stylesheet" href="package/dist/Chart.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="scripte.js"></script>
     <!-- endjs -->
    <title>Grafico</title>
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
          <p style="padding-left:60px;"><?php  echo $row['username'];     ?></p>   &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; 
            </div>
           
         </header>
         
            <main>
           
                 <div class="">
                 </div>
               <div class="content-table"  style="margin:auto; width:800px;">
               <canvas id="myChart" width="200px" height="90px"></canvas>
           
               </div>
            </main>
       </div>
        
       <script>
         var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'April', 'Maio', 'Junho', 'Julho','Agosto','Setembro','Otubro','Novembro','Desembro'],
        datasets: [{
            label: 'Grafico de tarefas concluida do mês',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php echo $j; ?>, <?php echo $f; ?>, <?php echo $m; ?>, <?php echo $ap; ?>, <?php echo $ma; ?>, <?php echo $jun; ?>,<?php echo $jul; ?>,<?php echo $au; ?>,<?php echo $se; ?>,<?php echo $o; ?>,<?php echo $n; ?>,<?php echo $d; ?>]
        }]
    },

    // Configuration options go here
    options: {}
});

     function g(){
        var ctx = document.getElementById('thischart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
      
     }
 g()
  

  

   


       </script>



</body>
</html>