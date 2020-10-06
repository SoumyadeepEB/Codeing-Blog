<?php
    include "config.php";

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["signup"]) && $_POST["pw"]==$_POST["cpw"])
    {
        $name=$_POST["nm"];
        $email=$_POST["em"];
        $password=$_POST["pw"];
        $dpname=$_FILES["dp"]["name"];
        $dptemp=$_FILES["dp"]["tmp_name"]; 

        if($dpname=="")
        {
            $dpname="default.jpg";
        }

        $path="profilepic/".$dpname;
        move_uploaded_file($dptemp,$path);

        $sql="INSERT INTO users (name,email,password,dp) VALUES ('$name','$email','$password','$dpname')";
        $result=mysqli_query($link,$sql);

        if(!$result)
        {
            echo "<h4>Record is not inserted</h4>";
        }
        else
            header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Signup Account</title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <?php include "header.php"; ?>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="w3-display-middle">
        <table class="w3-table w3-table-all w3-centered" id="rec">
            <thead>
                <tr class="w3-pale-green"><td colspan="2"><h1>User Signup Form</h1></td></tr>
            </thead>
            <tbody>
                <tr class="w3-pale-yellow">
                <th>Name</th>    
                <td><input type="text" name="nm" class="w3-input w3-border" placeholder="enter your name" required></td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Email</th>    
                <td><input type="email" name="em" class="w3-input w3-border" placeholder="enter valid email" required></td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Password</th>    
                <td><input type="password" name="pw" class="w3-input w3-border" placeholder="enter password" required></td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Confirm Password</th>    
                <td><input type="password" name="cpw" class="w3-input w3-border" placeholder="confirm password" required></td>
                </tr>
                <tr class="w3-pale-yellow">
                <th>Profile Picture</th>
                <td><input type="file" name="dp"></td>
                </tr>
                <tr class="w3-pale-yellow">
                <td><button type="submit" class="w3-button w3-green" name="signup">Signup</button></td>
                <td><a href="login.php">Already have accout?</a></td>
                </tr>
            </tbody>
        </table>
        </div>
        </form>
    </body>
</html>