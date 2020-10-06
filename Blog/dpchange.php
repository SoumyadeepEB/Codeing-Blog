<?php
    session_start();
    include "config.php";
    $id=$_SESSION["id"];
    include "sessioncheck.php";

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["upload"]))
    {
        $dpname=$_FILES["dp"]["name"];
        $dptemp=$_FILES["dp"]["tmp_name"];

        if($dpname=="")
        {
            $dpname="default.jpg";
        }
        
        $path="profilepic/".$dpname;
        move_uploaded_file($dptemp,$path);

        $sql="UPDATE users SET dp='$dpname' WHERE id='$id'";
        $result=mysqli_query($link,$sql);

        if(!$result)
        {
            echo "<h4 class='w3-center w3-text-red w3-pale-red w3-display-top w3-border w3-border-red w3-round' style='margin:10% 40% 10% 40%;'>Photo is not uploaded</h4>";
        }
        else
            header("location:index.php?id=".$id);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Change profile picture</title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <?php include "header.php" ?>
        <?php
            $data="SELECT dp FROM users WHERE id='$id'";
            $q=mysqli_query($link,$data);
            $r=mysqli_fetch_assoc($q);
        ?>
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
    <div id="details">
        <table class="w3-table w3-table-all w3-centered" id="rec">
            <thead>
                <tr class="w3-pale-green">
                    <td><h1>Upload New</h1></td>
                    <td><span class="w3-right"><?php echo "<a href='index.php?id=".$id."'><i class='fas fa-backspace' style='font-size:24px'></i></a>"; ?></span></td>
                </tr>
            </thead>
            <tbody>
            <tr class="w3-pale-yellow">
                <th>Profile Picture</th>
                <td>
                    <input type="file" id="fupload" name="dp"><p>
                    <img src="profilepic/<?php echo $r['dp'] ?>" height="125" width="100">
                </td>
                </tr>
                <tr class="w3-pale-yellow">
                <td colspan="2"><button type="submit" name="upload" class="w3-button w3-large w3-btn w3-green w3-hover-green">Upload</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>