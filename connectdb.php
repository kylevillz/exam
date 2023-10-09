<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=fdci','root','');

//   echo "connection succesful";
} catch (PDOException $e) {

  echo $e->getmessage();

}

 ?>
