<?php
    session_start();
    include "config.php";
    if(!$_SESSION["id"])
        header("location:login.php");
    $id=$_SESSION["id"];
    include "sessioncheck.php";
    $sql="SELECT * FROM users WHERE id='$id'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home: <?php echo $row["name"]; ?></title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <?php include "header.php"; ?>
        <div id="details">
        <table class="w3-table w3-table-all w3-centered" id="rec">
            <thead>
                <tr class="w3-pale-green">
                <th colspan="2" class="w3-xlarge"><h1>Personal Details</h1></th>
                <td><?php echo "<a class='w3-right w3-hover-text-green' href='edit.php?id=".$row['id']."'><i class='fa fa-edit' style='font-size:24px'></i></a>"; ?></td>
            </thead>
            <tbody>
                <tr class="w3-pale-yellow">
                <td rowspan="3">
                    <img src="profilepic/<?php echo $row["dp"] ?>" class="w3-border" height="125" width="100"><br>
                    <?php echo "<a href='dpchange.php?id=".$row['id']."'>Update your profile picture</a>" ?>
                </td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Name</th>
                <td><?php echo $row["name"]?></td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Email</th>
                <td><?php echo $row["email"]?></td>
                </tr>
            </tbody>
        </table>
        </div>
        <hr>
        <div class="w3-container">
            <div class="w3-center"><h1>Recent Articles:</h1></div>
            <div class="w3-row w3-margin-top" style="margin-left: 20%">
                <?php
                    $articles="SELECT * FROM article LIMIT 3";
                    $show=mysqli_query($link,$articles);
                    $arow=mysqli_fetch_all($show);

                    if(mysqli_num_rows($show)>0)
                    {
                        foreach($arow as $a)
                        {
                            echo "<div class='w3-card-4 w3-margin-right w3-margin-bottom w3-col m3'>";
                            echo "<img src='images/$a[6]' width='100%'>";
                            echo "<div class='w3-center'><h3>$a[2]</h3>";
                            echo "<small><i class='fas fa-user'></i> $a[4]</small></div>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>
        <div class="w3-center"><a href='disparticles.php'>See more</a></div>
        <br><br><br><br><br>
        <?php include "footer.php" ?>
    </body>
</html>