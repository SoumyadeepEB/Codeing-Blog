<?php 
    session_start();
    include "config.php";

    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"]))
    {
        $email=$_POST["em"];
        $password=$_POST["pw"];

        $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result=mysqli_query($link,$sql);

        if(mysqli_num_rows($result)==1)
        {
            $row=mysqli_fetch_assoc($result);
            $_SESSION["id"]=$row["id"];
            header("location:index.php?id=".$_SESSION["id"]);
        }
        else
            echo "<h4 class='w3-center w3-text-red w3-pale-red w3-display-top w3-border w3-border-red w3-round' style='margin:10% 40% 10% 40%;'>Invalid Email or Password</h4>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <?php include "head.php"; ?>
    </head>
    <body>
    <?php include "header.php"; ?>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="w3-display-middle">
        <table class="w3-table w3-table-all w3-centered" id="rec">
        <tbody>
            <tr class="w3-pale-green">
                <td colspan="2"><h1>User Login</h1></td>
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
                <td><button type="submit" name="login" class="w3-button w3-green">Login</button></td>
                <td><a href="signup.php">Have not any accout?</a></td>
            </tr>
        </tbody>
        </table>
        </div>
    </form>
    </body>
</html>