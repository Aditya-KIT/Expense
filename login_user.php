<?php
session_start();
include("./includes/header.php");
include("./includes/functions.php");

if(isset($_SESSION['message'])&& isset($_SESSION['color'])){
  my_alert($_SESSION['color'],$_SESSION['message']);
  unset($_SESSION['message'],$_SESSION['color']);
}

if(isset($_REQUEST['login'])){
  include("./includes/db_conn.php");
  //getting input values from html form
  $user_name=$_REQUEST['user_name'];
  $user_pass=$_REQUEST['user_pass'];

  $login_query="SELECT * FROM reg_users WHERE user_name='$user_name'";
  $result_login_guery=mysqli_query($conn,$login_query);

  if(mysqli_num_rows($result_login_guery)==1){
    $row=mysqli_fetch_assoc($result_login_guery);
    $db_user_name=$row['user_name'];
    $db_user_pass=$row['user_pass'];
    $db_user_pic=$row['user_pic'];

  if(password_verify($user_pass,$db_user_pass)){
    $_SESSION['name']= $db_user_name;
    $_SESSION['picture']= $db_user_pic;
    $_SESSION['is_login']= true;
    
    //to show notification of success
    $_SESSION['message']="Login Successfully";
    $_SESSION['color']="success";
    header("Location:index.php");
  }
  else{
    my_alert("danger","Incorect password");
  }}
  else{
    echo "User does Not Exist";
  }
   
   mysqli_close($conn);
}
?>


<div class="container">
<div class="card "id="my-card">
  <div class="card-header bg-primary text-white text-center">
    Login Form
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-12">
            <form method="POST">
              <div class="mb-3">
                <label for=""class="form-label">User Name</label>
                <input type="text" class="form-control" required name="user_name">
              </div>
              <div class="col-12">
              <div class ="mb-3">
                <label for=""class="form-label">User Password</label>
                <input type="password" class="form-control" required name="user_pass">
              </div>
              <div class ="mb-3">
                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
              </div>
            </form>
        </div>
        </div>
    </div>
  </div>
</div>
</div>



<?php
include("./includes/footer.php");

?>