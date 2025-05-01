<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");


if(isset($_REQUEST['user_id'])){
    $user_id=$_REQUEST['user_id'];
}

if(isset($_REQUEST['submit'])){
    $user_pic= $_FILES['user_pic'];
    $img_name=$user_pic['name'];
    $img_tmp_name=$user_pic['tmp_name'];
    
    $img_extension=explode(".",$img_name);

    $new_img_name=round(microtime(true)).".".end($img_extension);

    $img_path="./images/user_image/".$new_img_name;
    $img_upload_result = move_uploaded_file($img_tmp_name,$img_path);
    if($img_upload_result){
        
        $run_query="UPDATE reg_users SET user_pic='$new_img_name' WHERE reg_id=$user_id";
        $run_query_result=mysqli_query($conn,$run_query);
        if($run_query_result){
            echo "Image name uploaded succesfully in database";
        }
        else{
            echo "Error while uploading image in database";
        }
    }
    else{
        echo "Something went wrong! while uploading image on server";
    }

}
?>

<div class="container">
    <div class="row py-3">
        <h2 class="text-center py-3">Upload Image</h2>
        <form method="POST" enctype="multipart/form-data">
        <div class="col-md-6 mb-3 mx-auto">
                <input type="file" class="form-control" name="user_pic" required>
        </div>
        <div class="col-md-6 mb-3 mx-auto">
        <button type="submit" class="btn btn-primary" name="submit">Upload</button>
        </div>
        </form>
    </div>
</div>


<?php
include("./includes/footer.php");

?>