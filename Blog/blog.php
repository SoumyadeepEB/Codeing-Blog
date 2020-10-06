<?php
    session_start();
    include "config.php";
    $id=$_SESSION["id"];
    include "sessioncheck.php";

    $sql="SELECT * FROM users WHERE id='$id'";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog Post</title>
    <?php include "head.php" ?>
</head>
<body>
    <?php 
        include "header.php";
        
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["post"]))
        {
            $title=$_POST["title"];
            $subtitle=$_POST["sub"];
            $author=$_POST["author"];
            $content=$_POST["content"];
            $picname=$_FILES["pic"]["name"];
            $tempname=$_FILES["pic"]["tmp_name"];

            $path="images/".$picname;
            move_uploaded_file($tempname,$path);

            $sql="INSERT INTO article (id,title,subtitle,author,content,photo) 
            VALUES ('$id','$title','$subtitle','$author','$content','$picname')";
            $result=mysqli_query($link,$sql);

            if($result)
            {
                header("location:index.php?id=".$id);
            }
            else
            {
                echo "<h4>Your article is not posted</h4>";
            }
        }
    ?>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div style="margin: 10%;">
    <table class="w3-table w3-table-all w3-centered" id="rec">
        <thead>
            <tr class="w3-pale-green"><td colspan="2"><h2>Create New Post</h2></td></tr>
        </thead>
        <tbody>
            <tr class="w3-pale-yellow">
                <th>Title</th>
                <td><textarea name="title" rows="5" cols="100" placeholder="enter post content" required></textarea></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Sub Title</th>
                <td><textarea name="sub" rows="2" cols="100" placeholder="enter post content" required></textarea></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Author</th>
                <td><input type="text" name="author" class="w3-input w3-border" value="<?php echo $row["name"]; ?>" readonly></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Content</th>
                <td><textarea class="content" name="content" rows="15" cols="100" placeholder="enter post content" required></textarea></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Attachment</th>
                <td><input type="file" name="pic" required></td>
            </tr>
            <tr class="w3-pale-yellow">
                <td><button type="submit" class="w3-btn w3-blue w3-right" name="post">Post</button></td>
                <td>
                    <?php echo "<a id='r' href='dashboard.php?id=".$id."'>Back to dashboard</a>"; ?>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    </form>
</body>
</html>