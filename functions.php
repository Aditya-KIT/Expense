<?php
function my_alert($color,$msg){
?>
<div style="position: absolute; right:20px; top:20px" class="alert alert-<?php echo $color?> alert-dismissible fade show" role="alert"> 
  <?php echo $msg?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}

//Check User
function check_user(){
  if(!isset($_SESSION['is_login'])==true){
    header("Location: login_user.php");
  }
}

?>