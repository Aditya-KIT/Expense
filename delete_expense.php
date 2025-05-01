<?php
session_start();
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");


if(isset($_REQUEST['del_expense_id'])){
    $del_expense_id=$_REQUEST['del_expense_id'];
    $del_query= "DELETE FROM expense_info WHERE item_id=$del_expense_id";
    $run_del_query=mysqli_query($conn,$del_query);

    if($run_del_query){
        my_alert("success","Data deleted succesfully");
        header("Location:./all_expenses.php");
    }
    else{
        myalert("danger","Something went Worng! While Deleting th Data");
    }

    mysqli_close($conn);
}

?>

<?php
include("./includes/footer.php");

?>
