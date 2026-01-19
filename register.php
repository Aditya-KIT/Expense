<?php
include("./includes/header.php");
include("./includes/functions.php");


if(isset($_REQUEST['register'])){
  include("./includes/db_conn.php");
  //getting input values from html form
  $user_name=$_REQUEST['user_name'];
  $user_pass=$_REQUEST['user_pass'];

  // Encrypted Password
  $enc_pass=password_hash($user_pass,PASSWORD_BCRYPT);

   // Inserting Data into database
   $sql = "INSERT INTO reg_users (user_name,user_pass)
   VALUES ('$user_name', '$enc_pass')";
   
   if (mysqli_query($conn, $sql)) {
     my_alert("success","New Record Created Succesfully");
   } else {
    my_alert("danger","Error while inserting the record");
   }
   
   mysqli_close($conn);
}
?>


<div class="container">
<div class="card" id="my-card">
  <div class="card-header bg-primary text-white text-center">
    Register User
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
                <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
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