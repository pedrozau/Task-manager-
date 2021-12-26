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

*/

echo date('l/d/M/Y');

date_default_timezone_set('America/Sao_Paulo');
echo "<br> ".date('H:i:s A');



