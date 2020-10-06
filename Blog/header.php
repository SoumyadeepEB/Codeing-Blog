<?php 
    include "head.php"; 
    if(isset($_SESSION["id"]))
    {
      $id=$_SESSION["id"];
      $sql="SELECT * FROM users WHERE id='$id'";
      $result=mysqli_query($link,$sql);
      $row=mysqli_fetch_assoc($result);

      $vname=strtoupper(explode(" ",$row["name"])[0]);
    }
    if(isset($id))
    {
?>
<div class="w3-bar w3-border w3-black w3-padding-small w3-card-4" style="margin-top:0px">
  <?php echo "<a class='w3-bar-item w3-button w3-hover-none w3-hover-text-orange' href='index.php?id=".$id."'><i class='fa fa-home w3-xlarge'></i></a>" ?>
  <?php echo "<a class='w3-bar-item w3-button w3-hover-none w3-hover-text-orange' href='blog.php?id=".$id."'>Post Blog</a>" ?>
  <?php echo "<a class='w3-bar-item w3-button w3-hover-none w3-hover-text-orange' href='disparticles.php'>View All Blogs</a>" ?>
  <?php echo "<a class='w3-bar-item w3-button w3-hover-none w3-hover-text-orange' href='dashboard.php?id=".$id."'>Dashboard</a>" ?>
  <div><img src="profilepic/<?php echo $row["dp"] ?>" class="w3-circle w3-right w3-margin-right" height="35" width="35"></div>
  <div class="w3-right w3-large w3-margin-right"><?php echo "Welcome $vname";?></div>
  <div class="w3-right w3-margin-right"><?php echo "<a href='logout.php?id=".$id."' class='w3-bar-item w3-button w3-hover-none w3-hover-text-red'><i class='fas fa-sign-out-alt' style='font-size:24px'></i></a>" ?></div>
  <?php } ?>
</div>