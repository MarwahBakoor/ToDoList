<?php 
$DSN = "mysql:host=localhost;dbname=todolist";
// root is the diffualt username 
// we add empty string "" for the pass
$connectingDB = new PDO( $DSN ,"root","");
?>