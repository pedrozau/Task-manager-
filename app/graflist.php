<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
 include_once "connection.php";

 $id = mysqli_escape_string($connect,$_GET['id']);

$sql="SELECT * FROM gestor WHERE id = '$id' ";

$result = mysqli_query($connect,$sql);

echo "<table>
<tr>
<th>Tarefa</th>
<th>Data</th>
<th>Tempo</th>
<th>Estado</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['tarefa'] . "</td>";
  echo "<td>" . $row['dat'] . "</td>";
  echo "<td>" . date('H:i',strtotime($row['tempo'])) . "</td>";
  echo "<td>" . $row['estado'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($connect);
?>
</body>
</html>


