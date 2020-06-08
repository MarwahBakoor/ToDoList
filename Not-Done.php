<?php 
require_once('includes/time.inc.php');
require_once('includes/DbConfig.inc.php');
$connectingDB;
$TaskId = $_GET['id'];
$sql = " UPDATE todo SET done = 0 WHERE id='$TaskId'";
$Execute = $connectingDB->query($sql);
if($Execute){
    header("Location:".'index.php');
    exit;
} 

?>