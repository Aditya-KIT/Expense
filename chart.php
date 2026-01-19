<?php 
session_start();
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .chart{
            width: 600px;
            height:325px;
            padding: 50px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<div class="chart">
  <canvas id="myChart"></canvas>
</div>
<?php
$today_date=date("Y-m-d");
$fetch_expense= "SELECT * FROM expense_info WHERE item_date='$today_date' ORDER BY item_date DESC";{
    $run_fetch_expense=mysqli_query($conn,$fetch_expense);
    $expense_counter=1;
    $total_today=0;
    if(mysqli_num_rows($run_fetch_expense)>0){
        while($row=mysqli_fetch_assoc($run_fetch_expense)){?>
    <tr>
        <td><?php $row['item_price']; ?></td>
    </tr>
    <?php 
    $expense_counter++;
    $total_today=$total_today+$row['item_price'];
    }
    ?>
    <?php
    }
}

// Yesterday Code
$yesterday_date=date("Y-m-d",strtotime("-1 days"));
            $fetch_expense= "SELECT * FROM expense_info WHERE item_date='$yesterday_date' ORDER BY item_date DESC";{
                $run_fetch_expense=mysqli_query($conn,$fetch_expense);
                $expense_counter=1;
                $total_yesterday=0;
                if(mysqli_num_rows($run_fetch_expense)>0){
                    while($row=mysqli_fetch_assoc($run_fetch_expense)){?>
                <tr>
                    <td><?php $row['item_price']; ?></td>
                </tr>
                <?php 
                $expense_counter++;
                $total_yesterday=$total_yesterday+$row['item_price'];
                }
                ?>
                <?php
                }
            }
// Seven days
$today_date=date("Y-m-d");
            $previous_seven_days_date=date("Y-m-d",strtotime($today_date . "- 7 days"));
            $fetch_expense= "SELECT * FROM expense_info WHERE item_date BETWEEN'$previous_seven_days_date'AND '$today_date' ORDER BY item_date DESC";{
                $run_fetch_expense=mysqli_query($conn,$fetch_expense);
                $expense_counter=1;
                $total_seven=0;
                if(mysqli_num_rows($run_fetch_expense)>0){
                    while($row=mysqli_fetch_assoc($run_fetch_expense)){?>
                <tr>
                    <td><?php $row['item_price']; ?></td>
                </tr>
                <?php 
                $expense_counter++;
                $total_seven=$total_seven+$row['item_price'];
                }
                ?>
                <?php
            }
            }
            // Monthly 
            $today_date=date("Y-m-d");
            $previous_seven_days_date=date("Y-m-d",strtotime($today_date . "- 1month"));
            $fetch_expense= "SELECT * FROM expense_info WHERE item_date BETWEEN'$previous_seven_days_date'AND '$today_date' ORDER BY item_date DESC";{
                $run_fetch_expense=mysqli_query($conn,$fetch_expense);
                $expense_counter=1;
                $total_month=0;
                if(mysqli_num_rows($run_fetch_expense)>0){
                    while($row=mysqli_fetch_assoc($run_fetch_expense)){?>
                <tr>
                    <td><?php $row['item_price']; ?></td>
                </tr>
                <?php 
                $expense_counter++;
                $total_month=$total_month+$row['item_price'];
                }
            ?>
            <?php
            }
            }
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Today', 'Yesterday', 'Last Seven Days', 'Last Month'],
      datasets: [{
        label: 'Expenses',
        data: [<?php echo $total_today;?>, <?php echo $total_yesterday;?>, <?php echo $total_seven;?>, <?php echo $total_month;?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</body>
</html>

<?php
include("./includes/footer.php");

?>