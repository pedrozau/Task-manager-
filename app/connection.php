<?php 
  const username = "root";
  const password = "";
  const hostname = "localhost";
  const database = "tarefa";

 
$connect = mysqli_connect(hostname,username,password,database);  # conection with database 

if(mysqli_connect_error()):
     print("Failed in conection with database");
else:
    # echo "OK";
endif;
