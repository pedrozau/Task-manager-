<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <?php
  session_start();
  include_once "app/connection.php";
  require_once "log.php";
  $msg = "";  # message para sistema de log 
  $lev = ""; #  aviso  para sistema de log

  if (isset($_POST['login'])) :
    $email  = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['password']);
    $option = [
      'cost' => 15
    ];
    # $new_senha =  password_hash($senha,PASSWORD_DEFAULT,$option);

    # $db = "$2y$15$0YO08s5jKrpnVPmdljnGgeplLZIdIqox6K3aTnP8SLzsd8GBA1ajy";

    $query = "SELECT * FROM login  WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) == 1) :
      $query = "SELECT * FROM login ";

      $result  = mysqli_query($connect, $query);
      while ($db = mysqli_fetch_array($result)) :
        if (password_verify($senha, $db['pass'])) :
          $_SESSION['logado'] = true;
          $_SESSION['id_user'] = $db['id'];
          $msg = "Acesso  ao Sistema";
          $lev = 'INFO';
          logMsg("Iste é um aviso.... {$msg}", $lev); # sistema de log
          header('Location: app/index.php');



        else :
          # $msg = "Senha incorreta";
          #  $lev = "ERROR";
          # logMsg( "Iste é um aviso.... {$msg}", $lev); # sistem de log
          echo "<p class='info'>SENHA INCORRETA</p>";
        endif;
      endwhile;
    else :
      # $msg = "usuario invalido";
      # $lev = "ERROR";
      # logMsg( "Iste é um aviso.... {$msg}", $lev); # sistema de log 
      echo  "<p class='info'>USUARIO INVALIDO</p>";
    endif;
  endif;

  # fechar o banco de dados 
  mysqli_close($connect);


  ?>

  <style>
    * {

      padding: 0;
      margin: 0;
      box-sizing: border-box;


    }

    body {

      background: #5F7C8A;
    }

    form {
      background-color: #fff;
      max-width: 400px;
      width: 70%;
      padding: 20px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      border-radius: 2px;


    }

    form h2 {

      text-align: center;
      color: #5F7C8A;
      margin-bottom: 10px;
      font-family: Arial, Helvetica, sans-serif;

    }

    form input[type="email"] {

      width: 100%;
      height: 45px;
      border: 1px solid #ccc;
      padding-left: 10px;
      margin: 10px 0;
      background-image: url('images/email.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      border-radius: 20px;


    }

    form input[type="password"] {

      width: 100%;
      height: 45px;
      border: 1px solid #ccc;
      padding-left: 10px;
      margin: 10px 0;
      background-image: url('images/password.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      border-radius: 20px;
    }

    form input[type="submit"] {

      width: 100%;
      height: 40px;
      cursor: pointer;
      border: 0;
      color: #fff;
      background: #5F7C8A;
      border-radius: 20px;
      transition: 1s;
    }

    form input[type="submit"]:hover {

      background: #5f7c8acc;

    }

    form input[type="email"]:focus,
    form input[type="password"]:focus {

      outline: 0;


    }

    .info {



      text-align: center;
      color: red;
      font-size: 18pt;
      margin-top: 100px;




    }
  </style>
</head>

<body>

  <form action="" method="post">
    <h2>Login ou <a href="cadastro.php">Cadastro</a></h2>
    <input type="email" placeholder="Email" required id="email" name="email">
    <input type="password" placeholder="Senha" required id="password" name="password" max="10" min="6">
    <input type="submit" value="Login" name="login">
  </form>

  <script>
    let email = document.getElementById("email")
    let password = document.getElementById("password")

    email.addEventListener('focus', () => {
      email.style.borderColor = "yellow"
    })

    password.addEventListener('focus', () => {
      password.style.borderColor = "yellow"
    })

    email.addEventListener('blur', () => {

      email.style.borderColor = "#119923"

    })

    password.addEventListener('blur', () => {

      password.style.borderColor = "#119923"
    })
  </script>


</body>

</html>