<?php
    session_start();
    include "config.php";
    $id=$_SESSION["id"];
    include "sessioncheck.php";
    $post=$_GET["post"];

    $sql="SELECT * FROM article WHERE id='$id' AND post='$post'";
    $result=mysqli_query($link,$sql);
    $val=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog Edit</title>
    <?php include "head.php"; ?>
    <style>
        
    </style>
</head>
<body>
    <?php
        include "header.php";
    
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["update"]))
        {
            $title=$_POST["title"];
            $subtitle=$_POST["sub"];
            $author=$_POST["author"];
            $content=$_POST["content"];
            $picname=$_FILES["pic"]["name"];
            $tempname=$_FILES["pic"]["tmp_name"];

            $path="images/".$picname;
            move_uploaded_file($tempname,$path);

            $edit="UPDATE article 
            SET title='$title',subtitle='$subtitle',author='$author',content='$content',photo='$picname' WHERE id=$id AND post=$post";
            $q=mysqli_query($link,$edit);

            if($q)
            {
                header("location:dashboard.php?id=".$id);
            }
            else
            {
                echo "<h4>Your article is not updated</h4>";
            }
        }
    ?>
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
    <div style="margin: 10%;">
    <table class="w3-table w3-table-all w3-centered" id="rec">
        <thead>
            <tr class="w3-pale-green"><td colspan="2"><h2>Modify Post</h2></td></tr>
        </thead>
        <tbody>
            <tr class="w3-pale-yellow">
                <th>Title</th>
                <td><textarea name="title" rows="5" cols="100" placeholder="enter post content" required><?php echo $val["title"] ?></textarea></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Sub Title</th>
                <td><textarea name="sub" rows="2" cols="100" placeholder="enter post content" required><?php echo $val["subtitle"] ?></textarea></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Author</th>
                <td><input type="text" class="w3-input w3-border" name="author" value="<?php echo $val["author"]; ?>" readonly></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Content</th>
                <td><textarea class="content" name="content" rows="15" cols="100" placeholder="enter post content" required><?php echo $val["content"] ?></textarea></td>
            </tr>
            <tr class="w3-pale-yellow">
                <th>Attachment</th>
                <td>
                    <input type="file" name="pic" required><p>
                    <img src="images/<?php echo $val["photo"] ?>" height="100" width="150">
                </td>
            </tr>
            <tr class="w3-pale-yellow">
                <td><button type="submit" class="w3-btn w3-blue w3-right" name="update">Edit</button></td>
                <td>
                    <?php echo "<a id='r' href='dashboard.php?id=".$id."'>Back to dashboard</a>"; ?>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    </form>
    <?php include "footer.php"; ?>
</body>
</html>