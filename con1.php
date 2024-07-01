<?php

  // Data storing and managing images   

  $cardName = $_POST["cardHolder"];
  $card =$_POST['cardNumber'];
  $exp  =$_POST['ExpDate'];
  $cv   =$_POST['cvc'];
   
  // Connection and storing data in database

 $connection = new mysqli('localhost','root','','responsivefrom');

  if($connection->connect_error){
    die('Connection Failed : '.$connection->connect_error);
  }
  else{
    echo "success";
    $statement = $connection->prepare("insert into pz(cardHolder,cardNumber,ExpDate,cvc) values(?, ?, ?, ?)");
    $statement->bind_param("siss",$cardName,$card,$exp,$cv);
    $statement->execute();
    $statement->close();
    $connection->close(); 
  }

?>