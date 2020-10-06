<?php
    session_start();
    include "config.php";
    $id=$_SESSION["id"];
    include "sessioncheck.php";

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["update"]))
    {
        $name=$_POST["nm"];
        $email=$_POST["em"];
        $password=$_POST["pw"];

        $sql="UPDATE users SET name='$name',email='$email',password='$password' WHERE id='$id'";
        $r=mysqli_query($link,$sql);

        if(!$r)
        {
            echo "<h4>Record is not updated</h4>";
        }
        else
            header("location:index.php?id=".$id);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit profile</title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <?php include "header.php" ?>
        <?php
            $data="SELECT * FROM users WHERE id='$id'";
            $q=mysqli_query($link,$data);
            $result=mysqli_fetch_assoc($q);
        ?>
        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
        <div id="details">
        <table class="w3-table w3-table-all w3-centered" id="rec">
            <thead>
                <tr class="w3-pale-green">
                    <td><h1>Update your profile</h1></td>
                    <td><span class="w3-right"><?php echo "<a href='index.php?id=".$id."'><i class='fas fa-backspace' style='font-size:24px'></i></a>"; ?></span></td>
                </tr>
            </thead>
            <tbody>
                <tr class="w3-pale-yellow">
                <th>Name</th>    
                <td><input type="text" class="w3-input w3-border" name="nm" placeholder="enter your name" value="<?php echo $result['name'] ?>" required></td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Email</th>    
                <td><input type="email" class="w3-input w3-border" name="em" placeholder="enter valid email" value="<?php echo $result['email'] ?>" required></td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Password</th>    
                <td><input type="password" class="w3-input w3-border" name="pw" placeholder="enter password" value="<?php echo $result['password'] ?>" required></td>
                </tr>
                <tr class="w3-pale-yellow">
                <td colspan="2"><button type="submit" name="update" class="w3-button w3-large w3-btn w3-green w3-hover-green">Update</button></td>
                </tr>
            </tbody>
        </table>
        </div>
        </form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include "footer.php" ?>
    </body>
</html>