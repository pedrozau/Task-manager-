


<?php 

session_start();
include_once "connection.php";
 if(!isset($_SESSION['logado'])):
  header('Location: ../');
 endif;

$id = $_SESSION['id_user'];


$query = "SELECT * FROM login WHERE id = '$id'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);


if(isset($_GET['ig'])):
    $ig = mysqli_escape_string($connect,$_GET['ig']);
   endif;
$query = "DELETE FROM $row[username] WHERE id = '$ig'";

$result = mysqli_query($connect,$query);
header('Location: tarefa.php');
?>
