<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
   if(isset($_POST['save'])){
    $conteudo =  isset($_POST['texto']) ? $_POST['texto'] : "";
    $titulo =  isset($_POST['titulo']) ? $_POST['titulo'] : "";

       function write($titulo,$conteudo){

           $arquifl =  $titulo;
           $arquivo = fopen($arquifl,'a');
           fwrite($arquivo,$conteudo);
    
       }

       function read($titulo){
          
           $tamanho = filesize($titulo);
            $arquivo = fopen($titulo,'r');

            while(!feof($arquivo)){

                  $linha = fgets($arquivo,$tamanho);
                  echo $linha;
            }
         
            fclose($arquivo);

       }

       write($titulo,$conteudo);
     #  $arq = 'tst.py';
       read($titulo);


   }
  
  
  ?>

     <form action="" method="post">
          <input type="text" name="titulo" placeholder="Arquivo....">
         <textarea name="texto" id="" cols="30" rows="10"></textarea>
           <input type="submit" name="save">
     </form> 


  
    
</body>
</html>



<?php

#setcookie('user','Pedro zau',time()+3600);



// date 

/** 
echo "Dia:";
print(date('d'));
echo "<br>";
echo "Dia da semana:";
print(date('D'));
echo "<br>";
print(date('M'));
print(date('m'));

print(date('Y'));
print(date('y'));
echo date('l/d/M/Y');

date_default_timezone_set('America/Sao_Paulo');
echo "<br> ".date('H:i:s A');

$data_pay = mktime(15,30,00,02,15,2022);
echo "<br>".time();
echo "<br>";
echo date("d/m/Y - h:i",$date_pay);
 echo "<br>";
echo date('d/m/Y',strtotime($data_pay));



*/




?>