<?php
    session_start();
    include "config.php";
    $id=$_SESSION["id"];

    $sql="SELECT * FROM article ORDER BY time DESC";
    $result=mysqli_query($link,$sql);
    $arr=mysqli_fetch_all($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All blog articles</title>
    <?php include "head.php"; ?>
    <style>
        .post
        {
            margin-left: 20%;
            margin-right: 20%;
            padding: 10px 20px;
            text-align: center;
        }
    </style>
</head>
    <body>
    <?php 
        include "header.php";
        foreach($arr as $r)
        {
    ?>
    <div class="post w3-center w3-card-4 w3-margin-bottom w3-margin-top">
        <h1><?php echo $r[2] ?></h1>
        <span class="w3-yellow w3-padding-small"><?php echo $r[3] ?></span><p>
        <small><i class='fas fa-user'></i> <?php echo $r[4] ?></small> |
        <small><i class='fas fa-calendar-times'></i> <?php echo $r[7] ?></small>
        <p><?php echo $r[5] ?></p>
        <img src="images/<?php echo $r[6] ?>" height="250" width="500">
    </div>
    <?php } ?>
    <br><br><br><br>
    <?php include "footer.php" ?>
    </body>
</html>