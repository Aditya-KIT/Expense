<?php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
?>

<div class="container">
    <div class="row">
        <div class="col-12 py-3">
            <h4 class="text-center">Registered Users</h4>
        </div>
    </div>
    <div class="col-12 mb-2">
        <a href="register.php" class="btn btn-primary">
            Add User
        </a>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">USER NAME</th>
                    <th scope="col">Picture</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fetch_data="SELECT reg_id,user_name,user_pic FROM reg_users";
            $run_fetch_data=mysqli_query($conn,$fetch_data);
            if(mysqli_num_rows($run_fetch_data)>0){
                while($row= mysqli_fetch_assoc($run_fetch_data)){?>
                    <tr>
                    <th scope="row"><?php echo $row['reg_id']?></th>
                    <td><?php echo $row['user_name']?></td>
                    <td><a href="Upload_img.php?user_id=<?php echo $row['reg_id'];?>">
                        <?php
                        if($row['user_pic']==NULL){
                        ?>
                        <img width="50px" src="./images/user_image/staff.jpeg">
                        <?php   
                        }else{
                        ?>
                            <img width="50px" src="./images/user_image/<?php echo $row['user_pic'];?>">
                        <?php
                        }
                        ?>
                    </a>
                    </td>
            </tr>
            <?php
            }
            }
            else{?>
                <tr>
                    
                <td colspan="3">
                    <h5 class="text-danger text-center">No Record Found</h5>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>


<?php
include("./includes/footer.php");

?>