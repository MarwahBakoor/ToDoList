<?php
require_once('includes/time.inc.php');
require_once('includes/DbConfig.inc.php');
$CurrentTime = new Dateandtime();
$task="";
$connectingDB;
if(isset($_POST['AddTask'])){
    $task = $_POST['task'];
    if(!empty($task)){
    $sql="INSERT INTO todo(task,done)
    VALUES(:task,:done)";
    $stmt = $connectingDB-> prepare($sql);
    $stmt->bindValue(':task',$task);
    $stmt->bindValue(':done',0);
    $Execute = $stmt->execute();
    if($Execute){
        header("Location:".'index.php');
        exit;
    }
    }
    if(isset($_POST['Done'])){
        $sql = " UPDATE todo 
            SET done=0 WHERE id='$PostId'";
    }
}

?>
<!doctype html>
<html>
<head>
    <title>To-do</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    
</head>

<body>
<div class="container">
    
    <h2 ><?php echo $CurrentTime->day(); ?> <span class="date"><?php echo $CurrentTime->dayMonth(); ?></span></h2>
    <h1>To-do</h1>
    <div>
    <form action="index.php" method="post">
       <input class="add-task" type="text" name="task" iid ="task" value="" placeholder="Add new to-do">
       <input type="submit" value="Add" name="AddTask" class="btn">    
    </form>
    </div>
    <ul>
    <?php 
    $sql ="SELECT * FROM todo ORDER BY id DESC";
    $stmt = $connectingDB-> query($sql);
    while ($DataRows=$stmt->fetch()) {
    $Id          = $DataRows["id"];
    $Task       = $DataRows["task"];
    $Done         = $DataRows["done"];

    if($Done==0){

    ?>
          <li class="list-items"> <?php echo $Task;  ?>
          <a href="Done.php?id=<?php echo $Id;?>" class="btn2">Done</a> 
          </li>  
          <hr>
       <?php } else { ?>
       
        <li class="list-items"> <span class="done"> <?php echo $Task;  ?> </span>
        <a href="Not-Done.php?id=<?php echo $Id;?>" class="btn2 btn3">Not Done</a>
           </li>
           <hr>
     <?php  }} ?>
     
        </ul>
</div>
</body>
</html>
