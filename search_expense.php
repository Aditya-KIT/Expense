<?php 
session_start();
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
?>
<div class="container">
<form>
    <div class="row">
        <div class="col-md-12">
        <h2 class="text-center display-5 fw-semibold py-5">Search Expense</h2>
    </div>

        <div class="col-md-5 mb-3">
            <label for="" class="form-label">From</label>
            <input type="date" class="form-control" name="from_date" max="<?php echo date("Y-m-d");?>"id="from_date" onchange="get_date()">
        </div>
        <div class="col-md-5 mb-3">
            <label for="" class="form-label">From</label>
            <input type="date" class="form-control" name="to_date" max=<?php echo date("Y-m-d");?> id="to_date">
        </div>
        <div class="col-md-2 mb-3 align-self-end">
            <button type="submit" class="btn btn-primary w-100"name="search">Search</button>
        </div>
        </div>
    </form>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date Added</th>
                    <th scope="col">Expense Details</th>
                    <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_REQUEST['search']))
            {
                $from_date=$_REQUEST['from_date'];
                $to_date=$_REQUEST['to_date'];
                $search_expense= "SELECT * FROM expense_info WHERE item_date BETWEEN '$from_date' AND '$to_date'";
                $run_search_expense=mysqli_query($conn,$search_expense);
                $expense_counter=9;
                $total=0;
                if(mysqli_num_rows($run_search_expense)>0){
                while($row=mysqli_fetch_assoc($run_search_expense))
                    {?>
                        <tr>
                            <td><?php echo $expense_counter; ?></td>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['item_price']; ?></td>
                            <td><?php echo $row['item_date']; ?></td>
                            <td><?php echo $row['item_details']; ?></td>
                            <td><a class="me-4" href="./edit_expense.php?edit_expense_id=<?php echo $row['item_id']?>">Edit</a>
                            <a href="./delete_expense.php?del_expense_id=<?php echo $row['item_id']?>">Delete</a>
                            </td>
                        </tr>
                        <?php 
                        $expense_counter++;
                        $total=$total+$row['item_price'];
                        }
                
                ?>
                <tr>
                    <th colspan="5"class="text-center">Total Amount</th>
                    <th><?php echo $total?></th>
                </tr>
                <?php
                }
                else{
                    ?>
                    <tr>
                        <td colspan="6">
                            <h3 class="text-danger text-center">No Record Found</h3>
                        </td>
                    </tr>
                    <?php
                }}
            ?>
        </tbody>
    </table>
</div>

<?php
include("./includes/footer.php");

?>