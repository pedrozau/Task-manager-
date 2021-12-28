<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
     
     <?php 
       
        include_once "app/connection.php";
        require_once "log.php";
        $msg = "";  # message para sistema de log 
        $lev = ""; #  aviso  para sistema de log
  
         if(isset($_POST['cadastro'])):
              session_start();
              $username = mysqli_escape_string($connect,$_POST['name']);
              $email = mysqli_escape_string($connect,$_POST['email']);
              $pass1 = mysqli_escape_string($connect,$_POST['password1']);
              $pass2 = mysqli_escape_string($connect,$_POST['password2']);
              
              if($pass1 == $pass2):
                $option = [
                     'cost' => 15,
                ];
                $new_pass = password_hash($pass1,PASSWORD_DEFAULT,$option);
                setcookie($username,$email,time()+1314000);
                $dbname = "tarefa";
               # $select_db = mysqli_select_db($connect,$dbname);
                mysqli_query($connect,"INSERT INTO login VALUES (NULL,'$username','$email','$new_pass')");
                 $db = "CREATE TABLE $username ( 
                      id int not null AUTO_INCREMENT,
                      tarefa varchar(200),
                      dat date,
                      tempo time,
                      estado varchar(30),
                      primary key(id)
                 
                 
                 )DEFAULT charset = utf8";
                 mysqli_query($connect,$db);
                
             
                header('Location: index.php');
              else:
                $msg = "Senha diferentes";
              endif;
 

               
         endif;

                  # fechar o banco de dados 
                  mysqli_close($connect);

       
     ?>

    <style>
        *{
           
           padding:0;
           margin:0;
           box-sizing: border-box;


        }
        body {

            background:#5F7C8A;
        }
  
        form {
            background-color: #fff;
            max-width: 400px;
            width: 70%;
            padding:20px;
            position:absolute;
            left:50%;
            top:50%;
            transform:translate(-50%,-50%);
            border-radius:2px;


        }
        form h2 {

             text-align: center;
             color:#5F7C8A;
             margin-bottom: 10px;
             font-family:Arial, Helvetica, sans-serif;

        }
        form input[type="email"]{
       
             width: 100%;
              height:45px;
              border:1px solid #ccc;
              padding-left:10px;
              margin:10px 0;
              background-image:url('images/email.png');
              background-size:cover;
              background-position: center;
              background-repeat:no-repeat;
              border-radius:20px;
           

        }
        form input[type="text"] {
          
              width: 100%;
              height:45px;
              border:1px solid #ccc;
              padding-left:10px;
              margin:10px 0;
              background-image:url('images/email.png');
              background-size:cover;
              background-position: center;
              background-repeat:no-repeat;
              border-radius:20px;
              
        }
        form input[type="password"]{

              width: 100%;
              height:45px;
              border:1px solid #ccc;
              padding-left:10px;
              margin:10px 0;
              background-image:url('images/password.png');
              background-size:cover;
              background-position: center;
              background-repeat:no-repeat;
              border-radius:20px;
        }
        form input[type="submit"]{

               width:100%;
               height:40px;
               cursor:pointer;
               border:0;
               color:#fff;
               background:#5F7C8A;
               border-radius:20px;
               transition: 1s;
        }

        form input[type="submit"]:hover {

              background:#5f7c8acc;
              
        }
       
         form input[type="email"]:focus,
         form input[type="password"]:focus{
             
             outline: 0;
          
               
         }

         .info {
      

     
      text-align:center;
      color:red;
      font-size:18pt;
      margin-top:100px;
     
      
 
 
  }

         
         
    </style>
</head>
<body>
   
    <?php echo "<p> {$msg} </p>"; ?>
      
     <form action="" method="post">
            <h2>Cadastro ou <a href="index.php">Login</a></h2>
          <input type="text" name="name" id="name" placeholder="Nome do usuario" required max="8" min="5" >
          <input type="email" placeholder="Email" required  id="email" name="email">
          <input type="password" placeholder="Senha" required id="password" name="password1"  max="10" min="6">
          <input type="password" placeholder="Confirmar senha" required id="password" name="password2"  max="10" min="6">
          <input type="submit" value="Login" name="cadastro">
     </form>

       <script>
           let email = document.getElementById("email")
           let password = document.getElementById("password")
           let name = document.getElementById('name')

            email.addEventListener('focus',()=>{
                email.style.borderColor = "yellow"
            })
             
            password.addEventListener('focus',()=>{
                password.style.borderColor = "yellow"
            })
              
            email.addEventListener('blur',()=>{
                 
                 email.style.borderColor = "#119923"

            })

            password.addEventListener('blur',()=>{

                 password.style.borderColor = "#119923"
            })

            name.addEventListener('focus',()=>{
                 name.style.borderColor = "yellow"
            })

            name.addEventListener('blur',()=>{
                 name.style.borderColor = "#119923"
            })              
       </script>

       
</body>
</html>