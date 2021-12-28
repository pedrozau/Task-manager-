<?php 

require_once 'connection.php';
session_start();
 if(!isset($_SESSION['logado'])):
  header('Location: ../');
 endif;

$id = $_SESSION['id_user'];
$query = "SELECT * FROM login WHERE id = '$id'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);

$querygr = "SELECT * FROM $row[username]";
$reultado = mysqli_query($connect,$querygr);


$grafico = mysqli_fetch_object($reultado);

#$month = date('m',strtotime($grafico['dat']));

#echo ":".$month;


$month = date('m',strtotime($grafico->dat));

echo $month;
while(true):
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