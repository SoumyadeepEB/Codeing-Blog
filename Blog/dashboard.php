<?php
    session_start();
    include "config.php";
    $id=$_SESSION["id"];
    include "sessioncheck.php";

    $sql="SELECT * FROM article WHERE id='$id'";
    $result=mysqli_query($link,$sql); 
    $arr=mysqli_fetch_all($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Article Dashboard</title>
    <?php include "head.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "header.php" ?>
    <div id="details">
    <table class="w3-table w3-table-all w3-centered" id="rec">
        <thead>
            <td colspan="6" class="w3-pale-green"><h2>Article Dashboard</h2></td>
        </thead>
        <tbody>
            <?php
            if(sizeof($arr)>0)
            {
                echo"<tr class='w3-pale-blue'>
                <th>#</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Content</th>
                <th>Photo</th>
                <th>Action</th>
                </tr>";
                foreach($arr as $x)
                {
                    echo "<tr class='w3-pale-yellow'>";
                    echo "<td>$x[0]</td>";
                    echo "<td>$x[2]</td>";
                    echo "<td>$x[3]</td>";
                    echo "<td>$x[5]</td>";
                    echo "<td><img src='images/$x[6]' height='75' width='75'></td>";
                    echo "<td>
                    <a class='w3-margin-right' href='blogedit.php?id=".$id."".'&post='.$x[0]."'><i class='fa fa-edit' style='font-size:20px;color:green'></i></a>";
                    echo "<a href='blogdel.php?id=".$id."'><i class='fa fa-trash' style='font-size:20px;color:red'></i></a>
                    </td>";
                    echo "</tr>";
                }
            }
            else
                echo "<h4 class='w3-center w3-yellow w3-text-red w3-padding w3-display-middle'>No Article Found</h4>";
            ?>
        </tbody>
    </table>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include "footer.php" ?>
</body>
</html>
